<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index(Request $request){
        $client =  new Client();
        
        // var_dump($form);
        $token = $request->session()->get('token');
        $nama=$request->session()->get('nama');
        return view('beranda',['nama' => $nama]);
    }
}
