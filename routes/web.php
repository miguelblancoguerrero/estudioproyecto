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

//Enrutado y métodos para el CRUD de los clientes
Route::get('/', function () {return view('welcome');});

Route::get('clientes', 'Beans\ClientesBean@index')->name('cliente.getpage');
Route::get('cliente_eliminar/{id}', 'Beans\ClientesBean@eliminarCliente')->name('cliente.eliminar');
Route::post('clientes', 'Beans\ClientesBean@guardarCliente')->name('cliente.agregar');
Route::post('clientes/editar', 'Beans\ClientesBean@editarCliente')->name('cliente.editar');
//Enrutado y métodos para el CRUD de los productos
Route::get('productos', 'Beans\ProductosBean@index')->name('producto.getpage');

//Enrutado y métodos para el CRUD de los tipos de productos
Route::get('productosTipo', 'Beans\ProductoTiposBean@index')->name('productosTipo.getpage');
Route::get('productosTipo_eliminar/{id}', 'Beans\ProductoTiposBean@eliminarTP')->name('productosTipo.eliminar');
Route::post('productosTipo', 'Beans\ProductoTiposBean@agregarTP')->name('productosTipo.agregar');
Route::post('productosTipo/editar', 'Beans\ProductoTiposBean@editarTP')->name('productosTipo.editar');
