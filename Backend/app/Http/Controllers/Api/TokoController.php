<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\toko;
use JWTAuth;
use App\User;
class TokoController extends Controller
{
    //
    public function index(){
        return toko::all();
    }
    // public function pesananToko(Request $request)
    // {
    //     $user = JWTAuth::parseToken()->authenticate();
    //     $userPemesanan = User::find($user['id'])->userable->pemesanan;
    //     $id = $request['id'];
    //     return toko::find($id)->pemesanan;
    // }
    public function updateProfil(Request $request) {
        $user = JWTAuth::parseToken()->authenticate();
        $toko = User::find($user['id'])->userable;
      
        
        // return $request->all();
        
        $toko->update($request->all());
        return response()->json($toko, 200);
    }
    public function update(Request $request, $id){
        $toko = findOrFail($id);
        $toko->update($request->all());
        return response()->json($toko, 200);

    }
    public function getProfil(){
        $user = JWTAuth::parseToken()->authenticate();
        return $user->userable;

    }
    
}
