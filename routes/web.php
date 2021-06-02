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

Route::get('/','MainController@index')->name('main.index');
//usuarios
Route::get('usuario','UsuarioController@index')->name('usuario.index');

Route::get('usuario/create','UsuarioController@create')->name('usuario.create');

Route::post('usuario','UsuarioController@store')->name('usuario.store');

Route::get('usuario/{usuario}','UsuarioController@show')->name('usuario.show');

Route::get('usuario/{usuario}/edit','UsuarioController@edit')->name('usuario.edit');

Route::match(['put','patch'],'usuario/{usuario}','UsuarioController@update')->name('usuario.update');

Route::delete('usuario/{usuario}','UsuarioController@destroy')->name('usuario.destroy');

//categorias
Route::get('categoria','CategoriaController@index')->name('categoria.index');

Route::get('categoria/create','CategoriaController@create')->name('categoria.create');

Route::post('categoria','CategoriaController@store')->name('categoria.store');

Route::get('categoria/{categoria}','CategoriaController@show')->name('categoria.show');

Route::get('categoria/{categoria}/edit','CategoriaController@edit')->name('categoria.edit');

Route::match(['put','patch'],'categoria/{categoria}','CategoriaController@update')->name('categoria.update');

Route::delete('categoria/{categoria}','CategoriaController@destroy')->name('categoria.destroy');

//productos
Route::get('productos','ProductoController@index')->name('productos.index');

Route::get('productos/create','ProductoController@create')->name('productos.create');

Route::post('productos','ProductoController@store')->name('productos.store');

Route::get('productos/{producto}','ProductoController@show')->name('productos.show');

Route::get('productos/{producto}/edit','ProductoController@edit')->name('productos.edit');

Route::match(['put','patch'],'productos/{producto}','ProductoController@update')->name('productos.update');

Route::delete('productos/{producto}','ProductoController@destroy')->name('productos.destroy');


//Pedidos
Route::get('pedidos','PedidoController@index')->name('pedidos.index');

Route::get('pedidos/create','PedidoController@indexcreate')->name('pedidos.create');

Route::post('pedidos','PedidoController@store')->name('pedidos.store');

Route::get('pedidos/{pedido}','PedidoController@show')->name('pedidos.show');

Route::get('pedidos/{pedido}/edit','PedidoController@edit')->name('pedidos.edit');

Route::match(['put','patch'],'pedidos/{pedido}','PedidoController@update')->name('pedidos.update');

Route::delete('pedidos/{pedido}','PedidoController@destroy')->name('pedidos.destroy');


