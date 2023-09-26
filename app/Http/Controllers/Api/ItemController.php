<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return response()->json([
            'message' => 'item q',
            'data' => $items
        ]);
    }

    public function store(Request $request){
        $attrs = $request->validate([
            'name' => 'required',
            'lab' => 'required',
            'jenis' => 'required',
            'stock' => 'required',
        ]);
        $data = Item::create([
            'name' => $attrs['name'],
            'lab_id' => $attrs['lab'],
            'type' => $attrs['jenis'],
            'stock' => $attrs['stock'],
            'borrowed' => 0,
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }
    public function update(Request $request,$id){

        $item = Item::find($id);

        if(!$item){
            return response()->json([
                'message' => 'gada datanya',
            ]);
        }
        $attrs = $request->validate([
            'name' => 'required',
            'lab' => 'required',
            'jenis' => 'required',
            'stock' => 'required',
            'borrowed' => 'required'
        ]);

        $item->name = $attrs['name'];
        $item->lab_id =  $attrs['lab'];
        $item->jenis = $attrs['jenis'];
        $item->stock = $attrs['stock'];
        $item->borrowed = $attrs['borrowed'];

        return response()->json([
            'message' => 'berhasil',
            'data' => $item
        ]);
    }
    public function destroy($id){

        $item = Item::find($id);

        if(!$item){
            return response()->json([
                'message' => 'gada datanya',
            ]);
        }
        $item->delete();

        return response()->json([
            'message' => 'berhasil dihaps',
        ]);
    }
}
