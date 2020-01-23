@extends('templates/template')
@section('principal_section')

    <br>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="lista-productos-tab" data-toggle="tab" href="#lista-productos" role="tab" aria-controls="lista-clientes" aria-selected="true">Listado de Clientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="producto-tab" data-toggle="tab" href="#creacionProductos" role="tab" aria-controls="cliente" aria-selected="false">Registrar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="prod-tab" data-toggle="tab" href="#edicionProductos" role="tab" aria-controls="contact" aria-selected="false">Editar</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="lista-productos" role="tabpanel" aria-labelledby="listado-tab">
            
        </div>
    </div>

@endsection