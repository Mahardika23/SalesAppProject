<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\TestController;

// Route::get('/', function () {
//     return view('beranda');
// });

Route::group(['middleware' => ['logincheck']], function() {
    Route::get('/', [ 'as' => 'dashboard', 'uses' => 'DashboardController@index']);
    Route::get('/sidebar', function () {
        return view('sidebar');
    });
  //test
    Route::get('/Manajemen-Data-Barang', [ 'as' => 'Manajemen-Data-Barang', 'uses' => 'BarangController@index']);
    Route::post('/Manajemen-Data-Barang', [ 'uses' => 'BarangController@store']);
    Route::post('/Manajemen-Data-Barang/delete', [ 'uses' => 'BarangController@destroy']);
    Route::post('/Manajemen-Data-Barang/update', [ 'uses' => 'BarangController@update']);

    // lama
    // Route::get('/Manajemen-Data-Barang','BarangController@index');

    //test
    Route::get('/Manajemen-Data-Toko', [ 'as' => 'Manajemen-Data-Toko', 'uses' => 'TokoController@index']);
    Route::post('/Manajemen-Data-Toko/accept', [ 'uses' => 'TokoController@accept']);


    //lama
    // Route::get('/Manajemen-Data-Toko', function () {
    //     return view('toko');
    // });

    //test
    Route::get('/Manajemen-Data-Sales', [ 'as' => 'Manajemen-Data-Sales', 'uses' => 'SalesController@index']);
    Route::post('/Manajemen-Data-Sales', [ 'uses' => 'SalesController@store']);
    Route::post('/Manajemen-Data-Sales/delete', [ 'uses' => 'SalesController@destroy']);
    Route::post('/Manajemen-Data-Sales/update', [ 'uses' => 'SalesController@update']);

    //test
    Route::get('/Manajemen-Data-Sales', [ 'as' => 'Manajemen-Data-Sales', 'uses' => 'SalesController@index']);

    // lama 
    // Route::get('/Manajemen-Data-Sales', function () {
    //     return view('sales');
    // });


    //test
    Route::get('/Manajemen-Data-Pemesanan', [ 'as' => 'Manajemen-Data-Pemesanan', 'uses' => 'PemesananController@index']);
    Route::post('/Manajemen-Data-Pemesanan/update', [ 'uses' => 'PemesananController@update']);

    // profile

    Route::get('/Profile', [ 'as' => 'Profile', 'uses' => 'ProfileController@index']);

    //lama
    // Route::get('/Manajemen-Data-Pemesanan','PemesananController@index');

    Route::get('/guzzle', 'TestController@getProvince');

    });
        // Route::get('/', [ 'as' => 'dashboard', 'uses' => 'DashboardController@index']);

    // Route::get('/dashboard', [ 'as' => 'dashboard', 'uses' => 'DashboardController@index']);


    Route::post('/logincheck','LoginController@login');
    Route::post('/register', [ 'uses' => 'LoginController@register']);

    Route::post('/Ubah-Password', [ 'uses' => 'ProfileController@ubahpassword']);

    Route::get('/distributor', [ 'as' => 'distributor', 'uses' => 'DistributorController@index']);
    Route::post('/distributor/update', [ 'uses' => 'DistributorController@update']);

    Route::get('/login', [ 'as' => 'login', 'uses' => 'LoginController@index']);
    Route::get('/loginpage', [ 'as' => 'login', 'uses' => 'LoginController@show']);
    Route::get('/logout', [ 'as' => 'logout', 'uses' => 'LoginController@logout']);

// Route::get('/sidebar', function () {
//     return view('sidebar');
// });


// Route::get('/login', 'jalanController@login');
