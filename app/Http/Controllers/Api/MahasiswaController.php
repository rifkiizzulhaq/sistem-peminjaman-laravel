<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class MahasiswaController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $item = Item::find($id);

        if (!$item) {
            return response()->json([
                'status' => false,
                'message' => 'data tidak ada',
            ]);
        }

        // Cek apakah item sudah ada dalam keranjang
        $existingCart = Cart::where('user_id', $user->id)
            ->where('items_id', $id)
            ->first();

        if ($existingCart) {
            // Jika item sudah ada dalam keranjang, tambahkan jumlahnya
            $existingCart->increment('quantity');
        } else {
            // Jika item belum ada dalam keranjang, tambahkan item baru
            Cart::create([
                'user_id' => $user->id,
                'items_id' => $id,
                'quantity' => 1,
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'berhasil',
        ]);
    }

    public function myCart(){
        $user = JWTAuth::parseToken()->authenticate();

        $myCart = Cart::with('item.lab')
            ->where('user_id', $user->id)
            ->get();
            return response()->json([
                'status' => true,
                'message' => $myCart
            ]);
    }

    public function destroy_my_cart($id){
        $myCart = Cart::find($id);
        if (!$myCart) {
            return response()->json([
                'status' => false,
                'message' => 'not found'
            ]);
        }
        if ($myCart->quantity > 1) {
            $myCart->quantity = $myCart->quantity - 1;
            $myCart->save();
            return response()->json([
                'status' => true,
                'message' => 'berhasil mengurangi'
            ]);
        }
        $myCart->delete();
        return response()->json([
            'status' => true,
            'message' => 'berhasil menghapus'
        ]);
    }

    public function add_item_my_cart($id){
        $myCart = Cart::find($id);
        if (!$myCart) {
            return response()->json([
                'status' => false,
                'message' => 'cart is empty'
            ]);
        }

        $myCart->quantity = $myCart->quantity + 1;
        $myCart->save();

        $myCart->save();
        return response()->json([
            'status' => true,
            'message' => 'berhasil menambahkan ke cart'
        ]);
    }

    public function checkout()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $myCart = Cart::where('user_id', $user->id)->get();

        foreach ($myCart as $cartItem) {

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
        // dd('data pindah ke transaction');
        return response()->json([
            'status' => true,
            'message' => 'berhasil checkout'
        ]);
    }

    public function peminjaman(){
        $user = JWTAuth::parseToken()->authenticate();
        $transaction = Transaction::with(['item','user'])->where('user_id',$user->id)->get();
        // dd($transaction);
        return response()->json([
            'status' => true,
            'data' => $transaction
        ]);
    }
}
