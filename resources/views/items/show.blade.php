@extends('base')

@section('main')

<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 ">
  <div class="row">
    <h1 class="display-4">{{$item->number}} - {{$type->name}} {{$item->name}}</h1>
    <form method="get" action="{{ route('items.edit', $item->id)}}">
      @csrf
      @method('GET')
      <button class="btn btn-primary" type="submit">Edit</button>
    </form>
    <form method="post" action="{{ route('items.destroy', $item->id)}}">
      @csrf
      @method('DELETE')
      <button class="btn btn-danger" type="submit">Delete</button>
    </form>
  </div>

  <hr>
  <div class="container">


    <!-- Portfolio Item Row -->
    <div class="row">
      <div class="col">
        <h1 class="display-8">Responsables</h1>


        <div id="accordion">
          @foreach($courses as $course)
            <div class="card" >
              <div class="card-header list-group-item d-flex justify-content-between align-items-center" id="heading1" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                
                <h5 class="mb-0">
                  <button class="btn collapsed">
                    {{$couse->name}}
                  </button>
                </h5>
                <span class="badge badge-primary badge-pill"> {{$users->count()}}</span>
              </div>
              <!-- collapse show lo muestra abierto por defecto -->
              <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                      
                    @foreach($users as $user)
                      
                    <li class="list-group-item list-group-item-action">{{$user->first_name}}, {{$user->last_name}}</li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          @endforeach
        </div>


      </div>

      <div class="col-md-4">
        <form method="get" action="{{ route('items.edit', $item->id)}}">
          @csrf
          @method('GET')
          <button class="btn btn-primary" type="submit">Edit</button>
        </form>
        <h3 class="my-3">Project Description</h3>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
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

</main>
@endsection