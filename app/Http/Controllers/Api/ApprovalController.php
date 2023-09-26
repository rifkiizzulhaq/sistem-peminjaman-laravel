<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApprovalController extends Controller
{
    public function persetujuan($id){

        $items = Item::all();
        $item = Item::find($id);
        if(!$item){
            return response()->json([

            ]);
        }
        $IdPeminjaman = request()->input('IdPeminjaman');
        $tanggalPeminjaman = request()->input('tanggal_peminjaman');

        $response = Http::get('10.0.160.80:8000/api/item', [
            'IdPeminjaman' => $IdPeminjaman,
            'tanggal_peminjaman' => $tanggalPeminjaman,
        ]);

        if ($response->status() === 200 && $response->json('status') === 'Disetujui') {
            return;
        }
        else if ($response->status() === 200 && $response->json('status') === 'Ditolak') {
            return;
        }

    }
}
