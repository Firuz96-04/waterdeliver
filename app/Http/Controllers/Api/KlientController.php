<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Klient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Cloner\Data;

class KlientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
           if ($request->search) {
               $klient = Klient::query()
                   ->where(DB::raw('LOWER(company_name)'),'like',"%{$request->search}%")
                   ->orWhere('phone','like',"%{$request->search}%")
                   ->get();
               return response()->json([
                   'klient' => $klient,
                   'message' => 'OK'
               ]);
           }
           else {
               $klient = Klient::query()->get();
               return  response()->json([
                   'klient' => $klient,
                   'message' => 'OK'
               ]);
           }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data= date('Y-m-d');
        $klient = Klient::query()->create([
            'company_name' =>trim($request->company_name),
            'doljnost' =>trim($request->doljnost),
            'name' =>trim($request->name),
            'last_name' =>trim($request->last_name),
            'adress' =>trim($request->adress),
            'phone' =>trim($request->phone),
            'data_registr' => $data,
        ]);
        return  response()->json($klient);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
