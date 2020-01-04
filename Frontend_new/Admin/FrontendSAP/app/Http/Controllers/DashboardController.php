<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index(Request $request){

        $request->session()->put('page','dashboard');
        
        // var_dump($form);
        $token = $request->session()->get('token');
        //user
        $user = $request->session()->get('user');
        //nama
        $nama = $request->session()->get('nama');
        //user type
        $user_type = $request->session()->get('user_type');


        $token = $request->session()->get('token');

        $headers = [
            'Authorization' => 'Bearer'.$token,
            'Accept'        => 'application/json'
        ];
        $client =  new Client();
        $promise = $client->requestAsync('GET','http://127.0.0.1:8001/api/admin',['headers' =>
        ['Authorization' => "Bearer {$token}"]])
        ->then(
            function ($response) {
                return $response->getBody();
        }, function ($exception){
            return $exception->getMessage();
        }
        );

        $dashboardData = $promise->wait();
        $dashboardData = json_decode($dashboardData,true);
            $data['dashboardData'] = $dashboardData;
            // dd($data);
    //user type

        if($request->session()->has('password')){
            $isi = $request->session()->get('password');
            if($isi == "berhasil"){
                $request->session()->flash('message','
                Ubah password berhasil.');
            }else{
                $request->session()->flash('message','Ubah password gagal, silahkan coba lagi.');
            }
        }
        // dd($data);
        return view('beranda',['data' => $data]);
    }
}
