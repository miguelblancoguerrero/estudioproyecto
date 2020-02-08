<?php

namespace App\Http\Controllers\Daos;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ClientesDao extends Controller
{
    public static function getAll() {
        return DB::select('SELECT * FROM clientes WHERE est_borrado = ?',[0]);
    }

    public static function getById($id){
        if($id != null){
            return DB::select("SELECT * FROM clientes WHERE id = ?" , [$id])[0];
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
        DB::delete("DELETE FROM clientes WHERE id =".$id);
    }

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
