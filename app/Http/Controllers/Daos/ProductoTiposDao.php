<?php

namespace App\Http\Controllers\Daos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoTiposDao extends Controller
{
    public static function getAll(){
        return DB::select("SELECT P.*, (SELECT NOMBRE FROM PRODUCTO_TIPOS WHERE ID = P.PADRE) AS PADRE_PRODUCTO FROM PRODUCTO_TIPOS P WHERE EST_BORRADO = ?", [0]);
    }
    public static function getById($id){
        if($id != null){
            return DB::select("SELECT P.*, (SELECT NOMBRE FROM PRODUCTO_TIPOS WHERE ID = P.PADRE) AS PADRE_PRODUCTO FROM PRODUCTO_TIPOS P WHERE ID = ?" , [$id])[0];
        }
    }
    public static function destruir($id){
        if($id != null){
            DB::delete("DELETE FROM PRODUCTO_TIPOS WHERE ID = ?", [$id]);
        }
    }
    public static function guardar($prod_tipo){
        DB::insert("INSERT INTO PRODUCTO_TIPOS(DESCRIPCION, EST_BORRADO, NOMBRE, PADRE)" 
        ." VALUES (?, ?, ?, ?)", [$prod_tipo->descripcion, 0, $prod_tipo->nombre, $prod_tipo->padre]);
    }
    public static function editar($prod_tipo){
        $SQL = NULL;
        if($prod_tipo->padre != 'NINGUNO' || $prod_tipo->padre != null){
            $SQL = "UPDATE PRODUCTO_TIPOS SET " 
            ."NOMBRE = '$prod_tipo->nombre', "
            ."DESCRIPCION = '$prod_tipo->descripcion', "
            ."PADRE = '$prod_tipo->padre', "
            ."EST_BORRADO = '$prod_tipo->est_borrado', "
            ."FEC_MOD = CURRENT_TIMESTAMP "
            ."WHERE ID = '$prod_tipo->id'";
        }else{
            $SQL = "UPDATE PRODUCTO_TIPOS SET " 
            ."NOMBRE = '.$prod_tipo->nombre.', "
            ."DESCRIPCION = '.$prod_tipo->descripcion.', "
            ."PADRE = NULL, "
            ."EST_BORRADO = '.$prod_tipo->est_borrado.', "
            ."FEC_MOD = CURRENT_TIMESTAMP "
            ."WHERE ID = '.$prod_tipo->id.'";
        }
        DB::update($SQL);
    }
}
