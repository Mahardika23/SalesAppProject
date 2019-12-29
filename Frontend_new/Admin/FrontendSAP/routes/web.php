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

Route::get('/', [ 'as' => 'dashboard', 'uses' => 'DashboardController@index']);

Route::get('/dashboard', [ 'as' => 'dashboard', 'uses' => 'DashboardController@index']);


    //lama
    // Route::get('/Manajemen-Data-Toko', function () {
    //     return view('toko');
    // });

    //test
    Route::get('/Manajemen-Data-Sales', [ 'as' => 'Manajemen-Data-Sales', 'uses' => 'SalesController@index']);
    Route::post('/Manajemen-Data-Sales', [ 'uses' => 'SalesController@store']);
    Route::post('/Manajemen-Data-Sales/delete', [ 'uses' => 'SalesController@destroy']);
    Route::post('/Manajemen-Data-Sales/update', [ 'uses' => 'SalesController@update']);

Route::get('/sidebar', function () {
    return view('sidebar');
});

//test
Route::get('/Manajemen-Data-Barang', [ 'as' => 'Manajemen-Data-Barang', 'uses' => 'BarangController@index']);

// lama
// Route::get('/Manajemen-Data-Barang','BarangController@index');

//test
Route::get('/Manajemen-Data-Toko', [ 'as' => 'Manajemen-Data-Toko', 'uses' => 'TokoController@index']);

//lama
// Route::get('/Manajemen-Data-Toko', function () {
//     return view('toko');
// });

//test
Route::get('/Manajemen-Data-Sales', [ 'as' => 'Manajemen-Data-Sales', 'uses' => 'SalesController@index']);

// lama 
// Route::get('/Manajemen-Data-Sales', function () {
//     return view('sales');
// });

Route::post('/logincheck','LoginController@login');

//test
Route::get('/Manajemen-Data-Pemesanan', [ 'as' => 'Manajemen-Data-Pemesanan', 'uses' => 'PemesananController@index']);

//lama
// Route::get('/Manajemen-Data-Pemesanan','PemesananController@index');

Route::get('/guzzle', 'TestController@getProvince');

// Route::get('/login', 'jalanController@login');
