<?php

namespace App\Http\Controllers\Daos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class FacturacionDao extends Controller
{
    public static function getClienteByNit($nit){
        $statement = DB::select("SELECT * FROM CLIENTES WHERE IDENTIFICACION_NUMERO = ? AND EST_BORRADO = ?",[$nit, 0])[0];
        echo $statement->nombre;
    }
}
