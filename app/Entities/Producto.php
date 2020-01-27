<?php

namespace App\Entities;

class Producto {
    function __construct($id, $codigo, $referencia = null, $nombre, $valor_unitario, $iva, $descripcion = null, $producto_tipo_id, $est_borrado){
        $this->id = $id;
        $this->codigo = $codigo;
        $this->referencia = $referencia;
        $this->nombre = $nombre;
        $this->valor_unitario = $valor_unitario;
        $this->iva = $iva;
        $this->descripcion = $descripcion;
        $this->producto_tipo_id = $producto_tipo_id;
        $this->est_borrado = $est_borrado;
    }
}