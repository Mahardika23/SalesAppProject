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
        $user_type = $user['userable_type'];
        $userPemesanan = User::find($user['id'])->userable;
        
        if ($user_type == 'App\Sales') {
            # code...
            return $pemesanan = Pemesanan::with('barang:nama_barang,kategori_id,harga_barang,stok_barang,item_image')->where('sales_id',$userPemesanan['id'])->get();

        }
        elseif ($user_type == 'App\toko') {
            # code...
            return $pemesanan = Pemesanan::with('barang:nama_barang,kategori_id,harga_barang,stok_barang,item_image')->where('toko_id',$userPemesanan['id'])->get();

        }
        elseif ($user_type == 'App\Distributor') {
            # code...
            return $pemesanan = Pemesanan::with('barang:nama_barang,kategori_id,harga_barang,stok_barang,item_image')->where('distributor_id',$userPemesanan['id'])->get();

        }
        else{
            return "Failed";
        }
      
        // return $user['userable_type'];
    }
    
    public function store(Request $request) {
        $request['nama_toko'] = toko::find($request['toko_id'])->nama_toko;
        $pemesanan = new Pemesanan($request->except(['barang']));
  
        $pemesanan->save();
        $idBarang = $request['barang']['id'];
        $qtyBarang = $request['barang']['kuantitas_barang'];
        // return $barang;
        foreach ($idBarang as $b) {
            $i = 0;
            $pemesanan->barang()->attach([$b => ['kuantitas_barang' => $qtyBarang[$i]]]);
            $i++;
        }   
        return response()->json($pemesanan,201);
 
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
