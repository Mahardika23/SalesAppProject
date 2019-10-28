<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class RegisterController extends Controller
{
    //
    public function Register(Request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'userable_id' =>'required',
            'userable_type' =>'required|string',
        ]);

        $validatedData['password'] = bcrypt($request->password);
        
        $user = User::create($validatedData);
        $accessToken = $user->createToken('authToken')->accessToken;
        return response(['user' => $user , 'access_token' => $accessToken]);

    }
}
