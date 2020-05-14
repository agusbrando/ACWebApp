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
        <h3>Material del Aula</h3>
      </div>
      <div class="d-flex flex-row-reverse">
        <form method="post" action="{{ route('items.destroy', $item->id)}}">
          @csrf
          @method('DELETE')
          <button class="btn btn-outline-danger ml-2" type="submit">Delete</button>
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
              <h1 class="display-8">Responsables</h1>


              <div class="col-md-11">
                <img class="img-fluid" src="http://placehold.it/750x500" alt="">
              </div>

            </div>

            <div class="col-md-4">
              <form method="get" action="{{ route('items.edit', $item->id)}}">
                @csrf
                @method('GET')
                <button class="btn btn-primary my-1 mt-4" type="submit">Añadir Responsable</button>
              </form>
              <h3 class="my-3">Project Description</h3>

              <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
              <h3 class="my-3">Project Details</h3>
              <ul>
                <li>Lorem Ipsum</li>
                <li>Dolor Sit Amet</li>
                <li>Consectetur</li>
                <li>Adipiscing Elit</li>
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