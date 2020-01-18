<?php

namespace App\Entities;

class Cliente {
    function __construct($id,$identificacion_numero, $identificacion_tipo, 
        $nombre, $apellidos, $direccion, $telefonos, $est_borrado){
        $this->id = $id;
        $this->identificacion_numero = $identificacion_numero;
        $this->identificacion_tipo = $identificacion_tipo; 
        $this->nombre = $nombre;
        $this->apellidos = $apellidos; 
        $this->direccion = $direccion; 
        $this->telefonos = $telefonos;
        $this->est_borrado = $est_borrado;
    }
}