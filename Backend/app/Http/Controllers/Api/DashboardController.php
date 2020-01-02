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

        $totalPemesanan = $usernya->pemesanan->count();
        $totalToko = $usernya->toko->count();
        if ($user['userable_type'] == 'App\\Sales') {
            # code...
            $totalBarang = $usernya->distributor->barang->count();
            return ['total'=>['pemesanan' => $totalPemesanan, 'toko' => $totalToko, 'barang' => $totalBarang ]];

        }
        else {
            # code...
            $totalBarang = $usernya->barang->count();
             $totalSales= $usernya->sales->count();
             return ['total'=>['pemesanan' => $totalPemesanan, 'toko' => $totalToko, 'barang' => $totalBarang , 'sales' => $totalSales]];

        }
        
    }
}
