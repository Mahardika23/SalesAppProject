<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\User;
class DashboardController extends Controller
{
    //
    public function index(){

        $user = JWTAuth::parseToken()->authenticate();
        $usernya = User::find($user['id'])->userable;
        // return $user;
        // return $totalPemesanan;
        if ($user['userable_type'] == 'App\Sales') {
            # code...
            // return ['message' => 'hello'];
            // return $distri->pemesanan()->with('barang')->where('sales_id',$userPemesanan['id'])->get();

            $totalPemesanan = $usernya->distributor->pemesanan()->where('sales_id',$usernya['id'])->get()->count();

            $totalToko = $usernya->distributor->toko()->wherePivot('sales_id',$usernya['id'])->count();

            $totalBarang = $usernya->distributor->barang->count();
            return ['total'=>['pemesanan' => $totalPemesanan, 'toko' => $totalToko, 'barang' => $totalBarang ]];

        }
        else {
            # code...
            $totalPemesanan = $usernya->pemesanan->count();

            $totalToko = $usernya->toko->count();

            $totalBarang = $usernya->barang->count();
             $totalSales= $usernya->sales->count();
             return ['total'=>['pemesanan' => $totalPemesanan, 'toko' => $totalToko, 'barang' => $totalBarang , 'sales' => $totalSales]];

        }
        
    }
}
