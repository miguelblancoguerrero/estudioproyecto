<?php

namespace App\Http\Controllers\Beans;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Daos\ProductoTiposDao;
use App\Entities\ProductoTipos;

class ProductoTiposBean extends Controller
{
    public function getView(){
        $productosTipos = ProductoTiposDao::getAll();
        return view('pages/productoTipos', compact('productosTipos'));
    }
    public function index(Request $request){
        $productosTipoEdit = null;
        if(isset($request->id)){
            $productosTipoEdit = ProductoTiposDao::getById($request->id);
        }
        return $this->getView()->with(compact('productosTipoEdit'));
    }
    public function eliminarTP($id){
        ProductoTiposDao::destruir($id);
        return $this->getView();
    }
    public function agregarTP(Request $request){
        ProductoTiposDao::guardar($request);
        return back();
    }
    public function editarTP(Request $request){
        $request->validate([
            'id_edit' => 'required',
            'nombre_edit' => 'required',
            'descripcion_edit' => 'required',
            'padre_edit' => 'required'
        ]);
        if($request->id_edit == $request->pare_edit){
            return $this->getView();
        }
        $tipoObj = new ProductoTipos($request->id_edit, $request->nombre_edit, $request->descripcion_edit, $request->padre_edit, 0);
        ProductoTiposDao::editar($tipoObj);
        return redirect()->route('productosTipo.getpage');
    }
}
