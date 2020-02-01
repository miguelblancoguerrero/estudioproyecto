@extends('templates/template')
@section('principal_section')

    <div>
        <br>
            <h4>Generación y previsualización de facturas</h4>
        <br>
    </div>
<form>
  <div class="form-row form-group">

    <div class="col">
      <input type="text" class="form-control" placeholder="">
    </div>

    <div class="col">
      <a href="" class = "btn btn-success">Buscar</a>
    </div>
  </div>
<fieldset disabled>

  <div class="form-row form-group">
    <div class="col">
        <input type="text" placeholder="Nombre" class="form-control">
    </div>
    <div class="col">
        <input type="text" placeholder="Apellidos" class="form-control">
    </div>
  </div>

  <div class="form-row form-group">
    <div class="col">
        <input type="text" placeholder="" class="form-control">
    </div>
    <div>
        <input type="text" placeholder="" class="form-control">
    </div>
  </div>

  </fieldset>
</form>

@endsection