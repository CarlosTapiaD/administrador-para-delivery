<?php

use Illuminate\Support\Facades\Route;

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

//importante
// Route::get('storage-link',function(){
//     Artisan::call('storage:link');
// });

Auth::routes(['verify'=>true]);
Route::get('profiles', 'ProfileController@edit')->name('profile.edit');
Route::put('profiles', 'ProfileController@update')->name('profile.update');



Route::resource('productos.carrito', 'ProductoCarritoController')->only(['store','destroy']);
Route::resource('carritos', 'CarritoController')->only(['index'])->middleware(['verified']);
Route::resource('pedidos','PedidoController')->only(['create','store','index']);;
Route::resource('pedidos.pagos','PedidoPagoController')->only(['create','store']);;
Route::resource('direccions', 'DireccionController');
Route::get('/','MainController@index')->name('main.index');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
