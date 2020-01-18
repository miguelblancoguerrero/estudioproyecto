<?php

namespace App\Http\Controllers\Beans;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Daos\ProductoTiposDao;

class ProductoTiposBean extends Controller
{
    public function getView(){
        $productoTipos = ProductoTiposDao::getAll();
        return view('pages/productoTipos', compact('productoTipos'));
    }
    public function index(Request $request){
        $productosTipoEdit = null;
        if(isset($request->id)){
            $productosTipoEdit = ObjetoDao::getById($request->id);
        }
        return $this->getView()->with(compact('productosTipoEdit'));
    }

    public function eliminarTP($id){
        ProductoTiposDao::destruir($id);
        return $this->getView();
    }
}
