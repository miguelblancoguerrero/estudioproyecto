@extends('templates/template')
@section('principal_section')

    <br>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="lista-clientes-tab" data-toggle="tab" href="#lista-clientes" role="tab" aria-controls="lista-clientes" aria-selected="true">Listado de Clientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="cliente-tab" data-toggle="tab" href="#cliente" role="tab" aria-controls="cliente" aria-selected="false">Registrar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Editar</a>
        </li>
        
    </ul>
@endsection