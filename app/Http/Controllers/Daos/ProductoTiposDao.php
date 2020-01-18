<?php

namespace App\Http\Controllers\Daos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoTiposDao extends Controller
{
    public static function getAll(){
        return DB::select("SELECT * FROM PRODUCTO_TIPOS WHERE EST_BORRADO = ?", [0]);
    }
    public static function getById($id){
        if($id != null){
            return DB::select("SELECT * FROM PRODUCTO_TIPOS WHERE ID = ?" , [$id])[0];
        }
    }
}
