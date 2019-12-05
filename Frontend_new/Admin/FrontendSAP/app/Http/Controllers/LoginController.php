<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
   
    public function login(Request $request){
        $form=$request->all();
        $client =  new Client();
        // var_dump($form);
        $promise = $client->requestAsync('POST','http://127.0.0.1:9090/api/login', ['form_params' =>$form])->then(
            function ($response) {
                return $response->getBody();
        }, function ($exception){
            return $exception->getMessage();
        }
    );

        $data = $promise->wait();
        $data = json_decode($data,true);
        
        if ($data == null) {
            return redirect()->route('login');
        }else{
            return redirect()->route('dashboard');
        }

        $token = $data['token'];
        $promise2 = $client->requestAsync('GET','http://127.0.0.1:9090/api/user', ['headers' =>
        ['Authorization' => "Bearer {$token}"]])->then(
            function ($response) {
                return $response->getBody();
        }, function ($exception){
            return $exception->getMessage();
        }
        );
        $userData = $promise2->wait();
        $userData = json_decode($userData,true);
        // dd($userData);
        // if ($userData['user']['userable_type'] == 'App\Distributor') {
        //    # code...
        //    return halaman(aaaaa)
        // }

        return view('/',compact('data'));
    }
 
}
