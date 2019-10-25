<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
   public function login(Request $request){
        $loginData = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required'],

        ]);
        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
            # code...
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user() , 'access_token' => $accessToken]);

    }
}
