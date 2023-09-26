<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LabController;
use App\Http\Controllers\Api\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Contracts\Providers\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/login', [AuthController::class, 'login']);
Route::middleware([ 'auth:api'])->group(function () {
    Route::get('/labs', [LabController::class, 'index']);
    Route::get ('/labs/{item}', [LabController::class, 'lab_with_item']);

    Route::get('/my-cart', [MahasiswaController::class, 'myCart']);
    Route::post('/add-to-cart/{id}', [MahasiswaController::class, 'addToCart']);
    Route::delete('/my-cart/{id}', [MahasiswaController::class, 'destroy_my_cart']);
    Route::post('/my-cart/{id}/add', [MahasiswaController::class, 'add_item_my_cart']);
    Route::post('/checkout', [MahasiswaController::class, 'checkout']);
    Route::get('/peminjaman', [MahasiswaController::class, 'peminjaman']);
});
