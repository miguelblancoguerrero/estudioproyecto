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
                        <th scope="row">Descripcion</th>
                        <th scope="row">Tipo de producto</th>
                        <th scope="row">Valor unitario</th>
                        <th scope="row">Iva</th>
                        
                        
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                           <th>{{ $producto->codigo }}</th>
                           <th>{{ $producto->referencia }}</th>
                           <th>{{ $producto->nombre }}</th>
                           <th>{{ $producto->descripcion }}</th>
                           <th>{{ $producto->nombre_tipo_producto }}</th>
                           <th>{{ $producto->valor_unitario }}</th>
                           <th>{{ $producto->iva }}</th>
                           
                           <th>
                            <a href="#" class="btn btn-warning">Editar</a>
                            <a href="#" class="btn btn-danger">Eliminar</a>
                           </th> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
<!--Creacion de productos-->
    
        <div class="tab-pane fade" id="creacionProductos" role="tabpanel" aria-labelledby="creacionProductos">
            <br>
            <br>
                <form action="{{ route('producto.agregar') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <div class="form-group">
                            <input type="text" placeholder="Codigo" class="form-control" name="codigo">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Referencia(Opcional)" class="form-control" name="referencia">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Nombre" class="form-control" name="nombre">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Descripcion(Opcional)" class="form-control" name="descripcion">
                        </div>
                        
                        <div class="form-group">
                            <select name="producto_tipo_id" id="" class="custom-select">
                                <option selected value="">-- SELECCIONE UN TIPO DE PRODUCTO --</option>
                                    @foreach($productosTipos as $PT)
                                        <option value="{{$PT->id}}">{{$PT->nombre}}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" placeholder="Valor unitario" class="form-control" name="valor_unitario">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Iva (1 - 99 sólo números enteros)" class="form-control" name="iva">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
        </div>
<!--Edición de productos-->
        <div class="tab-pane fade" id="edicionProductos" role="tabpanel" aria-labelledby="edicionProductos">
            <br>
            <br>
                @isset($productoEditable)
                <form action="{{ route('producto.editar') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <div class="form-group">
                        <Label>Código</Label>
                            <input type="text" placeholder="Codigo" class="form-control" name="codigo" value="{{$productoEditable->codigo}}">
                        </div>
                        <div class="form-group">
                        <Label>Referencia</Label>
                            <input type="text" placeholder="Referencia(Opcional)" class="form-control" name="referencia" value="{{$productoEditable->referencia}}">
                        </div>
                        <div class="form-group">
                        <Label>Nombre</Label>
                            <input type="text" placeholder="Nombre" class="form-control" name="nombre" value="{{$productoEditable->nombre}}">
                        </div>
                        <div class="form-group">
                        <Label>Descripcion</Label>
                            <input type="text" placeholder="Descripcion(Opcional)" class="form-control" name="descripcion" value="{{$productoEditable->descripcion}}">
                        </div>
                        
                        <div class="form-group">
                        <Label></Label>
                            <select name="producto_tipo_id" id="" class="custom-select">
                                <option selected value="{{$productoEditable->producto_tipo_id}}">{{$productoEditable->nombre_tipo_producto}}</option>
                                    @foreach($productosTipos as $PT)
                                        <option value="{{$PT->id}}">{{$PT->nombre}}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" placeholder="Valor unitario" class="form-control" name="valor_unitario" value="{{$productoEditable->valor_unitario}}">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Iva (1 - 99 sólo números enteros)" class="form-control" name="iva" value="{{$productoEditable->iva}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning">Editar</button>
                </form>
                @else
                    jajxd
                @endisset
        </div>
    </div>


@endsection