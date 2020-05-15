@extends('base')

@section('login')
@include('auth.login')
@endsection
@section('main')

<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="card shadow">
    <div class="card-header row m-0 justify-content-between">

      <div class="d-flex flex-row">
        <a href="{{ url()->previous() }}" class="my-auto mx-1 h5"><i class="fas fa-arrow-left"></i></a>
        <h3>Material del {{$item->aula->name}}</h3> <!-- saco el nombre del array clave valor -->
      </div>
      <div class="d-flex flex-row-reverse">
        <form method="post" action="{{ route('items.destroy', $item->id)}}">
          @csrf
          @method('DELETE')
          <button class="btn btn-outline-danger ml-2" type="submit">Eliminar</button>
        </form>
        <form method="get" action="{{ route('items.edit', $item->id) }}">
          @csrf
          @method('GET')
          <button class="btn btn-outline-info" role="button">Editar Material</button>
        </form>

      </div>
    </div>
    <div class="card-body row no-gutters">
      <div class="col-sm-12">

        <div class="container">


          <!-- Portfolio Item Row -->
          <div class="row">
            <div class="col">
              <h1 class="display-8">{{$item->number." - ".$item->name}}</h1>


              <div class="col-md-11">
                <img class="img-fluid" src="http://placehold.it/750x500" alt="">
              </div>

            </div>

            <div class="col-md-4">
              
              <h3 class="my-3">Características</h3>

              <ul class="text-justify">
                <li>ID              = {{$item->id}}</li>
                <li>Número          = {{$item->number}}</li>
                <li>Fecha de compra = {{$item->date_pucharse}}</li>
                <li>Aula            = {{$item->aula->name}}</li>
                <li>Estado          = {{$item->state->name}}</li>
                <li>Tipo            = {{$item->type->name}}</li>

              </ul>
            </div>

          </div>
          <!-- /.row -->

          <!-- Related Projects Row -->
          <h3 class="my-4">Más Material del aula</h3>

          <div class="row">

            <div class="col-md-3 col-sm-6 mb-4">
              <a href="#">
                <img class="img-fluid" src="http://placehold.it/500x300" alt="">
              </a>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
              <a href="#">
                <img class="img-fluid" src="http://placehold.it/500x300" alt="">
              </a>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
              <a href="#">
                <img class="img-fluid" src="http://placehold.it/500x300" alt="">
              </a>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
              <a href="#">
                <img class="img-fluid" src="http://placehold.it/500x300" alt="">
              </a>
            </div>

          </div>
          <!-- /.row -->

        </div>
      </div>
    </div>

  </div>
</main>

@endsection