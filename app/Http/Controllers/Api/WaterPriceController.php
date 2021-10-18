<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WaterPrice;
use Illuminate\Http\Request;

class WaterPriceController extends Controller
{
    public function index() {
            $water_price = WaterPrice::query()->first();
               // dd(intval($water_price->water_price);

            return response()->json([
                'water_price' =>$water_price
            ]);

    }

    public function update(Request $request,$id) {
        $water_price = WaterPrice::query()->find($id);

        $water_price->update([
            'water_price' => $request->water_price
        ]);
        return response()->json($water_price);
    }
}
