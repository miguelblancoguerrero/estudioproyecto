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

Route::get('/', function () {return view('welcome');});
Route::get('clientes', 'Beans\ClientesBean@index')->name('cliente.getpage');
Route::post('clientes', 'Beans\ClientesBean@guardarCliente')->name('cliente.agregar');

Route::get('cliente_eliminar/{id}', 'Beans\ClientesBean@eliminarCliente')->name('cliente.eliminar');
Route::get('clientes/{id}', 'Beans\ClientesBean@editarCliente')->name('cliente.editar');
