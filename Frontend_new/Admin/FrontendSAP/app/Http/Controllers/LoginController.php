<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index(Request $request){
        $request->session()->get('login');
        if ($request->session()->has('login')) {
            return Redirect::route('dashboard');
        }else{
            return view('login');
        }
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
        
        // dd($data);
        $token = $data['token'];
        $promise2 = $client->requestAsync('GET','http://127.0.0.1:8001/api/user', ['headers' =>
        ['Authorization' => "Bearer {$token}"]])->then(
            function ($response) {
                return $response->getBody();
        }, function ($exception){
            return $exception->getMessage();
        }
        );
        $userData = $promise2->wait();
        $userData = json_decode($userData,true);
        $data['user_type'] = $userData['user']['userable_type'];
        // dd($data);
        $data['nama'] = $userData['user']['name'];
        // dd($userData);
        // dd($userData);
        // if ($userData['user']['userable_type'] == 'App\Distributor') {
        //    # code...
        //    return halaman(aaaaa)
        // }
        // $data['userable_type'] = $userData['user']['userable_type'];
        // dd($data);

        if ($data == null) {
            return redirect()->route('login');
        }else{
            $request->session()->put('email','true');
            $request->session()->put('login','true');
            $request->session()->put('token',$token);
            $request->session()->put('nama',$data['nama']);
            return Redirect::route('dashboard')->with(['data' => $data] );
            // echo $request->session()->get('email');
        }


        // dd($userData);
        // return view('/',compact('data','userData'));
    }

}
