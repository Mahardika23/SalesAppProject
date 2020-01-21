<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Barang;
use JWTAuth;
use App\User;
use App\Http\Resources\BarangCollection;
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
            $user_id = User::find($user['id'])->userable->id;
            $barangDistributor = Barang::with(['wilayah'])->where('distributor_id',$user_id)->get();
      
        }
        return new BarangCollection($barangDistributor);
        
    }
    public function store(Request $request){
        
        $validatedData = $request->validate([
            'nama_barang'       => 'required|string|max:255',
            'kategori_id'       => 'required|numeric|min:1|max:9',
            'harga_barang'      => 'required|integer',
            'stok_barang'       => 'required|integer',
            'item_image'        => 'string',
            'distributor_id'    => 'required|numeric',
            'global'            => 'required|boolean',
            'deskripsi_produk'  => 'string',
        ]);
        // return $validatedData;
        $barang = new Barang($validatedData);
        $barang->save();
        
        $validWilayahProdukData = $request->validate([
            'wilayah_id' => 'array',
        ]);

        if($request['global'] != '1'){
           
            $wilayahId = $request['wilayah_id'];
            foreach ($wilayahId as $indexKey => $w) {
           
                
                $barang->wilayah()->attach($w);
            
            }   
        }
        
        return response()->json($barang, 201);
 
    }
    public function update(Request $request,$id) {
        $validatedData = $request->validate([
            'nama_barang'    => 'required|alphanum|max:255',
            'kategori_id'    => 'required|numeric|min:1|max:9',
            'harga_barang'   => 'required|numeric',
            'stok_barang'    => 'required|numeric',
            'item_image'     => 'string',
            'district_id'    => 'numeric',
            'global'         => 'boolean',
        ]);
        
        $barang = Barang::findOrFail($id);
        // return $request->all();
        $check = $barang->wilayah()->exists();
        $barang->update($validatedData); 
        $barang->wilayah()->detach();
        
        if($request->has('wilayah_id' && $request['global'] != 1) ){
            foreach ($request['wilayah_id'] as $key => $w) {
        
                $barang->wilayah()->save($barang,['wilayah_id' => $w]);

            }
        }
      
        return response()->json($barang, 200);
    }

    public function delete(Request $request, $id){
        $barang = Barang::findOrFail($id);
        $barang->wilayah()->detach();
        $barang->delete();
        return 204;
    }
}
