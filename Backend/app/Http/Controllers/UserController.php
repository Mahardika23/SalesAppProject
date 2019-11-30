<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\toko;
use App\Distributor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use PhpOption\None;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    //
    // public function __construct(){
    //     $this->middleware('auth:api',['except' => ['login']]);
    // }
    public function authenticate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
        $userable = 0;
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            // 'userable_id' =>'required',
            // 'userable_type' =>'required|string',
        ]);
        if ($request->has('nama_toko')) {
            # code...

            $validatedTokoData = $request->validate([
                'nama_toko' => 'required|string|max:100',
                'nama_pemilik' => 'required|string|max:100',
                'no_telp' => 'required',
                'alamat_toko' => 'required|string|max:255',
                'email_pemilik' => 'required|email',
                'province_id' => 'required',
                'regency_id' => 'required',
                'district_id' => 'required',
                'village_id' => 'required',

            ]);

            $toko = toko::create($validatedTokoData);

            $userable = $toko;
            
        } elseif ($request->has('nama_distributor')) {
            $validatedDistributorData = $request->validate([
                'nama_distributor' => 'required|string|max:255',
                'alamat_distributor' => 'required|string|max:255',
                'email_distributor' => 'required|email',
                'province_id' => 'required',
                'regency_id' => 'required',
                'district_id' => 'required',
                'village_id' => 'required',

            ]);
            $distributor = Distributor::create($validatedDistributorData);
            $userable=$distributor;
           
        }
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'userable_type' => get_class($userable),
            'userable_id' => $userable->id,
            'password' => Hash::make($request->get('password')),
        ]);
        // $user = new User;
        // $user->name = $request->get('name');
        // $user->email = $request->get('email');
        // $user->password = bcrypt($request->get('password'));
        // $user->userable()->save($validatedTokoData);
        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 201);
    }
    public function refresh()
    {
        $token = JWTAuth::refresh();
        return response()->json(compact('token'));
    }
    public function logout()
    {
        JWTAuth::invalidate();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function getAuthenticatedUser()
    {
        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());
        }

        return response()->json(compact('user'));
    }
}
