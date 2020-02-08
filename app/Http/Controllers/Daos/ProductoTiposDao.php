<?php

namespace App\Http\Controllers\Daos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoTiposDao extends Controller
{
    public static function getAll(){
        return DB::select("SELECT P.*, (SELECT nombre FROM producto_tipos WHERE id = P.padre) AS PADRE_PRODUCTO FROM producto_tipos P WHERE est_borrado = ?", [0]);
    }
    public static function getById($id){
        if($id != null){
            return DB::select("SELECT P.*, (SELECT nombre FROM producto_tipos WHERE id = P.padre) AS PADRE_PRODUCTO FROM producto_tipos P WHERE ID = ?" , [$id])[0];
        }
    }
    public static function destruir($id){
        if($id != null){
            DB::delete("DELETE FROM producto_tipos WHERE id = ?", [$id]);
        }
    }
    public static function guardar($prod_tipo){
        DB::insert("INSERT INTO producto_tipos(descripcion, est_borrado, nombre, padre)" 
        ." VALUES (?, ?, ?, ?)", [$prod_tipo->descripcion, 0, $prod_tipo->nombre, $prod_tipo->padre]);
    }
    public static function editar($prod_tipo){
        $SQL = NULL;
        if($prod_tipo->padre != 'NINGUNO' || $prod_tipo->padre != null){
            $SQL = "UPDATE producto_tipos SET " 
            ."nombre = '$prod_tipo->nombre', "
            ."descripcion = '$prod_tipo->descripcion', "
            ."padre = '$prod_tipo->padre', "
            ."est_borrado = '$prod_tipo->est_borrado', "
            ."fec_mod = CURRENT_TIMESTAMP "
            ."WHERE id = '$prod_tipo->id'";
        }else{
            $SQL = "UPDATE producto_tipos SET " 
            ."nombre = '.$prod_tipo->nombre.', "
            ."descripcion = '.$prod_tipo->descripcion.', "
            ."padre = NULL, "
            ."est_borrado = '.$prod_tipo->est_borrado.', "
            ."fec_mod = CURRENT_TIMESTAMP "
            ."WHERE id = '.$prod_tipo->id.'";
        }
        DB::update($SQL);
    }
}
