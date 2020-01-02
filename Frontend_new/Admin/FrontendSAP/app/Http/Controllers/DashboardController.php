<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index(Request $request){
        $client =  new Client();
        

        $request->session()->put('page','dashboard');
        
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
