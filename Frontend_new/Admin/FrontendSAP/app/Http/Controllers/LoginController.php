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
        $promise = $client->requestAsync('POST','http://127.0.0.1:8001/api/login', ['form_params' =>$form])->then(
            function ($response) {
                return $response->getBody();
        }, function ($exception){
            return $exception->getMessage();
        }
    );

        $data = $promise->wait();
        $data = json_decode($data,true);
        // dd($data);
        
        if ($data == null) {
            return redirect()->route('login');
        }else{
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
        // dd($userData);
        $data['user_type'] = $userData['user']['userable_type'];
        $user_type = $data['user_type'];
        // dd($data);
        $data['nama'] = $userData['user']['name'];
        $nama = $data['nama'];
        // dd($userData);
        $user = $userData['user'];
        $userable_id = $userData['user']['userable_id'];
        // dd($userData);
        // if ($userData['user']['userable_type'] == 'App\Distributor') {
        //    # code...
        //    return halaman(aaaaa)
        // }
        // $data['userable_type'] = $userData['user']['userable_type'];
        dd($userData);

            $request->session()->put('email','true');
            $request->session()->put('login','true');
            $request->session()->put('token',$token);
            $request->session()->put('user',$user);
            $request->session()->put('nama',$nama);
            $request->session()->put('user_type',$user_type);
            $request->session()->put('userable_id',$userable_id);
            return Redirect::route('dashboard')->with(['data' => $data, 'user' => $user] );
            // echo $request->session()->get('email');
        }


        // dd($userData);
        // return view('/',compact('data','userData'));
    }

}
