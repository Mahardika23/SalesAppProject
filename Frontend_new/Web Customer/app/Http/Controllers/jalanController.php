<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jalanController extends Controller
{
    //
    public function home(){
        return view('home');
    }
    public function aktivitas(){
        return view('aktivitas');
    }
    public function login(){
        return view('login');
    }
}
