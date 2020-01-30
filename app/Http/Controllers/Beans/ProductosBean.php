<?php

namespace App\Http\Controllers\Beans;

use App\Http\Controllers\Daos\ProductosDao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Daos\ProductoTiposDao;
use App\Entities\Producto;

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
        $request->validate([
            'codigo' => 'required',
            'valor_unitario' => 'required',
            'nombre' => 'required',
            'iva' => 'required',
            'producto_tipo_id' => 'required'
        ]);
        ProductosDao::store($request);
        return $this->getView();
    }
    public function editarProducto(Request $request){
        $producto = new Producto($request->id, 
        $request->codigo, 
        $request->referencia, 
        $request->nombre, 
        $request->valor_unitario, 
        $request->iva, 
        $request->descripcion, 
        $request->producto_tipo_id, 
        0);
        ProductosDao::edit($producto);
        return redirect()->route('producto.getpage');
    }
    public function eliminarProducto($id){
        ProductosDao::destroy($id);
        return redirect()->route('producto.getpage');
    }
}
