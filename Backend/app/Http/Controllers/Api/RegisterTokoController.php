<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use App\toko;
use App\User;
class RegisterTokoController extends Controller
{
   public function index(Request $request){
        $validatedData = Validator::make($request->all(), [
            'nama_toko' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255',
            'no_telp' => 'required|integer',
            'alamat_toko' => 'required|string|max:255',
            'email_pemilik' => 'required|email',
            'province_id' =>'required',
            'regency_id' =>'required',
            'district_id' =>'required',
            'village_id' =>'required',
            
        ]);

        $toko = toko::create([
            'nama_toko' => $request->get('nama_toko'),
            'nama_pemilik' => $request->get('nama_pemilik'),
            'no_telp' => $request->get('no_telp'),
            'alamat_toko' => $request->get('alamat_toko'),
            'email_pemilik' => $request->get('email_pemilik'),
            'province_id' =>$request->get('province_id'),
            'regency_id' =>$request->get('regency_id'),
            'district_id' =>$request->get('district_id'),
            'village_id' =>$request->get('village_id'),
        
            ]);
        
        $toko->user()->save(User::find(1));
        return response(['toko' => $toko ]);

    }
}
