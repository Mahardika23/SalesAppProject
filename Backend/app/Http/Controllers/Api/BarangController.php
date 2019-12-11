<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Barang;
use JWTAuth;
use App\User;
class BarangController extends Controller
{
    //
    public function index(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        return $userDistributor = User::find($user['id'])->userable->barang;
        
    }
    public function store(Request $request){
        $barang = new Barang($request->all());
        $barang->save();
        return response()->json($barang, 201);
 
    }
    public function update(Request $request,$id) {
        $barang = Barang::findOrFail($id);
        // return $request->all();
        $barang->update($request->all());
        return response()->json($barang, 200);
    }

    public function delete(Request $request, $id){
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return 204;
    }
}
