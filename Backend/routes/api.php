<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     // return $request->user();  
//     return auth('api')->user();

// });
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'UserController@getAuthenticatedUser');
    // Route::get('/test','TestController@index');
    Route::post('refresh','UserController@refresh');
    Route::get('/showcatalogbyuser','Api\CatalogController@showByUser');
    Route::post('logout','UserController@logout');  
});
Route::post('/login','UserController@authenticate');
Route::post('/register','UserController@register');

//Showing Catalog Before login
Route::get('/showcatalogbyfilter','Api\CatalogController@showByFilter');
Route::get('/showallcatalog','Api\CatalogController@showall');
Route::get('/showallcatalogweb','Api\CatalogController@showalltoWeb');

//Get Data Wilayah
Route::get('/province','Api\WilayahController@province');
Route::get('/regency','Api\WilayahController@regency');
Route::get('/district','Api\WilayahController@district');
Route::get('/village','Api\WilayahController@village');


