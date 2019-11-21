<?php

namespace App\Http\Controllers;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class jalanController extends Controller
{
    //
    public function beranda(){
        return view('beranda');
    }

    public function aktivitas(){
        return view('aktivitas');
    }

    public function pesan(){
        return view('pesan');
    }

    public function login(){
        return view('login');
    }

    public function getBarang(){
        $client =  new Client();
        $promise = $client->getAsync('http://127.0.0.1:9090/api/showallcatalogweb')->then(
            function ($response) {
                return $response->getBody();
        }, function ($exception){
            return $exception->getMessage();
        }
    );

        $data = $promise->wait();
        $data = json_decode($data,true);
        
            // $data = $data['data'];
        
        // dd($data);
        return view('beranda',compact('data'));
    }
}
