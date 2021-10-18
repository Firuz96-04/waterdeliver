<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderDogovor;
use App\Models\TakeWater;
use App\Models\WaterPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderDogovorController extends Controller
{
    public function index(Request $request) {
        if ($request->search !=''){
                    $OrderDogovor = OrderDogovor::query()->whereHas('klient',function ($query) use ($request){
                    $query->where(DB::raw('LOWER(company_name)'),'LIKE',"%{$request->search}%");
                     })
                        ->with('klient',function ($query) use ($request){
                            $query->where(DB::raw('LOWER(company_name)'),'LIKE',"%{$request->search}%");
                        })->get();
                    return response()->json([
                       'orderDogovor' => $OrderDogovor
                    ]);
        }
        else {
            $OrderDogovor = OrderDogovor::query()->with('klient')->orderByDesc('id')->get();
            return response()->json([
                'orderDogovor' => $OrderDogovor
            ]);
        }
    }
    public function store(Request $request) {
            $order = OrderDogovor::query()->create([
               'klient_id' => $request->dogovor_id,
               'date_start' => $request->date_start,
               'date_end' => $request->date_end,
               'dogovor_price' => $request->dogovor_price,
                'dogovor_price_old' => $request->dogovor_price
            ]);
            return response()->json($order);
    }
    public function update(Request $request,$id) {
        $water_price = WaterPrice::query()->first();
       $takeWater = TakeWater::query();
        $price = floatval($water_price->water_price);
        $count = intval($request->bootle) * $price;
        $dogovor = OrderDogovor::query()->find($id);


        $sum = ( floatval($dogovor->dogovor_price) - $count);
        $water_summ = intval($request->bootle) * $price;
            $takeWater->create([
                'dogovor_id' => $request->id,
                'take_date' => $request->take_date,
                'water_column' => $request->bootle,
                'water_summ' => $water_summ,
                'klient_name' => $request->klient_name
            ]);
            $dogovor->update([
                    'dogovor_price' => $sum
            ]);
            return response()->json($dogovor);
        }
        public function oplatadogovor(Request $request,$id) {
            $dogovor = OrderDogovor::query()->find($id);
                $old_sum = floatval($dogovor->dogovor_price);
                $dogovor_price_old = floatval($dogovor->dogovor_price_old);

            $dogovor->update([
                'dogovor_price' => $old_sum + floatval($request->dogovor_price),
                'dogovor_price_old' => $dogovor_price_old + floatval($request->dogovor_price)
            ]);
            return response()->json($dogovor);
        }
}
