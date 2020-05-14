@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="card shadow">
    <div class="card-header row m-0 justify-content-between">
      <h3>Nuevo Permiso</h3>
      <form action="{{ route('permissions.store')}}" method="POST">
        @method('POST')
        <div class="col-12">
          <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
          @csrf
          <a class="btn btn-outline-warning float-right" href="{{ route('permissions.index')}}" tabindex="-1" aria-disabled="true">Cancelar</a>
        </div>
    </div>
    <div class="card-body row no-gutters table-responsive">
      <fieldset>
        <div class="form-group">
          <label for="name">Nombre permiso</label>
          <input value="" name="name" id="name" type="text" class="@error('name') is-invalid @enderror form-control">
        </div>
        <div class="form-group">
          <label for="slug">Slug</label>
          <input value="" name="slug" id="slug" type="text" class="@error('slug') is-invalid @enderror form-control">
        </div>
        <div class="form-group">
          <label for="description">Descripcion</label>
          <input value="" name="description" id="description" type="text" class="@error('description') is-invalid @enderror form-control">
        </div>
        <div class="form-group">
          <label for="model">Modelo</label>
          <input value="Permission" readonly name="model" id="model" type="text" class="@error('model') is-invalid @enderror form-control" >
        </div>
      </fieldset>
    </div>
  </div>
</main>
@endsection