<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //validasi form register 1
    public function register(Request $request)
    {
        $input = $request->all();
        $validatedForm = $this->validate($request, [
            'name' => 'bail|required|alpha_num|min:6|max:20',
            'email' => 'bail|required|email|max:100', //tambahkan unique:users
            'password' => 'bail|required|min:8|confirmed'
        ]);

        return view('daftar2', $validatedForm, compact('input'));
    }

    //validasi form register 2
    public function register2(Request $request)
    {
        $validatedForm = $this->validate($request, [
            'nama_toko' => 'bail|required|alpha_num|max:100',
            'nama_pemilik' => 'bail|required|alpha|max:100',
            'email_pemilik' => 'bail|required|email|max:100', //tambahkan unique:users
            'no_telp' => 'bail|required|numeric|digits_between:11,13'
        ]);

        $input = $request->all();
        $client =  new Client();
        $promise = $client->getAsync('http://127.0.0.1:9090/api/province')->then(
            function ($response) {
                return $response->getBody();
            },
            function ($exception) {
                return $exception->getMessage();
            }
        );
        //dd ($alamat);
        $data = $promise->wait();
        $data = json_decode($data, true);

        //  $data = $data['data'];
        // dd($data);

        return view('daftar3',compact('data'), compact('input'));
    }
    
    //validasi form register 3
    public function register3(Request $request)
    {
        $validatedForm = $this->validate($request, [
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
            'alamat_toko' => 'bail|required|max:255'
        ]);

        $input=$request->all();
        $client =  new Client();
        $promise = $client->requestAsync('POST','http://127.0.0.1:9090/api/register', ['form_params' =>$input])->then(
            function ($response) {
                return $response->getBody();
            },
            function ($exception) {
                return $exception->getMessage();
            }
        );
        //dd ($alamat);
        $data = $promise->wait();
        $data = json_decode($data, true);

        //  $data = $data['data'];
        // dd($data);

              //dd($data);
        if ($data == null) {
            return redirect()->route('daftar');
        }else{
            return redirect()->route('login');
        }   
    }

    //validasi form login
    public function login(Request $request)
    {
        $form=$request->all();
        $validatedForm = $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
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
            return redirect()->route('beranda');
        }
        // return view('/',compact('data'));
    }
        // return redirect()->action('WebCustomerController@getBarang');
    
}
