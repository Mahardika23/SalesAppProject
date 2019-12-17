<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\User;
use App\toko;
use App\Pemesanan;
class PemesananController extends Controller
{
    public function index(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        $userPemesanan = User::find($user['id'])->userable->pemesanan;
        // $id = $userDistributor["data"]['toko_id'];
        $test = User::find(5)->userable->pemesanan;
       
        // $namaToko = toko::find($userDistributor)->nama_toko;
        return $test;
    }
    
    public function store(Request $request) {
        $pemesanan = new Pemesanan($request->all());
        $pemesanan->save();
        return response()->json($pemesanan, 201);
 
    }
    public function update(Request $request,$id) {
        $pemesanan = Pemesanan::findOrFail($id);
        // return $request->all();
        $pemesanan->update($request->all());
        return response()->json($pemesanan, 200);
    }
    
    public function delete(Request $request, $id){
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();
        return 204;
    }
   


}
