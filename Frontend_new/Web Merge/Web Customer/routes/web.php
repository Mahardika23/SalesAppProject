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

// Route::get('/', function () {
//     return view('');
// });

Route::group(['middleware' => ['logincheck']], function() {
    Route::get('/aktivitas', 'WebCustomerController@aktivitas');
    Route::get('/pesan', 'CartController@cart');
});
Route::get('/checkemailvalidity','UserController@checkEmail');
Route::any('/lupapas', 'WebCustomerController@checkout');
Route::any('/checkout', 'WebCustomerController@checkout');
Route::any('/cek', 'CartController@cart');
Route::get('/', [ 'as' => 'beranda', 'uses' => 'WebCustomerController@getBarang']);
Route::get('/distributor/{id}', [ 'as' => 'distributor', 'uses' => 'WebCustomerController@getDistributor']);
Route::any('/login', [ 'as' => 'login', 'uses' => 'WebCustomerController@login']);
Route::post('/loginUser', 'UserController@login');
Route::get('/search/{id}', 'WebCustomerController@getKategoriSearch');
Route::get('/search', 'WebCustomerController@getBarangSearch');
Route::get('/profil', [ 'as' => 'profil', 'uses' => 'UserController@profil']);
Route::get('/profil/edit', 'UserController@editprofil');
Route::any('/updateprofil', 'UserController@updateProfil');
Route::any('/daftar', [ 'as' => 'daftar', 'uses' =>'WebCustomerController@daftar']);
Route::any('/cart', 'CartController@add');
Route::any('/cart-delete', 'CartController@remove');
Route::any('/requestmitra', 'WebCustomerController@getMitra');
Route::any('/daftarakun', 'UserController@register3');
// Route::get('/searchApi','WebCustomerController@getBarangSearch')
Route::post('get_barang', [
    'uses' => 'WebCustomerController@getBarang'
]);
Route::get('/logout', 'UserController@logout');
Route::any('/navbar', ['as' => 'navbar', 'uses' => 'UserController@cobaSession']);



// Distrib
Route::group(['middleware' => ['logincheck']], function() {
    Route::get('/', [ 'as' => 'dashboard', 'uses' => 'adminDashboardController@index']);
    Route::get('/sidebar', function () {
        return view('adminsidebar');
    });
    Route::get('/checkemailvalidity','adminSalesController@checkEmail');
    Route::get('/Manajemen-Data-Barang', [ 'as' => 'Manajemen-Data-Barang', 'uses' => 'adminBarangController@index']);
    Route::post('/Manajemen-Data-Barang', [ 'uses' => 'adminBarangController@store']);
    Route::post('/Manajemen-Data-Barang/delete', [ 'uses' => 'adminBarangController@destroy']);
    Route::post('/Manajemen-Data-Barang/update', [ 'uses' => 'adminBarangController@update']);
    Route::get('/Manajemen-Data-Toko', [ 'as' => 'Manajemen-Data-Toko', 'uses' => 'adminTokoController@index']);
    Route::post('/Manajemen-Data-Toko/accept', [ 'uses' => 'adminTokoController@accept']);
    Route::get('/Manajemen-Data-Sales', [ 'as' => 'Manajemen-Data-Sales', 'uses' => 'adminSalesController@index']);
    Route::post('/Manajemen-Data-Sales', [ 'uses' => 'adminSalesController@store']);
    Route::post('/Manajemen-Data-Sales/delete', [ 'uses' => 'adminSalesController@destroy']);
    Route::post('/Manajemen-Data-Sales/update', [ 'uses' => 'adminSalesController@update']);
    Route::get('/Manajemen-Data-Sales', [ 'as' => 'Manajemen-Data-Sales', 'uses' => 'adminSalesController@index']);
    Route::get('/Manajemen-Data-Pemesanan', [ 'as' => 'Manajemen-Data-Pemesanan', 'uses' => 'adminPemesananController@index']);
    Route::post('/Manajemen-Data-Pemesanan/update', [ 'uses' => 'adminPemesananController@update']);

    Route::get('/Profile', [ 'as' => 'Profile', 'uses' => 'adminProfileController@index']);
    Route::get('/guzzle', 'adminTestController@getProvince');

    });

    Route::post('/logincheck-distributor','adminLoginController@login');
    Route::post('/register', [ 'uses' => 'adminLoginController@register']);

    Route::post('/Ubah-Password', [ 'uses' => 'adminProfileController@ubahpassword']);

    Route::get('/distributor', [ 'as' => 'distributor', 'uses' => 'adminDistributorController@index']);
    Route::post('/distributor/update', [ 'uses' => 'adminDistributorController@update']);

    Route::get('/login-distributor', [ 'as' => 'login', 'uses' => 'adminLoginController@index']);
    Route::get('/loginpage', [ 'as' => 'login', 'uses' => 'adminLoginController@show']);
    Route::get('/logout', [ 'as' => 'logout', 'uses' => 'adminLoginController@logout']);
