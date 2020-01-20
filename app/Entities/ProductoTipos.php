<?php

namespace App\Entities;

class ProductoTipos {
    function __construct($id, $nombre, $descripcion, $padre = null, $est_borrado){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->padre = $padre;
        $this->est_borrado = $est_borrado;
    }
}