@extends('templates/template')
@section('principal_section')

    <div>
        <br>
            <h4>Generación y previsualización de facturas</h4>
        <br>
    </div>
<form data-route="{{ route('facturacionAJAX') }}" id="formConAJAX">
@csrf
  <div class="form-row form-group" id="formDePrueba">

    <div class="col">
      <input type="text" class="form-control" placeholder="" id="nit_cliente">
    </div>

    <div class="col">
      
    </div>


  </div>
<fieldset disabled>

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
        <input type="text" placeholder="" class="form-control" id="">
    </div>
  </div>

  </fieldset>
</form>

<script src="{{asset('js/funciones.js')}}"></script>
@endsection