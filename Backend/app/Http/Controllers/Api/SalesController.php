<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sales;
use JWTAuth;
use App\User;
class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $user = JWTAuth::parseToken()->authenticate();
        $userSales = User::find($user['id'])->userable->sales;
        return $userSales;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nama_sales' => 'required|alpha|max:255',
            'no_hp' => 'required|regex:/(0)[0-9]{9}/',
            'province_id' =>'required|numeric',
            'regency_id' =>'required|numeric',
            'district_id' =>'required|numeric',
            'village_id' =>'required|numeric',
            'distributor_id' => 'required|numeric',
            
        ]);
        $sales = new Sales($validatedData);
        $sales->save();
        return response()->json($sales,201);

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
        return $sales=Sales::find($id);
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
        $validatedData = $request->validate([
            'nama_sales' => 'required|alpha|max:255',
            'no_hp' => 'required|regex:/(0)[0-9]{9}/',
            'province_id' =>'numeric',
            'regency_id' =>'numeric',
            'district_id' =>'numeric',
            'village_id' =>'numeric',
            
        ]);
        $sales = Sales::findOrFail($id);
        // return $request->all();
        $sales->update($request->all());
        return response()->json($sales, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {   
        $sales = Sales::findOrFail($id);
        $sales->delete();
        return 204;

        //

    }

    public function toko($id){
        return Sales::findOrFail($id)->toko;
    }
    public function pesanan($id){
        $sales =  Sales::findOrFail($id);
        return $sales->pemesanan;
    }
}
