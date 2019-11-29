<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Distributor;
class RegisterDistributorController extends Controller
{
    public function index(Request $request){
        $validatedData = $request->validate([
            'nama_distributor' => 'required|string|max:255',
            'alamat_distributor' => 'required|string|max:255',
            'email_distributor' => 'required|email',
            'province_id' =>'required',
            'regency_id' =>'required',
            'district_id' =>'required',
            'village_id' =>'required',
            
        ]);
        $distributor = Distributor::create($validatedData); 
    }
}
