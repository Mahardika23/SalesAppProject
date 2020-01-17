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
        if ($user['userable_type'] == 'App\\Sales') {
            # code...
            $barangDistributor = User::find($user['id'])->userable->distributor->barang;
        }
        elseif($user['userable_type'] == 'App\\Distributor'){
            $barangDistributor = User::find($user['id'])->userable->barang;
        }
        return $barangDistributor;
        
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_id' => 'required|numeric|min:1|max:9',
            'harga_barang' => 'required|integer',
            'stok_barang' => 'required|integer',
            'item_image' => 'string',
            'regency_id' =>'required|numeric',
            'distributor_id' => 'required|numeric',
            
        ]);

        $validWilayahProdukData = $request->validate([
            'global' => 'boolean',
            'provinces_id' => 'numeric',
            'regency_id'     => 'numeric',
            




        ]);
        /*
        foreach ($idBarang as $indexKey => $b) {
            $i = 0;
            $harga = Barang::find($b)->harga_barang;
            
            $pemesanan->barang()->attach([$b => 
            ['kuantitas_barang' => $qtyBarang[$indexKey]
              ,'harga_barang' => $harga]
            
            ]);
            $i++;
        }   
        */
        $barang = new Barang($validatedData);
        $barang->save();
        return response()->json($barang, 201);
 
    }
    public function update(Request $request,$id) {
        $validatedData = $request->validate([
            'nama_barang' => 'required|alphanum|max:255',
            'kategori_id' => 'required|numeric|min:1|max:9',
            'harga_barang' => 'required|numeric',
            'stok_barang' => 'required|numeric',
            'item_image' => 'string',
            'district_id' =>'numeric',
            
        ]);
        $barang = Barang::findOrFail($id);
        // return $request->all();
        $barang->update($validatedData);
        return response()->json($barang, 200);
    }

    public function delete(Request $request, $id){
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return 204;
    }
}
