<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;

class TokoController extends Controller
{
    public function index(Request $request)
    {

        $request->session()->get('login');
        if ($request->session()->has('login')) {
            //nama
            $nama=$request->session()->get('nama');
            //user type
            $user_type = $request->session()->get('user_type');
            //isi tokennya
            $token = $request->session()->get('token');

            $headers = [
                'Authorization' => 'Bearer'.$token,
                'Accept'        => 'application/json'
            ];
            $client =  new Client();
            $promise = $client->requestAsync('GET','http://127.0.0.1:8001/api/admin/toko',['headers' =>
            ['Authorization' => "Bearer {$token}"]])
            ->then(
                function ($response) {
                    return $response->getBody();
            }, function ($exception){
                return $exception->getMessage();
            }
            );
    
            $itemData = $promise->wait();
            $itemData = json_decode($itemData,true);
            
                $data = $itemData;
            
            dd($data);
            return view('toko',['data'=> $data,'user_type' => $user_type, 'nama' => $nama]);
            // return view('barang',['nama' => $nama]);

        }else{
            return Redirect::route('login');
        }

    } 
}
