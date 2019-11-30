<?php

namespace App\Http\Controllers;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WebCustomerController extends Controller
{
    //
    public function beranda(){
        return view('beranda');
    }

    public function aktivitas(){
        return view('aktivitas');
    }

    public function distributor(){
        return view('distributor');
    }

    public function getBarangPesan(){
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
        return view('pesan',compact('data'));
    }

    public function getProvince(){
        $client =  new Client();
        $promise = $client->getAsync('http://127.0.0.1:9090/api/province')->then(
            function ($response) {
                return $response->getBody();
        }, function ($exception){
            return $exception->getMessage();
        }
    );

        $data = $promise->wait();
        $data = json_decode($data,true);
        
            // $data = $data['data'];
        
        
        return view('daftar3',compact('data'));
    }

    public function getBarangSearch(){
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
        return view('search',compact('data'));
    }

    public function login(){
        return view('login');
    }

    public function daftar(){
        return view('daftar');
    }

    public function daftar2(){
        return view('daftar2');
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