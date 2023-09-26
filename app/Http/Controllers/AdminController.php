<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Lab;
use App\Models\Transaction;
use App\Models\User;


class AdminController extends Controller
{
    public function item() {
        $user = Auth::user();

        if ($user->role != 'Admin') {
            return abort(403);
        }

        $lab = $user->admin->lab;

        if (!$lab) {
            return abort(403);
        }

        $item = Item::with('lab')->where('lab_id', $lab->id)->get();

        return view('admin.item', [
            'data' => $item,
            'Admin' => $user,
            'lab' => $lab,
        ]);
    }

    function create_item() {
        $user = Auth::user()->load('admin.lab');
        $lab = Lab::all()->where('id', $user->admin->lab->id);
        return view('admin.create_item', [
            'lab' => $lab,
        ]);
    }

    function store_item(Request $request) {
        $attrs = $request->validate([
            'name' => 'required',
            'lab' => 'required',
            'jenis' => 'required',
            'stock' => 'required',
        ]);
        Item::create([
            'name' => $attrs['name'],
            'lab_id' => $attrs['lab'],
            'type' => $attrs['jenis'],
            'stock' => $attrs['stock'],
            'borrowed' => 0,
        ]);

        return redirect()->route('item');
    }

    function edit_item($id) {
        $user = Auth::user()->load('admin.lab');
        $lab = Lab::all()->where('id', $user->admin->lab->id);
        $barang = Item::with('lab')->find($id);
        // dd($barang);
        return view('admin.edit_item', [
            'lab' => $lab,
            'barang' => $barang,
        ]);
    }

    function update_item(Request $request, $id) {
        $item = Item::find($id);

        $attrs = $request->validate([
            'name' => 'required',
            'lab_id' => 'required',
            'jenis' => 'required',
            'stock' => 'required',
        ]);

        $item->name = $attrs['name'];
        $item->lab_id = $attrs['lab_id'];
        $item->type = $attrs['jenis'];
        $item->stock = $attrs['stock'];
        $item->save();
        return redirect()->route('item');
    }

    function delete_item($id) {
        $item = Item::find($id);
        if (!$item) {
            return 'not found';
        }
        $item->delete();

        return redirect()->route('item');
    }

    function peminjaman(){
        $admin = User::with('admin.lab')
            ->where('id', Auth::user()->id)
            ->first();
        $labId = $admin->admin->lab->id;
        $transactions = Transaction::with(['item.lab', 'user'])
            ->where('status', 'accept')
            ->whereHas('item.lab', function ($query) use ($labId) {
                $query->where('id', $labId);
            })
            ->get();

        return view('admin.peminjaman', [
            'data' => $transactions,
            'lab' => $admin->admin->lab->name,
        ]);
    }

    public function request_pinjaman(){
        $admin = User::with('admin.lab')
            ->where('id', Auth::user()->id)
            ->first();
        $labId = $admin->admin->lab->id;
        $transactions = Transaction::with(['item.lab', 'user'])
            ->where('status', 'proses')
            ->whereHas('item.lab', function ($query) use ($labId) {
                $query->where('id', $labId);
            })
            ->get();

        return view('admin.persetujuan_peminjaman', [
            'data' => $transactions,
            'lab' => $admin->admin->lab->name,
        ]);
    }

    public function accept_pinjaman($id){
        $transaction = Transaction::with('item')->find($id);

        if ($transaction) {

            if ($transaction->item->stock > 0) {
                $transaction->status = 'accept';


                $transaction->item->stock = $transaction->item->stock - 1;
                $transaction->item->borrowed = $transaction->item->borrowed + 1;



                try {
                    $transaction->save();
                    $transaction->item->save();
                } catch (\Exception $e) {

                    return redirect()->route('admin.request_pinjaman')->with('error', 'Gagal menyimpan perubahan.');
                }

                return redirect()->route('admin.request_pinjaman')->with('success', 'Transaksi diterima.');
            } else {
                return redirect()->route('admin.request_pinjaman')->with('error', 'Stok tidak mencukupi.');
            }
        } else {
            return redirect()->route('admin.request_pinjaman')->with('error', 'Transaksi tidak ditemukan.');
        }
    }

    public function deny_pinjaman($id){
        $transaction = Transaction::find($id);
        $transaction->status = 'deny';
        $transaction->save();
        return redirect()->route('admin.request_pinjaman');
    }

    public function done_pinjaman($id){
        $transaction = Transaction::with('item')->find($id);

        if ($transaction) {

            if ($transaction->item) {
                $transaction->status = 'done';

                $transaction->item->stock = $transaction->item->stock + 1;
                $transaction->item->borrowed = $transaction->item->borrowed - 1;

                try {
                    $transaction->save();
                    $transaction->item->save();
                } catch (\Exception $e) {

                    return redirect()->route('admin.peminjaman')->with('error', 'Gagal menyimpan perubahan.');
                }

                return redirect()->route('admin.peminjaman')->with('success', 'Transaksi diterima.');
            } else {
                return redirect()->route('admin.peminjaman')->with('error', 'Stok tidak mencukupi.');
            }
        } else {
            return redirect()->route('admin.peminjaman')->with('error', 'Transaksi tidak ditemukan.');
        }
    }

    public function pengembalian(){
        $admin = User::with('admin.lab')
            ->where('id', Auth::user()->id)
            ->first();

        $labId = $admin->admin->lab->id;
        $statuses = ['deny', 'done'];

        $transactions = Transaction::with(['item.lab', 'user'])
            ->whereIn('status', $statuses)
            ->whereHas('item.lab', function ($query) use ($labId) {
                $query->where('id', $labId);
            })
            ->get();

        return view('admin.pengembalian', [
            'data' => $transactions,
            'lab' => $admin->admin->lab->name,
        ]);
    }
}
