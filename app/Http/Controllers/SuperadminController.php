<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lab;
use App\Models\Item;
use App\Models\Admin;
use App\Models\Mahasiswa;
use App\Models\Transaction;

class SuperadminController extends Controller
{
    function dashboard(){
        $transactions = Transaction::with(['item.lab', 'user'])->get();
        $totalSedangPinjam = Transaction::where('status','accept')->count();

        $totalItems = Item::sum('stock');

        $totalAdmin = Admin::count();

        return view('superadmin.dashboard',[
            'data' => $transactions,
            'total_items' => $totalItems ,
            'total_admin' => $totalAdmin ,
            'items_sedang_dipinjam' => $totalSedangPinjam,
        ]);
    }
    function admin(){
        $usersWithAdmin = User::where('role', 'Admin')->get();
        return view('superadmin.admin', ['Admin' => $usersWithAdmin]);
    }
    function create_admin(){
        $lab = Lab::all();
        return view('superadmin.create_admin', ['Lab' => $lab]);
    }
    public function store_admin(Request $request){

        $attrs = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'jabatan' => 'required',
            'lab' => 'required',
        ]);

        $user = User::create([
            'name' => $attrs['name'],
            'username' => $attrs['username'],
            'email' => $attrs['email'],
            'password' => $attrs['password'],
            'role' => 'Admin'
        ]);

        Admin::create([
            'user_id' => $user->id,
            'lab_id' => $attrs['lab'],
            'jabatan' => $attrs['jabatan']
        ]);

        return redirect()->route('admin');
    }
    function edit_admin($id){
        $user = User::with('Admin')->find($id);
        $lab = Lab::all();
        return view('superadmin.edit_admin', ['user' => $user, 'lab' => $lab]);
    }
    function update_admin(Request $request, $id){
        $user = User::with('Admin')->find($id);

        if (!$user) {
            return redirect()->route('admin')->with('alert', 'User menghilang');
        }

        $attrs = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'jabatan' => 'required',
            'lab' => 'required',
        ]);
        if($request->input('password')){
            $user->password = $request->input('password');
        }
        $user->name = $attrs['name'];
        $user->username = $attrs['username'];
        $user->email = $attrs['email'];
        $user->admin->jabatan = $attrs['jabatan'];
        $user->admin->lab_id = $attrs['lab'];
        $user->save();

        return redirect()->route('admin');
    }
    function delete_admin($id){
        $user  = User::find($id);
        if(!$user){
            return "gak nemu";
        }
        $user->admin->delete();
        $user->delete();

        return redirect()->route('admin');
    }
    function mahasiswa(){
        $usersWithMahasiswa = User::where('role', 'Mahasiswa')->with('Mahasiswa')->get();
        return view('superadmin.mahasiswa', ['Mahasiswa' => $usersWithMahasiswa]);
    }
    function create_mahasiswa() {
        return view('superadmin.create_mahasiswa');
    }
    function store_mahasiswa(Request $request) {
        $attrs = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nim' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',

        ]);

        $user = User::create([
            'name' => $attrs['name'],
            'username' => $attrs['username'],
            'email' => $attrs['email'],
            'password' => $attrs['password'],
            'role' => 'mahasiswa'
        ]);

        Mahasiswa::create([
            'user_id' => $user->id,
            'nim' => $attrs['nim'],
            'jurusan' => $attrs['jurusan'],
            'kelas' => $attrs['kelas']
        ]);

        return redirect()->route('mahasiswa');
    }
    function edit_mahasiswa($id){
        $user = User::with('Mahasiswa')->find($id);
        return view('superadmin.edit_mahasiswa', ['user' => $user]);
    }
    function update_mahasiswa(Request $request, $id) {
        $user = User::with('Mahasiswa')->find($id);

        if (!$user) {
            return redirect()->route('mahasiswa')->with('alert', 'User tidak ditemukan');
        }

        $attrs = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'nim' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',
        ]);

        if($request->input('password')){
            $user->password = $request->input('password');
        }

        $user->name = $attrs['name'];
        $user->username = $attrs['username'];
        $user->email = $attrs['email'];
        $user->mahasiswa->nim = $attrs['nim'];
        $user->mahasiswa->kelas = $attrs['kelas'];
        $user->mahasiswa->jurusan = $attrs['jurusan'];
        $user->save();
        $user->mahasiswa->save();

        return redirect()->route('mahasiswa')->with('alert', 'Berhasil memperbarui user');
    }
    function delete_mahasiswa($id) {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('mahasiswa')->with('alert', 'User tidak ditemukan');
        }

        $user->Mahasiswa->delete();
        $user->delete();

        return redirect()->route('mahasiswa')->with('alert', 'Berhasil menghapus user');
    }
}
