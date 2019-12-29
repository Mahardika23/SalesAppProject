<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index(Request $request){
        
        // var_dump($form);
        $token = $request->session()->get('token');
        //user
        $user = $request->session()->get('user');
        //nama
        $nama = $request->session()->get('nama');
        //user type
        $user_type = $request->session()->get('user_type');
        return view('beranda',['user' => $user]);
    }
}
