<?php

namespace App\Http\Controllers\Beans;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Daos\ClientesDao;


class ClientesBean extends Controller
{
    public function getView(){
        $clientes = ClientesDao::getAll();
        return view('pages/clientes',compact('clientes'));
    }
    public function index(Request $request) {
        $cliente_edit = null;
        if(isset($request->id)){
            $cliente_edit = ClientesDao::getById($request->id);
        }
        return $this->getView()->with(compact('cliente_edit'));
    }

    public function guardarCliente(Request $request) {
        $request->validate([
            'identificacion_tipo' => 'required',
            'identificacion_numero' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'telefonos' => 'required'
        ]);
        ClientesDao::insert($request);
        return $this->index();
    }

    public function eliminarCliente($id){
        ClientesDao::destruir($id);
        return $this->index();
    }
    public function editarCliente(Request $request, $id){
        
        $request->validate([
            'identificacion_tipo' => 'required',
            'identificacion_numero' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'telefonos' => 'required'
        ]);
        ClientesDao::editar($request, $id);
        header("Refresh:0");
    }

}
