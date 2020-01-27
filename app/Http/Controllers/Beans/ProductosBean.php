<?php

namespace App\Http\Controllers\Beans;

use App\Http\Controllers\Daos\ProductosDao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductosBean extends Controller
{
    public function getView(){
        $productos = ProductosDao::getAll();
        return view('pages/productos', compact('productos'));
    }
    public function index(Request $request){
        $productoEditable = null;
        if(isset($request->id)){
            $productoEditable = ProductosDao::getById($request->id);
        }
        return $this->getView()->with(compact('productoEditable'));
    }
    public function guardarProducto(Request $request){
        //$request->validate([]);
        
    }
}
