<?php

namespace App\Http\Controllers\Beans;

use App\Http\Controllers\Daos\ProductosDao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Daos\ProductoTiposDao;

class ProductosBean extends Controller
{
    public function getView(){
        $productos = ProductosDao::getAll();
        $productosTipos = ProductoTiposDao::getAll();
        return view('pages/productos', compact('productos'))->with(compact('productosTipos'));
    }
    public function index(Request $request){
        $productoEditable = null;
        if(isset($request->id)){
            $productoEditable = ProductosDao::getById($request->id);
        }
        return $this->getView()->with(compact('productoEditable'));
    }
    public function agregarProducto(Request $request){
        /*$request->validate([
            'codigo' => 'required',
            'valor_unitario' => 'required',
            'nombre' => 'required',
            'iva' => 'required',
            'producto_tipo_id' => 'required'
        ]);*/
        ProductosDao::store($request);
        return $this->getView();
    }
}
