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

    public function aktivitas(Request $request){
        echo $request->session()->get('token');
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

    public function login(Request $req){
        return view('login');
    }

    public function daftar(){
        return view('daftar');
    }   
    
    public function daftar2(Request $request){
        $input = $request->all();
        //  dd($input);
        return view('daftar2',compact('input'));
    }

    public function getProvince(Request $request){
        $input = $request->all();
        $client =  new Client();
        $promise = $client->getAsync('http://127.0.0.1:9090/api/province')->then(
            function ($response) {
                return $response->getBody();
        }, function ($exception){
            return $exception->getMessage();
        }
    );
        $alamat = $request->all();
        //dd ($alamat);
        $data = $promise->wait();
        $data = json_decode($data,true);
        
            //  $data = $data['data'];
        // dd($data);
        return view('daftar3',compact('data'),compact('input'));
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