<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //validasi form register 1
    // public function register(Request $request)
    // {
    //     $input = $request->all();
    //     $validatedForm = $this->validate($request, [
    //         'name' => 'bail|required|alpha_num|min:6|max:20',
    //         'email' => 'bail|required|email|max:100', //tambahkan unique:users
    //         'password' => 'bail|required|min:8|confirmed'
    //     ]);

    //     return view('daftar2', $validatedForm, compact('input'));
    // }

    // //validasi form register 2
    // public function register2(Request $request)
    // {
    //     $validatedForm = $this->validate($request, [
    //         'nama_toko' => 'bail|required|alpha_num|max:100',
    //         'nama_pemilik' => 'bail|required|alpha|max:100',
    //         'email_pemilik' => 'bail|required|email|max:100', //tambahkan unique:users
    //         'no_telp' => 'bail|required|numeric|digits_between:11,13'
    //     ]);

    //     $input = $request->all();
    //     $client =  new Client();
    //     $promise = $client->getAsync('http://127.0.0.1:9090/api/province')->then(
    //         function ($response) {
    //             return $response->getBody();
    //         },
    //         function ($exception) {
    //             return $exception->getMessage();
    //         }
    //     );
    //     //dd ($alamat);
    //     $data = $promise->wait();
    //     $data = json_decode($data, true);

    //     //  $data = $data['data'];
    //     // dd($data);

    //     return view('daftar3',compact('data'), compact('input'));
    // }
    
    //validasi form register 3
    public function register3(Request $request)
    {
        // dd($request->all());
        // $validatedForm = $this->validate($request, [
        //     'province_id' => 'required',
        //     'regency_id' => 'required',
        //     'district_id' => 'required',
        //     'village_id' => 'required',
        //     'alamat_toko' => 'bail|required|max:255'
        // ]);

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
        $data = $promise->wait();
        $data = json_decode($data, true);

        //  $data = $data['data'];
        //dd($input);

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

        
        //dd($request);
        if ($data == null) {
            return redirect()->route('login');
        }else{
            $request->session()->put('email', $request->get('email'));
            $request->session()->put('login', 'true');
            $request->session()->put('token', $data['token']);
            
            $token = $request->session()->get('token');
            $promise = $client->getAsync('http://127.0.0.1:9090/api/profiltoko', ['headers' => ['Authorization' => "Bearer {$token}"]])->then(
                function ($response) {
                    return $response->getBody();
                },function ($exception) {
                    return $exception->getMessage();
                }
            );

            $profil = $promise->wait();
            $profil = json_decode($profil, true);

            $promise = $client->getAsync('http://127.0.0.1:9090/api/user', ['headers' => ['Authorization' => "Bearer {$token}"]])->then(
                function ($response) {
                    return $response->getBody();
                },function ($exception) {
                    return $exception->getMessage();
                }
            );

            $user = $promise->wait();
            $user = json_decode($user, true);
            //dd($profil);
            $request->session()->put('nama_toko', $profil['nama_toko']);
            $request->session()->put('username', $user['user']['name']);
            $request->session()->put('id_toko', $profil['id']);

            return redirect()->route('beranda');
        }
        // return view('/',compact('data'));
    }
        // return redirect()->action('WebCustomerController@getBarang');

    public function logout(Request $request)
    {
        $client =  new Client();
        // var_dump($form);
        $token = $request->session()->get('token');
        $promise = $client->requestAsync('POST','http://127.0.0.1:9090/api/logout', ['headers' => ['Authorization' => "Bearer {$token}"]])->then(
            function ($response) {
                return $response->getBody();
        }, function ($exception){
            return $exception->getMessage();
        }
    );
        $data = $promise->wait();
        $data = json_decode($data,true);

        // dd ($data['message']);
        if ($data['message'] == "Successfully logged out") {
            
            $request->session()->flush();
            return redirect()->route('beranda');
        
        }
        return redirect()->route('beranda');

    }

    public function profil(Request $request)
    {
        $token = $request->session()->get('token');
        //dd($token);
        $client =  new Client();
        $promise = $client->getAsync('http://127.0.0.1:9090/api/profiltoko', ['headers' => ['Authorization' => "Bearer {$token}"]])->then(
            function ($response) {
                return $response->getBody();
            },
            function ($exception) {
                return $exception->getMessage();
            }
        );

        $data = $promise->wait();
        $data = json_decode($data, true);
        $promise = $client->getAsync('http://127.0.0.1:9090/api/province')->then(
            function ($response) {
                return $response->getBody();
            },
            function ($exception) {
                return $exception->getMessage();
            }
        );
        $alamat = $promise->wait();
        $alamat = json_decode($alamat, true);
        //dd($alamat);
        //dd($data);
        return view('profil', compact('data','alamat'));
    }
    
    public function editprofil(Request $request)
    {
        $token = $request->session()->get('token');
        //dd($token);
        $client =  new Client();
        $promise = $client->getAsync('http://127.0.0.1:9090/api/profiltoko', ['headers' => ['Authorization' => "Bearer {$token}"]])->then(
            function ($response) {
                return $response->getBody();
            },
            function ($exception) {
                return $exception->getMessage();
            }
        );

        $data = $promise->wait();
        $data = json_decode($data, true);
        //dd($data);
        
        return view('profiledit', compact('data'));
    }

    public function updateProfil(Request $request){
        $token = $request->session()->get('token');
         //dd($request);
        $input = $request->all();
        //dd($input);
        $client =  new Client();
        $promise = $client->requestAsync('PUT','http://127.0.0.1:9090/api/profiltoko', ['headers' => ['Authorization' => "Bearer {$token}"],'form_params' =>$input])->then(
            function ($response) {
                return $response->getBody();
            },
            function ($exception) {
                return $exception->getMessage();
            }
        );

        $data = $promise->wait();
        $data = json_decode($data, true);
        //dd($data);

        return redirect()->route('profil');
    }
}
