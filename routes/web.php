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

Route::get('/', function () {
    return view('welcome');
});
//Rotas de Clientes
Route::get('/clientes/cadastro', 'ClientesController@create')->name('clientes_form');
Route::post('/clientes/cadastro', 'ClientesController@store')->name('registrar_cliente');

//Rotas de Pedidos
Route::get('/pedidos/cadastro', 'PedidosController@create')->name('pedidos_form');
Route::get('/pedidos/index', 'PedidosController@index')->name('pedidos_index');
Route::post('/pedidos/cadastro', 'PedidosController@store')->name('registrar_pedido');