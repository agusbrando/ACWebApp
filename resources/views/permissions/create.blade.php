@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<form method="POST" action="{{route('permissions.store')}}">
@csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationTooltip01">ID Permiso</label>
      <input type="text" class="form-control" id="validationTooltip01" name="id" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltip02">Nombre permiso</label>
      <input type="text" class="form-control" id="validationTooltip02" name="name"required>
    </div>
  <button class="btn btn-primary" type="submit">Añadir</button>
</form>
</main>
@endsection