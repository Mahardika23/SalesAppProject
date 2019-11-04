<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provinces;
use App\Regency;
use App\District;

class WilayahController extends Controller
{
    //
    public function province(Request $request){
        $province = Provinces::all();
        return response($province);
    }
    public function regency(Request $request){

        $regencies = Provinces::find($request['province_id'])->regencies()->select('id','name')->get();
        
       
        return response($regencies);

        
        
    }
    
    public function district(Request $request){

        $districts  = Regency::find($request['regency_id'])->districts()->select('id','name')->get();

        return response($districts);

        
        
    }

    public function village(Request $request){

        $villages = District::find($request['district_id'])->villages()->select('id','name')->get();
        return response($villages);

        
        
    }
}
