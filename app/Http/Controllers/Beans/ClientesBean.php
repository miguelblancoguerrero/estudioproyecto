<?php

namespace App\Http\Controllers\Beans;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Daos\ClientesDao;


class ClientesBean extends Controller
{
    public function index() {
        $clientes = ClientesDao::getAll();
        return view('pages/clientes',compact('clientes'));
    }

    public function guardarCliente(Request $request) {
        $request->validate([
            'identificacion_tipo' => 'required',
            'identificacion_numero' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'telefonos' => 'required',
        ]);
        ClientesDao::insert($request);
        return $this->index();
    }

    public function eliminarCliente($id){
        ClientesDao::destruir($id);
        return $this->index();
    }

}
