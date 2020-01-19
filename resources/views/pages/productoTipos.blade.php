@extends('templates/template')
@section('principal_section')
    <br>
    <br>
    <h4>Información sobre los tipos de productos</h4>
    <br>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="lista-tipos" data-toggle="tab" href="#listado-tab" role="tab" aria-controls="lista-tipos" aria-selected="true">Listado de tipos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="crear-tipos" data-toggle="tab" href="#crear-tab" role="tab" aria-controls="editar-tipos" aria-selected="false">Crear</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="editar-tipos" data-toggle="tab" href="#editar-tab" role="tab" aria-controls="editar-tipos" aria-selected="false">Editar</a>
        </li>
    </ul>
    <!--Listado de tipos de producto-->
    <div class="tab-content">
        <div class="tab-pane fade show active" id="listado-tab" role="tabpanel" aria-labelledby="listado-tab">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="row">Nombre</th>
                        <th scope="row">Descripcion</th>
                        <th scope="row">Tipo de producto</th>
                        <th scope="row">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productoTipos as $tipo)
                        <tr style="border-color: black; border-radius: 1px;">
                            <td>{{ $tipo->nombre }}</td>
                            <td>{{ $tipo->descripcion }}</td>
                            @if($tipo->padre != null)
                                <td>{{ $tipo->PADRE_PRODUCTO }}</td>
                            @else
                                <td>NINGUNO</td>
                            @endif
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="#" class="btn btn-warning">Editar</a>
                                    <a href="{{route('productosTipo.eliminar', $tipo->id)}}" class="btn btn-danger">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--Formulario de creacion de tipos de producto-->
        <div class="tab-pane fade" id="crear-tab" role="tabpanel" aria-labelledby="crear-tab">
            <form action="{{ route('productosTipo.agregar') }}" method="POST">
            <br>
            <h6>Datos del tipo de producto</h6>
            <br>
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Nombre" aria-label="" aria-describedby="basic-addon1" name="nombre" value="">
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Descripcion" aria-label="" aria-describedby="basic-addon1" name="descripcion" value="">
            </div>

            <div class="input-group mb-3">
                <select class="custom-select" name="padre" id="padre_select">
                    <option selected>--- SELECCIONE UNA OPCION ---</option>
                    @foreach($productoTipos as $tipo)
                        <option value="{{ $tipo->id }}">{{$tipo->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        </div>
        <!--Formulario de edición de tipos de producto-->
        <div class="tab-pane fade" id="editar-tab" role="tabpanel" aria-labelledby="editar-tab">
            Area de edición
        </div>
    </div>
@endsection