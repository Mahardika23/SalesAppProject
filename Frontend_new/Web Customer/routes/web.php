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

Route::get('test', function(){
    Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
});
// Route::get('cart', function(){
//     return Cart::content();
// });
Route::get('total', function(){
    return Cart::total();
});

Route::group(['middleware' => ['logincheck']], function() {
    Route::get('/aktivitas', 'WebCustomerController@aktivitas');
    Route::get('/pesan', 'CartController@cart');
});

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
Route::any('/daftar/toko', 'UserController@register');
Route::any('/daftar/alamat', 'UserController@register2');
Route::any('/daftarakun', 'UserController@register3');
Route::post('get_province', [
    'uses' => 'WebCustomerController@getProvince'
]);
// Route::get('/searchApi','WebCustomerController@getBarangSearch')
Route::post('get_barang', [
    'uses' => 'WebCustomerController@getBarang'
]);
Route::get('/logout', 'UserController@logout');
Route::any('/navbar', ['as' => 'navbar', 'uses' => 'UserController@cobaSession']);

