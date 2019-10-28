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

            // $credentials = request(['email', 'password']);
            if (!$token = auth('api')->attempt($loginData)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            return response()->json([
                'token' => $token,
                'expires' => auth('api')->factory()->getTTL() * 60,
            ]);
    }
}
