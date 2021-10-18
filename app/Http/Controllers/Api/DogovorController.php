<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dogovor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DogovorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
                        if ($request->search !='') {
                            $dogovor = Dogovor::query()->whereHas('klient',function ($query) use ($request) {
                            //    $search = strtolower($request->search);
                               $query->where(DB::raw('LOWER(company_name)'),'LIKE',"%{$request->search}%");
                            })
                            ->with('klient',function ($query) use ($request) {{
                           //     $search = strtolower($request->search);
                                $query->where(DB::raw('LOWER(company_name)'),'LIKE',"%{$request->search}%");
                            }})->get();
                            return response()->json([
                                'dogovor' => $dogovor
                            ]);
                }
                else {
                    $dogovor = Dogovor::query()->with('klient')->orderByDesc('id')->get();
                    return response()->json([
                        'dogovor' => $dogovor
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $dogovor = Dogovor::query()->find($id);

        $dogovor->update([
            'schet' => $request->schet,
            'client_mfo'=>$request->client_mfo,
            'client_inn' => $request->client_inn,
            'client_comment' => $request->client_comment
        ]);
        return response()->json($dogovor);
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
