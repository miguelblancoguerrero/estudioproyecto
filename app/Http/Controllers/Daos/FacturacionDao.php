<?php

namespace App\Http\Controllers\Daos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class FacturacionDao extends Controller
{
    public static function getClienteByNit($nit){
        $statement = null;
        $statement = DB::table('clientes')->where('identificacion_numero', $nit)->first();
        if(empty($statement->identificacion_numero)){
            $statement = 0;
        }
        return json_encode($statement);
    }
}
