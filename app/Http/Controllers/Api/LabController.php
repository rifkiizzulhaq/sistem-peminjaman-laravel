<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lab;
use Illuminate\Http\Request;

class LabController extends Controller
{
    public function index(){
        $labs = Lab::all();
        return response()->json([
            'status' => true,
            'data' => $labs,
        ]);
    }

    public function lab_with_item($items){
        $lab = Lab::where('name', $items)
            ->with('items')
            ->first();
        if(!$lab){
            return response()->json([
                'status' => false,
                'message' => 'lab not found',
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $lab,
        ]);
    }
}
