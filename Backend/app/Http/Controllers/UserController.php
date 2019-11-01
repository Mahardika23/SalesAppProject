<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\toko;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class UserController extends Controller
{
    //
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'email' => 'required|string|email|max:255',
                'password'=> 'required'
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors());
            }
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
            $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            // 'userable_id' =>'required',
            // 'userable_type' =>'required|string',
        ]);
        $validatedTokoData =$request->validate([
            'nama_toko' => 'required|string|max:100',
            'nama_pemilik' => 'required|string|max:100',
            'no_telp' => 'required',
            'alamat_toko' => 'required|string|max:255',
            'email_pemilik' => 'required|email',
            'province_id' =>'required',
            'regency_id' =>'required',
            'district_id' =>'required',
            'village_id' =>'required',
            
        ]);
        // $dataToko = ['nama_toko' => '']
        // $dataToko->nama_toko  = $request->get('nama_toko');
        // $dataToko->nama_pemilik  = $request->get('nama_pemilik');
        // $dataToko->no_telp  = $request->get('no_telp');
        // $dataToko->alamat_toko  = $request->get('alamat_toko');
        // $dataToko->email_pemilik  = $request->get('email_pemilik');
        // $dataToko->province_id  = $request->get('province_id');
        // $dataToko->regency_id  = $request->get('regency_id');
        // $dataToko->district_id  = $request->get('district_id');
        // $dataToko->village_id  = $request->get('village_id');
        // $dataTokoJson = json_encode($dataToko);
        // $validatedUserData['password'] = bcrypt($request->password);
        $toko = toko::create($validatedTokoData);


        if($validator->fails() && $validatedTokoData->fails()){
                return response()->json($validator->errors()->toJson());
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'userable_type' =>get_class($toko),
            'userable_id' => $toko->id,
            'password' => Hash::make($request->get('password')),
        ]);
        // $user = new User;
        // $user->name = $request->get('name');
        // $user->email = $request->get('email');
        // $user->password = bcrypt($request->get('password'));
        // $user->userable()->save($validatedTokoData);
        // $token = JWTAuth::fromUser($user);
            
        return response()->json(compact('user','token'),201);
    }

    public function getAuthenticatedUser()
        {
                try {

                        if (! $user = JWTAuth::parseToken()->authenticate()) {
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
