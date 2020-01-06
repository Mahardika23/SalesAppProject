<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index(Request $request){
        
            if($request->session()->has('daftar')){
                $daftar = $request->session()->get('daftar');
                if($daftar == "berhasil"){
                    $request->session()->flash('message','
                    Pendaftaran berhasil, silahkan menunggu untuk diverifikasi oleh admin.');
                }else{
                    $request->session()->flash('message','Pendaftaran gagal, silahkan coba lagi.');
                }
            }
            if($request->session()->has('token_distrib')){
                return redirect('/');
            }
            return redirect('/loginpage');
        
    }
    public function show(Request $request){
        
        if($request->session()->has('token_distrib')){
            return redirect('/');
        }
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
        // dd($data);
        
        if ($data == null) {
            $request->session()->flash('message','Login gagal! Username atau Password salah');
            return redirect()->back();
        }elseif(isset($data['message'])){
        
            $request->session()->flash('message','Login gagal! akun belum diaktifkan');
            return redirect()->back();

        }
        else{
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
        $data['user_type'] = $userData['user']['userable_type'];
        $user_type = $data['user_type'];
        // dd($data);
        $data['nama'] = $userData['user']['name'];
        $nama = $data['nama'];
        // dd($userData);
        $user = $userData['user'];
        $userable_id = $userData['user']['userable_id'];

            $request->session()->put('email','true');
            $request->session()->put('login_distrib',true);
            $request->session()->put('token_distrib',$token);
            $request->session()->put('user',$user);
            $request->session()->put('nama',$nama);
            $request->session()->put('user_type',$user_type);
            $request->session()->put('userable_id',$userable_id);
            return Redirect::route('dashboard')->with(['data' => $data, 'user' => $user] );
        }


    }

    public function logout(Request $request){
        if(!$request->session()->has('token_distrib')){
          return redirect('/login');  
        }
            $client =  new Client();
        // var_dump($form);
        $token = $request->session()->get('token_distrib');
        $promise = $client->requestAsync('POST','http://127.0.0.1:9090/api/logout', ['headers' => ['Authorization' => "Bearer {$token}"]])->then(
            function ($response) {
                return $response->getBody();
        }, function ($exception){
            return $exception->getMessage();
        }
    );
        $data = $promise->wait();
        $data = json_decode($data,true);
        // dd($data);
        // dd ($data['message']);
        $request->session()->flush();

        if ($data['message'] == "Successfully logged out") {
            
            $request->session()->flush();
            return redirect()->route('login');

        }
        return redirect('/');
    }

    public function register(Request $request){

        $input = $request->all();
        $input['email'] = $input['email_distributor'];
        // dd($input);
        $client =  new Client();
        $token = $request->session()->get('token_distrib');

        $promise = $client->requestAsync('POST','http://127.0.0.1:9090/api/register',['headers' =>
            ['Authorization' => "Bearer {$token}",'Accept' => 'application/json'],'form_params' =>$input])
            ->then(
                function ($response) {
                    return $response->getBody();
            }, function ($exception){
                return $exception->getMessage();
            }
        );

        $distributorData = $promise->wait();
        $distributorData = json_decode($distributorData,true);
            $data['distributor'] = $distributorData;
        // dd($data);

        if(isset($data['distributor']['user'])){
            $request->session()->flash('daftar','berhasil');
        }else{
            $request->session()->flash('daftar','gagal');
        }
        return redirect()->route('login');
            // dd($data);
    //user type
}

}
