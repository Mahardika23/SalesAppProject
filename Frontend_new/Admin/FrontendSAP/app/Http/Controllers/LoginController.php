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
        $promise = $client->requestAsync('POST','http://127.0.0.1:8001/api/login', ['form_params' =>$form])->then(
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
        if ($data == null) {
            return redirect()->route('login');
        }else{
            return redirect()->route('dashboard');
        }
        // return view('/',compact('data'));
    }
 
}
