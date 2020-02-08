<?php

namespace App\Http\Controllers\Daos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class ProductosDao extends Controller
{
    public static function getAll(){
        return DB::select("SELECT P.*, PT.nombre as nombre_tipo_producto FROM productos P LEFT JOIN producto_tipos PT on p.producto_tipo_id = PT.id WHERE P.est_borrado = 0");
    }
    public static function getById($id){
        return DB::select("SELECT P.*, PT.nombre as nombre_tipo_producto FROM productos P LEFT JOIN producto_tipos PT on p.producto_tipo_id = PT.id WHERE P.est_borrado = ? AND P.id = ?",[0, $id])[0];
    }
    public static function store($productoObj){
        $SQL = "INSERT INTO productos( codigo, referencia, nombre, valor_unitario, iva, descripcion, producto_tipo_id, est_borrado) " 
        ."VALUES ('$productoObj->codigo', '$productoObj->referencia', '$productoObj->nombre', $productoObj->valor_unitario, $productoObj->iva, '$productoObj->descripcion', $productoObj->producto_tipo_id, 0)";
        DB::insert($SQL);
    }
    public static function edit($producto){
        DB::update("UPDATE "
        ."productos SET "
        ."codigo = ?, "
        ."referencia = ?, "
        ."nombre = ?, "
        ."valor_unitario = ?, "
        ."iva = ?, "
        ."descripcion = ?, "
        ."producto_tipo_id = ?, "
        ."fec_mod = CURRENT_TIMESTAMP "
        ."WHERE id = ?", 
        [$producto->codigo, 
        $producto->referencia, 
        $producto->nombre, 
        $producto->valor_unitario, 
        $producto->iva, 
        $producto->descripcion, 
        $producto->producto_tipo_id, 
        $producto->id]);
    }
    public static function destroy($id){
        DB::delete("DELETE FROM productos WHERE id = ?", [$id]);
    }
}
