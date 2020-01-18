<?php

namespace App\Http\Controllers\Daos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClientesDao extends Controller
{
    public static function getAll() {
        return DB::select('SELECT * FROM clientes WHERE est_borrado = ?',[0]);
    }

    public static function getById($id){
        if($id != null){
            return DB::select("SELECT * FROM CLIENTES WHERE ID = ?" , [$id])[0];
        }
    }
    public static function insert($r) {
        DB::insert('INSERT INTO clientes (identificacion_numero, identificacion_tipo, nombre,' 
            .'apellidos, direccion, telefonos) VALUES (?,?,?,?,?,?)',
            [ $r->identificacion_numero, $r->identificacion_tipo, $r->nombre, $r->apellidos,
            $r->direccion, $r->telefonos]
        );
    }
    public static function destruir($id){
        DB::delete("DELETE FROM CLIENTES WHERE ID=".$id);
    }

    /*
    public static function editar($request, $id){
        $SQL = "UPDATE CLIENTES SET identificacion_numero = '?', identificacion_tipo = '?', "
        ."nombre = '?', apellidos = '?', direccion = '?', telefonos = '?', fec_mod = CURRENT_TIMESTAMP "
        ."WHERE id = ".$id;
        DB::update($SQL,
        [$request->identificacion_numero_edit, $request->identificacion_tipo_edit 
        ,$request->nombre_edit , $request->apellidos_edit, $request->direccion_edit
        , $request->telefonos_edit]);
    }
    */
    public static function editar($cliente){
        $SQL = "UPDATE clientes "
        ."SET identificacion_numero = '$cliente->identificacion_numero', "
        ."identificacion_tipo = '$cliente->identificacion_tipo', "
        ."nombre = '$cliente->nombre', "
        ."apellidos = '$cliente->apellidos', "
        ."direccion = '$cliente->direccion', "
        ."telefonos = '$cliente->telefonos', "
        ."fec_mod = CURRENT_TIMESTAMP "
        ."WHERE id = ".$cliente->id;
        DB::update($SQL);
    }
}
