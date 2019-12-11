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
        $userDistributor = User::find($user['id'])->userable->pemesanan;
        // $id = $userDistributor["data"]['toko_id'];
        $count = 0;
        foreach ($variable as $key => $value) {
            # code...
        }
       
        // $namaToko = toko::find($userDistributor)->nama_toko;
        return $namaToko;
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
