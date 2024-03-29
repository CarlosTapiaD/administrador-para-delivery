<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web panelRoutes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','PanelController@index')->name('panel');

 Route::resource('usuarios', 'UsuarioController');
// Route::resource('categorias', 'CategoriaController');
Route::resource('productos', 'ProductoController');
Route::resource('categorias', 'CategoriaController');

// Route::resource('productos.carrito', 'ProductoCarritoController')->only(['store','destroy']);
// Route::resource('carritos', 'CarritoController')->only(['index']);
// Route::resource('pedidos','PedidoController')->only(['create','store','index']);;
// Route::resource('pedidos.pagos','PedidoPagoController')->only(['create','store']);;
// Route::get('/','MainController@index')->name('main.index');

