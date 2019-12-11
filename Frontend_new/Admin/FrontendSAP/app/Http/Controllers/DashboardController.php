<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index(Request $request){
        
        $request->session()->get('login');
        if ($request->session()->has('login')) {
            $nama=$request->session()->get('nama');
            return view('beranda',['nama' => $nama]);
        }else{
            return Redirect::route('login');
        }
    }
}
