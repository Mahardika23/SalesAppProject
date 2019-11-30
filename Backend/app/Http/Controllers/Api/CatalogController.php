<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Distributor;
use App\Barang;
use JWTAuth;
use App\User;

class CatalogController extends Controller
{
    public function showall()
    {
        // $distributor = 
        return $barang = Barang::all();
    }
    public function showalltoWeb()
    {
        // $distributor = 
        return $barang = Barang::paginate(6);
    }
    public function showByFilter(Request $request)
    {

        // $id = Distributor::find(1)->where('province_id','11')->pluck('id');
        return $barang = Barang::find(1)
            ->join('distributors', 'barangs.distributor_id', '=', 'distributors.id')
            ->select('barangs.*', 'distributors.nama_distributor')->where('distributors.regency_id', $request['regency_id'])
            /*->orWhere('distributors.regency_id',$request['regency_id'])*/->get();
        // return $barang = Barang::all()->where('distributor_id',['11','12']);

        Barang::allowFilter()->get();
    }
    public function showByUser(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $userToko = User::find($user['id'])->userable->regency_id;
        return $barang = Barang::find(1)
            ->join('distributors', 'barangs.distributor_id', '=', 'distributors.id')
            ->select('barangs.*', 'distributors.nama_distributor')->where('distributors.regency_id', $userToko)
            ->get();
    }
    public function searchBy(Request $request)
    {
        if (!empty($request['search'])) {
            $hasil = Barang::where('nama_barang', $request['search'])->get();
            if (!empty($hasil[0])) {
                return $hasil;
            }
            $hasil[0] = Distributor::where('nama_distributor', $request['search'])->get();
            return $hasil;
            // else {
            //     $message = ['message' => 'data tidak ditemukan'];
            //     return $message;
            // }
        }
    }
    public function getBarangDistributor(Request $request){
        return $barang = Distributor::where('');
    }
}
