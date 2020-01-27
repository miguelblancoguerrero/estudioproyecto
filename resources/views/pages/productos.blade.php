@extends('templates/template')
@section('principal_section')

    <br>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="lista-productos-tab" data-toggle="tab" href="#lista-productos" role="tab" aria-controls="lista-productos" aria-selected="true">Listado de productos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="producto-tab" data-toggle="tab" href="#creacionProductos" role="tab" aria-controls="cliente" aria-selected="false">Registrar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="prod-tab" data-toggle="tab" href="#edicionProductos" role="tab" aria-controls="contact" aria-selected="false">Editar</a>
        </li>
    </ul>
<!-- Listado de productos-->
    <div class="tab-content">
        <div class="tab-pane fade show active" id="lista-productos" role="tabpanel" aria-labelledby="listado-productos">
        <br>
        <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="row">Codigo</th>
                        <th scope="row">Referencia</th>
                        <th scope="row">Nombre</th>
                        <th scope="row">Valor unitario</th>
                        <th scope="row">Iva</th>
                        <th scope="row">Descripcion</th>
                        <th scope="row">Tipo de producto</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
<!--Creacion de productos-->
    
        <div class="tab-pane fade" id="creacionProductos" role="tabpanel" aria-labelledby="creacionProductos">
            <br>
            <br>
                Area de creacion de productos
        </div>
<!--Edición de productos-->
        <div class="tab-pane fade" id="edicionProductos" role="tabpanel" aria-labelledby="edicionProductos">
            <br>
            <br>
                Area de edicion de productos
        </div>
    </div>


@endsection