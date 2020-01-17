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

    public static function getById(){

    }
    public static function insert($r) {
        DB::insert('INSERT INTO clientes (identificacion_numero, identificacion_tipo, nombre,' 
            .'apellidos, direccion, telefonos) VALUES (?,?,?,?,?,?)',
            [$r->identificacion_numero, $r->identificacion_tipo, $r->nombre, $r->apellidos,
            $r->direccion, $r->telefonos]
        );
    }
    public static function destruir($id){
        DB::statement("DELETE FROM CLIENTES WHERE ID=".$id);
        DB::statement("COMMIT");
    } 
}
