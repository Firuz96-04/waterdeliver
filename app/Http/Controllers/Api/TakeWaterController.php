<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TakeWater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TakeWaterController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search) {
            $takeWater = TakeWater::query()
                ->where(DB::raw("LOWER(klient_name)"), 'LIKE', "%{$request->search}%")
                ->orWhere('take_date','LIKE',"%{$request->search}%")
                ->orderByDesc('id')->get();
            return response()->json($takeWater);
        }
        else {
            $takeWater = TakeWater::query()->orderByDesc('id')->get();
            return  response()->json($takeWater);
        }
    }
}
