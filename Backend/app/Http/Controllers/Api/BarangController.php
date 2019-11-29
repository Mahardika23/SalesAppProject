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
}
