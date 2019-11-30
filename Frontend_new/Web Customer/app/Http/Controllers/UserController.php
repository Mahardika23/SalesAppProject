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
            'username' => 'bail|required|alpha_num|min:6|max:20',
            'email' => 'bail|required|email|max:100', //tambahkan unique:users
            'password' => 'bail|required|min:8|confirmed'
        ]);

        return view('daftar2', $validatedForm, compact('input'));
    }

    //validasi form register 2
    public function register2(Request $request)
    {
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

        $validatedForm = $this->validate($request, [
            'nama_toko' => 'bail|required|alpha_num|max:100',
            'nama_pemilik' => 'bail|required|alpha|max:100',
            'email_pemilik' => 'bail|required|email|max:100', //tambahkan unique:users
            'no_telp' => 'bail|required|numeric|digits_between:11,13'
        ]);

        return view('daftar3', compact('data'), compact('input'));
    }

    //validasi form register 3
    public function register3(Request $request)
    {
        $validatedForm = $this->validate($request, [
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'alamat_toko' => 'bail|required|max:255'
        ]);

        return view('login', $validatedForm);
    }

    //validasi form login
    public function login(Request $request)
    {
        $validatedForm = $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        return redirect()->action('WebCustomerController@getBarang');
    }
}
