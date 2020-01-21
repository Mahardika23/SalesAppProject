<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Distributor;
use JWTAuth;
use App\User;
use App\toko;
class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Distributor::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function searchBarang(Request $request)
    {
        //
        $id = $request['id'];
        $search =$request['search'];        
        return $distributor=Distributor::find($request['id'])->barang()
        ->where('nama_barang','LIKE','%'.$search.'%')->with('wilayah')->get();

    }
    public function getProfil(){
        $user = JWTAuth::parseToken()->authenticate();
        return $user->userable;

    }

    public function updateProfil(Request $request) {
        $user = JWTAuth::parseToken()->authenticate();
        $distributor = User::find($user['id'])->userable;
      
        
        // return $request->all();
        
        $distributor->update($request->all());
        return response()->json($distributor, 200);
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
        
        $distributor = new Distributor($request->all());
        $distributor->save();
        return response()->json($distributor,201);
    }


    public function updateStatusMitra(Request $request,$id){
        $tokoId = $id;
        $user = JWTAuth::parseToken()->authenticate();
        $distributor = User::find($user['id'])->userable ;
        // return $request['status'];
        // return $pesanan;
        // $pesanan->update($request['sales_id']);
        if($request->has('sales_id')){
         
            $pesanan = $distributor->pemesanan;
        
        }
        return $distributor->toko()->updateExistingPivot($tokoId,
        [
            'status' => $request['status'],
            'sales_id' => $request['sales_id']
        
        ]);
        $user->roles()->updateExistingPivot($roleId, $attributes);


    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        // return $toko['id'];
        //Distributor::with('barang')->where('id',1)->get();
        return $distributor=Distributor::with(['barang'])->where('distributors.id',$id)->get();;

    }
    public function showBarang($id)
    {
        //
        return $distributor=Distributor::find($id)->with('barang','wilayah');

    }

    public function konfirmasiDistributor(Request $request, $id){
        $distributor = Distributor::findOrFail($id);
        $distributor->update(['status' => 'aktif']);
        return response()->json($distributor, 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

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
        $distributor = Distributor::findOrFail($id);
        // return $request->all();
        $distributor->update($request->all());
        return response()->json($distributor, 200);
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
        $distributor = Distributor::findOrFail($id);
        $distributor->delete();
        return 204;
    }
}
