<?php

namespace App\Http\Controllers\Beans;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacturacionBean extends Controller
{
    public function index(Request $request){
        
        return view('pages/facturacion');
    }
}