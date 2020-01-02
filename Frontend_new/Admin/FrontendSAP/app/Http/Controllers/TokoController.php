<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;

class TokoController extends Controller
{
    public function index(Request $request)
    {

        $request->session()->put('page','toko');
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

            $promise = $client->requestAsync('GET','http://127.0.0.1:8001/api/admin/sales',['headers' =>
            ['Authorization' => "Bearer {$token}"]])
            ->then(
                function ($response) {
                    return $response->getBody();
            }, function ($exception){
                return $exception->getMessage();
            }
            );
    
            $salesData = $promise->wait();
            $salesData = json_decode($salesData,true);
            
                $sales = $salesData;
            
            dd($data);
            return view('toko',['data'=> $data,'sales' => $sales]);
            // return view('barang',['nama' => $nama]);

        }else{
            return Redirect::route('login');
        }

    } 

    public function accept(Request $request)
    {

        //
        $input = $request->all();
        $id = $request->input('id');
        // dd($id);
        $client =  new Client();
        $token = $request->session()->get('token');

        $promise = $client->requestAsync('PUT','http://127.0.0.1:8001/api/admin/toko/'.$id,['headers' =>
            ['Authorization' => "Bearer {$token}"],'form_params' =>$input])
            ->then(
                function ($response) {
                    return $response->getBody();
            }, function ($exception){
                return $exception->getMessage();
            }
        );
        $success=$promise->wait();
        $success = json_decode($success,true);
        // dd($success);
        return redirect()->route('Manajemen-Data-Toko');
    }
}
