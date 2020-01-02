<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\toko;
use JWTAuth;
use App\User;
use App\Distributor;
use Carbon\Carbon;

class TokoController extends Controller
{
    //
    public function index(){
        return toko::all();
    }

    public function ajukanDistributor(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        $toko = User::find($user['id'])->userable;
        $distributorId = $request['distributor_id'];

        
       $check = toko::find($toko['id'])->distributor()->wherePivot('distributor_id',$distributorId)->get();
     
       if(empty($check[0])){
        toko::find($toko['id'])->distributor()
            ->attach(
                $distributorId,[
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')

                ]);
                $check =   $toko->distributor()->wherePivot('distributor_id',$distributorId)->get();
            }
        else{
            // $mitra = toko::find($toko['id'])->distributor;
            $check = ['message' => 'anda sudah mengajukan mitra sebelumnya','mitra' => ['distributor' => $check[0]['nama_distributor'],'status' => $check[0]['pivot']['status']]];

        }
        return $check;
    }

    public function tokoSales(){
        $user = JWTAuth::parseToken()->authenticate();
        $sales = User::find($user['id'])->userable;
        $toko = $sales->distributor->toko()->wherePivot('sales_id',$sales['id'])->get();
        // return $toko=Distributor::find($distributor['id'])->toko;
        return $toko;
    }
    public function tokoByUser(){
        $user = JWTAuth::parseToken()->authenticate();
        // $distributor = User::find($user['id'])->userable;
        $sales = User::find($user['id'])->userable;
            if($user['userable_type'] == "App\Sales"){
                $toko = $sales->distributor->toko()->wherePivot('sales_id',$sales['id'])->get();

            }   
            elseif ($user['userable_type'] == "App\Distributor") {
                $toko = User::find($user['id'])->userable->toko;
            } 

            else{
                $toko = null;
            }


            
        
        
            return $toko;
    }
    public function distributorByToko(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        $toko = User::find($user['id'])->userable;
        $distributor=toko::findOrFail($toko['id'])
        ->distributor()->wherePivot('distributor_id','=',$request['distributor_id'])->get();
       
        if (empty($user[0])) {
            $distributor = Distributor::findOrFail($request['distributor_id']);
        }
        elseif (empty($distributor[0])) {
            # code...
            $distributor = Distributor::findOrFail($request['distributor_id']);

        }
        return $distributor;
    }



    public function updateProfil(Request $request) {
        $user = JWTAuth::parseToken()->authenticate();
        $toko = User::find($user['id'])->userable;
      
        
        // return $request->all();
        
        $toko->update($request->all());
        return response()->json($toko, 200);
    }
    public function update(Request $request, $id){
        $toko = findOrFail($id);
        $toko->update($request->all());
        return response()->json($toko, 200);

    }
    public function getProfil(){
        $user = JWTAuth::parseToken()->authenticate();
        return $user->userable;

    }
    
}
