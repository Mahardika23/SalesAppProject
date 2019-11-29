<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\User;
use App\toko;
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
        foreach($userDistributor as $i => ){
            // $temp=json_decode($i);
            $namaToko=1;
        }
        // $namaToko = toko::find($userDistributor)->nama_toko;
        return $namaToko;
    }
}
