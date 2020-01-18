@extends('templates/template')
@section('principal_section')
    <br>
    <br>
    <h4>Informacion de Clientes</h4>
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
    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="lista-clientes" role="tabpanel" aria-labelledby="lista-clientes-tab">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Tipo Doc</th>
                    <th scope="col">Numero Doc</th>
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Telefonos</th>
                    <th scope = "col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr style="border-color: black; border-radius: 1px;">
                            <td>{{ $cliente->identificacion_tipo }}</th>
                            <td>{{ $cliente->identificacion_numero }}</td>
                            <td>{{ $cliente->nombre.' '.$cliente->apellidos }}</td>
                            <td>{{ $cliente->direccion }}</td>
                            <td>{{ $cliente->telefonos }}</td>
                            <td>
                            <div class="btn-group" role="group">
                                <!--
                                <button type="button" class="btn btn-success">Ver</button>
                                -->
                                <a href="{{ route('cliente.getpage', 'id='.$cliente->id) }}" class="btn btn-warning">Editar</a>
                                <a href="{{ route('cliente.eliminar', $cliente->id) }}" class="btn btn-danger">Eliminar</a>
                            </div>
                                
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="tab-pane fade" id="cliente" role="tabpanel" aria-labelledby="cliente-tab">
            <br>
            <h6> Datos de Cliente </h6>
            <br>
            <form method="POST" action="{{ route('cliente.agregar') }}">
                @csrf
                @error('identificacion_tipo')
                    <div class="alert alert-danger">Se requiere un tipo de identificacion</div>
                @enderror
                <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect01" name="identificacion_tipo" value="{{ old('identificacion_tipo') }}">
                        <option selected>Tipo de Identificacion</option>
                        <option value="CC">Cedula de ciudadanía</option>
                        <option value="NIT">Nit</option>
                        <option value="TE">Tarjeta de Extranjería</option>
                    </select>
                </div>
                @error('identificacion_numero')
                    <div class="alert alert-danger">Se requiere un numero de identificacion</div>
                @enderror
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Numero de Identificacion" aria-label="nroident" aria-describedby="basic-addon1" name="identificacion_numero" value="{{old('identificacion_numero')}}">
                </div>
                @error('nombre')
                    <div class="alert alert-danger">Se requiere un nombre o razón social</div>
                @enderror
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nombre o razón social" aria-label="nombre" aria-describedby="basic-addon1" name="nombre" value="{{old('nombre')}}">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Apellidos" aria-label="apellidos" aria-describedby="basic-addon1" name="apellidos" value="{{old('apellido')}}">
                </div>
                @error('direccion')
                    <div class="alert alert-danger">Se requiere direccion de residencia</div>
                @enderror
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Dirección" aria-label="direccion" aria-describedby="basic-addon1" name="direccion" value="{{old('direccion')}}">
                </div>
                @error('telefonos')
                    <div class="alert alert-danger">Se requiere al menos un telefono</div>
                @enderror
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Telefonos" aria-label="telefonos" aria-describedby="basic-addon1" name="telefonos" value="{{old('telefonos')}}">
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <br>
        <br>
            @isset($cliente_edit)
            <form action="{{route('cliente.editar', $cliente_edit->id)}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$cliente_edit->id}}">
                <div class="mb-3">
                    <select class="custom-select"  name="identificacion_tipo_edit" value="{{$cliente_edit->identificacion_tipo}}">
                        <option selected>Tipo de Identificacion</option>
                        <option value="CC">Cedula de ciudadanía</option>
                        <option value="NIT">Nit</option>
                        <option value="TE">Tarjeta de Extranjería</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="identificacion_numero_edit">Numero de identificacion:</label>
                    <input name="identificacion_numero_edit"type="text" class="form-control" placeholder="Numero de identificacion" value="{{ $cliente_edit->identificacion_numero }}"></input>
                </div>
                <div class="mb-3">
                    <label for="nombre_edit">Nombre o razón social:</label>
                    <input name="nombre_edit" type="text" class="form-control" placeholder="Nombre o razón social" value="{{ $cliente_edit->nombre }}"></input>
                </div>
                <div class="mb-3">
                    <label for="apellidos_edit">Apellidos:</label>
                    <input name="apellidos_edit" type="text" class="form-control" placeholder="Numero de identificacion" value="{{ $cliente_edit->apellidos }}"></input>
                </div>
                <div class="mb-3">
                    <label for="direccion_edit">Dirección:</label>
                    <input name="direccion_edit" type="text" class="form-control" placeholder="Numero de identificacion" value="{{ $cliente_edit->direccion }}"></input>
                </div>
                <div class="mb-3">
                    <label for="telefonos_edit">Telefonos:</label>
                    <input name="telefonos_edit" type="text" class="form-control" placeholder="Numero de identificacion" value="{{ $cliente_edit->telefonos }}"></input>
                </div>
                <button class="btn btn-warning" type="submit">Editar</button>
            </form>
            @else
                <h4>No ha seleccionado ningún cliente...</h4>
            @endisset
        </div>

    </div>
@endsection