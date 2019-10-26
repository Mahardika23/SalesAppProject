<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provinces;
use App\Regency;
use App\District;

class provincesController extends Controller
{   
    public function regency(Request $request){

        $regencies = Provinces::find($request['province_id'])->regencies;
        
       
        return response($regencies);

        
        
    }
    
    public function district(Request $request){

        $districts  = Regency::find($request['regency_id'])->districts;

        return response($districts);

        
        
    }

    public function village(Request $request){

        $villages = District::find($request['district_id'])->village;

        return response($villages);

        
        
    }

}
