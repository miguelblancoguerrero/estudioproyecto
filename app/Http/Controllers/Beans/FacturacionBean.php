<?php

namespace App\Http\Controllers\Beans;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Daos\FacturacionDao;

class FacturacionBean extends Controller
{
    public function index(Request $request){
        
        return view('pages/facturacion');
    }
    //Testeando la generacion de PDFs
    public function pdff(){
        $pdf = \PDF::loadView('PDFs\facturaTemplate');
        return $pdf->download('primerpdf.pdf');
    }

    public function AJAX(Request $r){
        return FacturacionDao::getClienteByNit($r->vaina);
    }

}
