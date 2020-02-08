@extends('templates/template')
@section('principal_section')

    <div>
        <br>
            <h4>Generación y previsualización de facturas</h4>
        <br>
    </div>
<form id="formConAJAX" data-route="{{ route('facturacionAJAX') }}">
  @csrf
  <div class="form-row form-group" id="formDePrueba">

    <div class="col">
      <input type="text" class="form-control" placeholder="Numero de identificacion" id="nit_cliente">
    </div>

    <div class="col">

    </div>
  </div>
  <div class="form-row form-group">
    <div class="col">
        <input type="text" placeholder="Nombre" class="form-control" id="nombreCliente">
    </div>
    <div class="col">
        <input type="text" placeholder="Apellidos" class="form-control" id="apellidoCliente">
    </div>
  </div>

  <div class="form-row form-group">
    <div class="col">
        <input type="text" placeholder="" class="form-control" id="direccionCliente">
    </div>
    <div>
        <input type="text" placeholder="" class="form-control" id="telefonosCliente">
    </div>
  </div>

</form>
<!--Aquí acaba el form-->

<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#agregarProductosCollapse" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Agregar productos</a>
  <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#vistaPreviaFacturaCollapse" aria-expanded="false" aria-controls="multiCollapseExample2">Vista previa de factura</button>
</p>

<div class="row">
  <div class="col">
    <div class="collapse" id="agregarProductosCollapse">
      <div class="card card-body">

        <table class="table">
          <tr>
            <th scope="row" class="text-center">Codigo</th>
            <th scope="row" class="text-center">Nombre</th>
            <th scope="row" class="text-center">Cantidad</th>
            <th scope="row" class="text-center">Valor Unitario</th>
            <th scope="row" class="text-center">Precio total</th>
            <th scope="row">
              Acción
            </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row">
                <input type="text" placeholder="Buscar...">
              </td>
              <td scope="row">
                <input type="text" placeholder="Buscar...">
              </td>
              <td scope="row">
                <input type="text">
              </td>
              <td scope="row">
                <label for=""></label>
              </td>
              <td scope="row">
                <label for=""></label>
              </td>
              <td scope="row">
                <a href="#" class="btn btn-success">+</a>
              </td>
            </tr>
          </tbody>
        </table>
        
      </div>
    </div>
  </div>
  <div class="col">
    <div class="collapse" id="vistaPreviaFacturaCollapse">
      <div class="card card-body">
        Factura
      </div>
    </div>
  </div>
</div>

<script src="{{asset('js/funciones.js')}}"></script>
@endsection