<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\SuperadminController::class, 'dashboard'])->name('dashboard');
    Route::middleware(['checkUserRole:SuperAdmin'])->group(function () {
        Route::get('/admin', [App\Http\Controllers\SuperadminController::class, 'admin'])->name('admin');
        Route::get('/create-admin', [App\Http\Controllers\SuperadminController::class, 'create_admin'])->name('create_admin');
        Route::post('/submit-admin', [App\Http\Controllers\SuperadminController::class, 'store_admin'])->name('store_admin');
        Route::get('/edit-admin/{id}', [App\Http\Controllers\SuperadminController::class, 'edit_admin'])->name('edit_admin');
        Route::put('/update-admin/{id}', [App\Http\Controllers\SuperadminController::class, 'update_admin'])->name('update_admin');
        Route::delete('/delete-admin/{id}', [App\Http\Controllers\SuperadminController::class, 'delete_admin'])->name('delete_admin');

        Route::get('/mahasiswa', [App\Http\Controllers\SuperadminController::class, 'mahasiswa'])->name('mahasiswa');
        Route::get('/create-mahasiswa', [App\Http\Controllers\SuperadminController::class, 'create_mahasiswa'])->name('create_mahasiswa');
        Route::post('/submit-mahasiswa', [App\Http\Controllers\SuperadminController::class, 'store_mahasiswa'])->name('store_mahasiswa');
        Route::get('/edit-mahasiswa/{id}', [App\Http\Controllers\SuperadminController::class, 'edit_mahasiswa'])->name('edit_mahasiswa');
        Route::put('/update-mahasiswa/{id}', [App\Http\Controllers\SuperadminController::class, 'update_mahasiswa'])->name('update_mahasiswa');
        Route::delete('/delete-mahasiswa/{id}', [App\Http\Controllers\SuperadminController::class, 'delete_mahasiswa'])->name('delete_mahasiswa');
    });
    Route::middleware(['checkUserRole:Admin'])->group(function(){
        Route::get('/barang', [App\Http\Controllers\AdminController::class, 'item'])->name('item');
        Route::get('/create-item', [App\Http\Controllers\AdminController::class, 'create_item'])->name('create_item');
        Route::post('/submit-item', [App\Http\Controllers\AdminController::class, 'store_item'])->name('store_item');
        Route::get('/edit-item/{id}', [App\Http\Controllers\AdminController::class, 'edit_item'])->name('edit_item');
        Route::put('/update-item/{id}', [App\Http\Controllers\AdminController::class, 'update_item'])->name('update_item');
        Route::delete('/delete-item/{id}', [App\Http\Controllers\AdminController::class, 'delete_item'])->name('delete_item');

        Route::get('/peminjaman/admin', [App\Http\Controllers\AdminController::class, 'peminjaman'])->name('admin.peminjaman');
        Route::get('/peminjaman/admin/request', [App\Http\Controllers\AdminController::class, 'request_pinjaman'])->name('admin.request_pinjaman');
        Route::post('/peminjaman/{id}/accept}', [App\Http\Controllers\AdminController::class, 'accept_pinjaman'])->name('admin.accept_pinjaman');
        Route::post('/peminjaman/{id}/deny}', [App\Http\Controllers\AdminController::class, 'deny_pinjaman'])->name('admin.deny_pinjaman');
        Route::post('/peminjaman/{id}/done}', [App\Http\Controllers\AdminController::class, 'done_pinjaman'])->name('admin.done_pinjaman');

        Route::get('/pengembalian/admin', [App\Http\Controllers\AdminController::class, 'pengembalian'])->name('admin.pengembalian');
    });
    Route::middleware(['checkUserRole:mahasiswa'])->group(function(){
        Route::get('/lab', [App\Http\Controllers\MahasiswaController::class, 'index'])->name('index');
        Route::get('/lab/{item}', [App\Http\Controllers\MahasiswaController::class, 'items'])->name('lab.item');
        Route::post('/add-to-cart/{id}', [App\Http\Controllers\MahasiswaController::class, 'addToCart'])->name('addToCart');
        Route::get('/my-cart', [App\Http\Controllers\MahasiswaController::class, 'my_cart'])->name('myCart');
        Route::post('/my-cart/{id}/add', [App\Http\Controllers\MahasiswaController::class, 'add_my_cart'])->name('add_my_cart');
        Route::delete('/my-cart/{id}', [App\Http\Controllers\MahasiswaController::class, 'destroy_my_cart'])->name('destroy_my_cart');
        Route::post('/items-checkout', [App\Http\Controllers\MahasiswaController::class, 'checkout'])->name('checkout');
        Route::get('/peminjaman', [App\Http\Controllers\MahasiswaController::class, 'peminjaman'])->name('peminjaman');
    });
});

