<?php

namespace App\Http\Controllers\Beans;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Daos\ClientesDao;
use App\Entities\Cliente;

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
        return $this->getView();
    }

    public function eliminarCliente($id){
        ClientesDao::destruir($id);
        return $this->getView();
    }

    public function editarCliente(Request $request){
        $request->validate([
            'id' => 'required',
            'identificacion_numero_edit' => 'required',
            'identificacion_tipo_edit' => 'required',
            'nombre_edit' => 'required',
            'direccion_edit' => 'required',
            'telefonos_edit' => 'required'
        ]);
        $cliente = new Cliente($request->id, $request->identificacion_numero_edit
        ,$request->identificacion_tipo_edit,$request->nombre_edit,$request->apellidos_edit
        ,$request->direccion_edit,$request->telefonos_edit,0);
        ClientesDao::editar($cliente);
         
        return $this->getView();
    }

}
