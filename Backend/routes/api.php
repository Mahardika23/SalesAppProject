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
    
    // Route::get('closed', 'DataController@closed');
});
// Route::post('/register','UserController@register');
Route::post('/login','UserController@authenticate');
Route::get('/regency','provincesController@regency');
Route::get('/district','provincesController@district');
Route::get('/village','provincesController@village');
Route::post('/registertoko','Api\RegisterTokoController@index');
Route::get('/showallcatalog','Api\CatalogController@showall');
//Route::get('example', array('middleware' => 'cors', 'uses' => 'ExampleController@dummy'));
Route::post('/register','UserController@register');

// Route::group(['middleware' => ['cors']], function() {
//     Route::post('/register','UserController@register');
    
//     // Route::get('closed', 'DataController@closed');
// });