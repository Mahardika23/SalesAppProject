<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Distributor;
use App\Barang;
use App\Wilayah;

use JWTAuth;
use App\User;
use App\KategoriBarang;
class CatalogController extends Controller
{
    public function showall()
    {
        // $distributor = 
        return $barang = Barang::with('distributor')->paginate(12);
    }
    public function showalltoWeb()
    {
        // $distributor = 
        return $barang = Barang::with(['distributor','wilayah'])->paginate(12);
    }
    public function showCategory(){
        return $kategori=KategoriBarang::all();
    }
    public function showByCategory(Request $request){
        // return $request['id'];
        return $kategori = Barang::with(['distributor','wilayah'])->where('kategori_id',$request['id'])->paginate(12);
        
    }
    public function showByFilter(Request $request)
    {

        // $id = Distributor::find(1)->where('province_id','11')->pluck('id');
        return $barang = Barang::find(1)
            ->join('distributors', 'barangs.distributor_id', '=', 'distributors.id')
            ->select('barangs.*', 'distributors.nama_distributor')->where('distributors.regency_id', $request['regency_id'])
            /*->orWhere('distributors.regency_id',$request['regency_id'])*/->get();
        // return $barang = Barang::all()->where('distributor_id',['11','12']);

        Barang::allowFilter()->get();
    }
    public function showByUser(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $userToko = User::find($user['id'])->userable->regency_id;
        $provinsiuserToko = User::find($user['id'])->userable->province_id;
        
        global $regencyToko;
        global $provinsiToko;

        $regencyToko = Wilayah::find($userToko)->name;

        $provinsiToko = Wilayah::find($provinsiuserToko)->name;
        
        $usernya = User::find($user['id'])->userable;
        // $userToko = intval($userToko);

        // return $barang = Barang::with(['distributor','wilayah'])->where('wilayahs.id',$userToko)->orWhere('global','1')->paginate(12);
        

        // return $barang = Barang::with(['distributor'])->with(['wilayah' => function($q){

        //     global $regencyToko;
        //     $q->where('name','LIKE',$regencyToko);
        // }])->orWhere('global','1')->paginate(12);
        // return ($regencyToko);
        return $barang = Barang::with(['distributor','wilayah'])->whereHas('wilayah',function($q){
           global  $regencyToko;
            global $provinsiToko;
            // $reg =  ;
            return $q->where('name','LIKE',$regencyToko)->orWhere('name','LIKE',$provinsiToko);
        
        })->orWhere('global','1')->paginate(12);
    }

    public function searchBy(Request $request)
    {

        $barang = Barang::with(['distributor','wilayah'])->where('nama_barang', 'LIKE', '%' . $request['search'] . '%')
            ->orWhereHas('distributor', function ($query) {
                global $request;
                $query->where('nama_distributor', 'LIKE', '%' . $request['search'] . '%');
            })->get();
        return $barang;


        /*
        $posts = App\Post::whereHas('comments', function ($query) {
        $query->where('content', 'like', 'foo%');
        })->get();
        */
    }
}
