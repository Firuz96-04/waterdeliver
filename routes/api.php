<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KlientController;
use App\Http\Controllers\Api\DogovorController;
use App\Http\Controllers\Api\WaterPriceController;
use App\Http\Controllers\Api\OrderDogovorController;
use \App\Http\Controllers\Api\TakeWaterController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('klient', KlientController::class);
Route::apiResource('dogovor',DogovorController::class);
Route::prefix('water')->group(function () {
        Route::get('/',[WaterPriceController::class,'index'])->name('water.index');
        Route::post('/{water}',[WaterPriceController::class,'update'])->name('water.update');
});
Route::prefix('order-dogovor')->group(function () {
    Route::get('/',[OrderDogovorController::class,'index']);
    Route::post('/',[OrderDogovorController::class,'store']);
    Route::post('/{order}',[OrderDogovorController::class,'update']);
    Route::post('/oplataupdate/{order}',[OrderDogovorController::class,'oplatadogovor']);
});

Route::prefix('take-water')->group(function () {
    Route::get('/',[TakeWaterController::class,'index'])->name('take-water.index');
});
