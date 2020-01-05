<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function register3(Request $request)
    {

        $input = $request->all();
        $client =  new Client();
        $promise = $client->requestAsync('POST', 'http://127.0.0.1:9090/api/register', ['form_params' => $input])->then(
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
        } else {
            return redirect()->route('login');
        }
    }

    //validasi form login
    public function login(Request $request)
    {
        $form = $request->all();
        $client =  new Client();
        // var_dump($form);
        $promise = $client->requestAsync('POST', 'http://127.0.0.1:9090/api/login', ['form_params' => $form])->then(
            function ($response) {
                return $response->getBody();
            },
            function ($exception) {
                return $exception->getMessage();
            }
        );
        $data = $promise->wait();
        $data = json_decode($data, true);


        //dd($request);
        if ($data == null) {
            $request->session()->flash('gagal', 'Email atau Password salah');
            return redirect()->route('login');
        } else {
            $request->session()->put('email', $request->get('email'));
            $request->session()->put('login', 'true');
            $request->session()->put('token', $data['token']);

            $token = $request->session()->get('token');
            $promise = $client->getAsync('http://127.0.0.1:9090/api/user', ['headers' => ['Authorization' => "Bearer {$token}"]])->then(
                function ($response) {
                    return $response->getBody();
                },
                function ($exception) {
                    return $exception->getMessage();
                }
            );

            $user = $promise->wait();
            $user = json_decode($user, true);

            $token = $request->session()->get('token');
            $promise = $client->getAsync('http://127.0.0.1:9090/api/profiltoko', ['headers' => ['Authorization' => "Bearer {$token}"]])->then(
                function ($response) {
                    return $response->getBody();
                },
                function ($exception) {
                    return $exception->getMessage();
                }
            );

            $profil = $promise->wait();
            $profil = json_decode($profil, true);
            if(isset($profil['profile_image'])){
                $request->session()->put('profile_image', $profil['profile_image']);
            
            }
            $request->session()->put('id_toko', $profil['id']);
            $request->session()->put('nama_toko', $profil['nama_toko']);
            $request->session()->put('username', $user['user']['name']);
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
        $promise = $client->requestAsync('POST', 'http://127.0.0.1:9090/api/logout', ['headers' => ['Authorization' => "Bearer {$token}"]])->then(
            function ($response) {
                return $response->getBody();
            },
            function ($exception) {
                return $exception->getMessage();
            }
        );
        $data = $promise->wait();
        $data = json_decode($data, true);

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

        //dd($alamat);
        // dd($data);
        return view('profil', compact('data'));
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

    public function updateProfil(Request $request)
    {
        $token = $request->session()->get('token');
        $input = $request->all();
        if ($request->has('profile_image')) {
            $profile_name = 'avatar_' . $request->session()->get('nama_toko') . '.' . request()->profile_image->getClientOriginalExtension();
            $request['profile_image']->storeAs('Avatar', $profile_name);
            $input['profile_image'] = $profile_name;
            $request->session()->put('profile_image', $input['profile_image']);
        }
        // dd($['profile_image']);

        // dd($input);
        $client =  new Client();
        $promise = $client->requestAsync('PUT', 'http://127.0.0.1:9090/api/profiltoko', ['headers' => ['Authorization' => "Bearer {$token}"], 'form_params' => $input])->then(
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
    public function checkEmail(Request $request){
        $client =  new Client();
        // return $request['email'];
        $input['email'] = $request['email'];
        // return $input;
        $promise = $client->getAsync('http://127.0.0.1:9090/api/checkemail',['query' => $input])->then(
            function ($response) {
                return $response->getBody();
            },
            function ($exception) {
                return $exception->getMessage();
            }
        );

        $data = $promise->wait();
        $data = json_decode($data, true);
        // dd($data);
        // if($data[0])
        if($data[0] == true){
            
            $a=array(true);
            return $a;
        }
        elseif($data[0] == false){
            $a=array([]);
            return null;
        }
        
    }
}
