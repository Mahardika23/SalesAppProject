<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\Pemesanan as PemesananCollection;
use App\Http\Resources\PemesananResource as PemesananResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\User;
use App\toko;
use App\Pemesanan;
use Carbon\Carbon;
use App\Barang;
use Illuminate\Validation\Rule;

class PemesananController extends Controller
{
    public function index(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        $user_type = $user['userable_type'];
        $userPemesanan = User::find($user['id'])->userable;
        
        if ($user_type == 'App\Sales') {
            # code...

            $distri =  $userPemesanan->distributor;
            return $distri->pemesanan()->with('barang')->where('sales_id',$userPemesanan['id'])->get();
            // return $pemesanan = Pemesanan::with('barang:nama_barang,kategori_id,harga_barang,stok_barang,item_image')->where('sales_id',$userPemesanan['id'])->get();

        }
        elseif ($user_type == 'App\toko') {
            # code...
            // >>> Pemesanan::with(['distributor:id,nama_distributor','barang'])->where('toko_id',1)->get()
              $pemesanan = Pemesanan::with(['distributor' ,'barang'])->where('toko_id',$userPemesanan['id'])->get();
            return  new PemesananCollection($pemesanan);
        }
        elseif ($user_type == 'App\Distributor') {
            # code...
            
            return $pemesanan = Pemesanan::with('barang:barangs.id,nama_barang,kategori_id,barangs.harga_barang,stok_barang,item_image')->where('distributor_id',$userPemesanan['id'])->get();

        }
        else{
            return "Failed";
        }
      
        // return $user['userable_type'];
    }
    
    public function store(Request $request) {
        $user = JWTAuth::parseToken()->authenticate();
        $user_type = $user['userable_type'];
        $userPemesanan = User::find($user['id'])->userable;
        $request['toko_id'] = $userPemesanan['id'];
        $request['nama_toko'] = toko::find($userPemesanan['id'])->nama_toko;
        // $check = $userPemesanan->distributor()->wherePivot('sales_id','!=',null)->get();

        $validatedData = $request->validate([
            'toko_id' => 'required|numeric',
            'distributor_id' => 'required|numeric',
            'kuantitas_pesanan' => 'required',
            'sales_id' => 'numeric',
            'nama_toko' => 'required',
            'total_harga' => 'numeric|required',
            'status_pemesanan' => ['required', Rule::in(['menunggu konfirmasi','pesanan diproses','diantar','diterima toko','ditolak','selesai']),]
            
        ]);

        $pemesanan = new Pemesanan($validatedData);
            
        $pemesanan->save();

        // return $check;
        if(isset($check[0])){
            $input['sales_id'] = $check[0]['pivot']['sales_id'];
            
            $pesan = Pemesanan::findOrFail($pemesanan['id']);
            
            $pesan->update($input);

        // return ['message' => "test"];

            // return $pemesanan;
        }

        $idBarang = $request['barang']['id'];
        
        $qtyBarang = $request['barang']['kuantitas_barang'];
        $hargaBarang = $request['barang']['harga_barang'];
            
        foreach ($idBarang as $indexKey => $b) {
            $i = 0;
            // $harga = Barang::find($b)->harga_barang;
            
            $pemesanan->barang()->attach([$b => 
            ['kuantitas_barang' => $qtyBarang[$indexKey]
              ,'harga_barang' => $hargaBarang[$indexKey],
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
              ]
            
            ]);
            $i++;
        }   
         return response()->json($pemesanan,201);

    }

    public function update(Request $request,$id) {
        $validatedData = $request->validate([
            'toko_id' => 'required|numeric',
            'distributor_id' => 'required|numeric',
            'kuantitas_pesanan' => 'integer',
            'sales_id' => 'numeric',
            'total_harga' => 'numeric|required',
            'status_pemesanan' => ['required', Rule::in(['menunggu konfirmasi','pesanan diproses','diantar','diterima toko','ditolak','selesai']),]
            
        ]);
        $pemesanan = Pemesanan::findOrFail($id);
        // return $request->all();
        
        $pemesanan->update($validatedData);
        return response()->json($pemesanan, 200);
    }
    
    public function delete(Request $request, $id){
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();
        return 204;
    }
   


}
