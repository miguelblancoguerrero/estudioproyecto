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
Route::get('facturacionxd', 'Beans\FacturacionBean@pdff')->name('generar.factura');

//Enrutado y métodos para el CRUD de los clientes
Route::get('clientes', 'Beans\ClientesBean@index')->name('cliente.getpage');
Route::get('cliente_eliminar/{id}', 'Beans\ClientesBean@eliminarCliente')->name('cliente.eliminar');
Route::post('clientes', 'Beans\ClientesBean@guardarCliente')->name('cliente.agregar');
Route::post('clientes/editar', 'Beans\ClientesBean@editarCliente')->name('cliente.editar');
//Enrutado y métodos para el CRUD de los productos
Route::get('productos', 'Beans\ProductosBean@index')->name('producto.getpage');
Route::get('productos_eliminar/{id}', 'Beans\ProductosBean@eliminarProducto')->name('producto.eliminar');
Route::post('productos', 'Beans\ProductosBean@agregarProducto')->name('producto.agregar');
Route::post('productos/editar', 'Beans\ProductosBean@editarProducto')->name('producto.editar');
//Enrutado y métodos para el CRUD de los tipos de productos
Route::get('productosTipo', 'Beans\ProductoTiposBean@index')->name('productosTipo.getpage');
Route::get('productosTipo_eliminar/{id}', 'Beans\ProductoTiposBean@eliminarTP')->name('productosTipo.eliminar');
Route::post('productosTipo', 'Beans\ProductoTiposBean@agregarTP')->name('productosTipo.agregar');
Route::post('productosTipo/editar', 'Beans\ProductoTiposBean@editarTP')->name('productosTipo.editar');

//Enrutado y métodos para la seccion de facturación
Route::get('facturacion', 'Beans\FacturacionBean@index')->name('facturacion.getpage');
Route::post('facturacionAS', 'Beans\FacturacionBean@AJAX')->name('facturacionAJAX');