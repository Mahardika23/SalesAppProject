<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provinces;
use App\Regency;
use App\District;
use App\Wilayah;

class WilayahController extends Controller
{
    //
    public function province(Request $request){
        $province = Wilayah::where('id','LIKE','__')->get();
        return response($province);
    }
    public function regency(Request $request){
        $q = $request['province_id'].'__';
        $regencies = Wilayah::where('id','LIKE',$q)->get();
        
       
        return response($regencies);

        
        
    }
    
    public function district(Request $request){
        $q = $request['regency_id'].'___';

       $districts =  Wilayah::where('id','LIKE',$q)->get();

        return response($districts);

        
        
    }

    public function village(Request $request){
        $q = $request['district_id'].'___';
        $villages = Wilayah::where('id','LIKE',$q)->get();
        return response($villages);

        
        
    }
}
