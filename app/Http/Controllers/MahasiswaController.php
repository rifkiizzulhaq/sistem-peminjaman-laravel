<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Lab;
use App\Models\Transaction;


class MahasiswaController extends Controller
{
    public function index()
    {
        $lab = Lab::withCount('item')->get();
        // dd($lab);
        return view('mahasiswa.index', [
            'lab' => $lab,
        ]);
    }
    public function items($items){
        $lab = Lab::with('item')->where('name', $items)->first();
            return view('mahasiswa.lab', [
            'data' => $lab,
        ]);
    }
    public function addToCart(Request $request, $id){
        $item = Item::find($id);

        if (!$item) {
            return redirect()->route('itemslab.index');
        }

        $existingCart = Cart::where('user_id', Auth::user()->id)
            ->where('items_id', $id)
            ->first();

        if ($existingCart) {
            $existingCart->increment('quantity');
        } else {
            Cart::create([
                'user_id' => Auth::user()->id,
                'items_id' => $id,
                'quantity' => 1,
            ]);
        }
        return redirect()->route('myCart');
    }
    public function my_cart(){
        $myCart = Cart::with('item.lab')
            ->where('user_id', Auth::user()->id)
            ->get();
        return view('mahasiswa.myCart', ['myCart' => $myCart]);
    }
    public function add_my_cart($id){
        $myCart = Cart::find($id);
        if (!$myCart) {
            return 'kosong';
        }

        $myCart->quantity = $myCart->quantity + 1;
        $myCart->save();

        $myCart->save();
        return redirect()->route('myCart');
    }
    public function destroy_my_cart($id){
        $myCart = Cart::find($id);
        if (!$myCart) {
            return 'kosong';
        }
        if ($myCart->quantity > 1) {
            $myCart->quantity = $myCart->quantity - 1;
            $myCart->save();
            return redirect()->route('myCart');
        }
        $myCart->delete();
        return redirect()->route('myCart');
    }
    public function checkout(){
    $user = Auth::user();
    $myCart = Cart::where('user_id', $user->id)->get();

    foreach ($myCart as $cartItem) {

        $itemName = $cartItem->item->name;
        $itemPrice = $cartItem->item->price;

        if ($cartItem->quantity > 1) {
            for ($i = 0; $i < $cartItem->quantity; $i++) {
                Transaction::create([
                    'user_id' => $user->id,
                    'item_id' => $cartItem->items_id,
                    'status' => 'proses',
                    'keterangan' => 'proses'
                ]);
            }
        }else{
            Transaction::create([
                'user_id' => $user->id,
                'item_id' => $cartItem->items_id,
                'status' => 'proses',
                'keterangan' => 'proses'
            ]);
        }
        $cartItem->delete();
    }

    return redirect()->route('peminjaman');
    }
    public function peminjaman(){
        $transaction = Transaction::with(['item','user'])->where('user_id',Auth::user()->id)->get();
            return view('mahasiswa.peminjaman',[
                'data' => $transaction
        ]);
    }
}
