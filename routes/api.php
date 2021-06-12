<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//     return $request->user();
// });
Route::post('register', 'Auth\RegisterController@registerapi');


Route::post('login', 'Auth\LoginController@loginapi');
Route::post('logout', 'Auth\LoginController@logoutapi');

Route::group(['middleware' => 'auth:api'], function() {
    Route::post('productos', 'ProductoController@indexapi');
    Route::post('productos/{categoria}', 'ProductoController@indexapiXcategoria');


    Route::post('categorias', 'CategoriaController@indexapi');
    
});
