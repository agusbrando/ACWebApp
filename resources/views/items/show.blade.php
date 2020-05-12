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
          <a href="/items" class="my-auto mx-1 h5"><i class="fas fa-arrow-left"></i></a>
          <h3>Material del Aula</h3>
      </div>
      <div >
      
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


              <div id="accordion">

                @foreach($courses as $course)
                @if(($course->level % 2) != 0)
                <div class="card">
                  <div class="card-header list-group-item d-flex justify-content-between align-items-center" id="heading{{$course->id}}" data-toggle="collapse" data-target="#collapse{{$course->id}}" aria-expanded="false" aria-controls="collapse{{$course->id}}">

                    <h5 class="mb-0">
                      <button class="btn collapsed">
                        {{$course->name}}
                      </button>
                    </h5>
                    <span class="badge badge-primary badge-pill"> {{$users->count()}}</span>
                  </div>
                  <!-- collapse show lo muestra abierto por defecto -->
                  <div id="collapse{{$course->id}}" class="collapse" aria-labelledby="heading{{$course->id}}" data-parent="#accordion">
                    <div class="card-body">
                      <ul class="list-group list-group-flush">

                        <!-- @foreach($users as $user)

                  <li class="list-group-item list-group-item-action">{{$user->first_name}}, {{$user->last_name}}</li>
                  @endforeach -->

                        @foreach($courses as $course2)
                        @if((($course->id.$course->level) == ($course2->id.$course2->level)) || ($course->id.$course->level) == (($course2->id + 1).($course2->level + 1)))
                        <div class="card">

                          <div class="card-header list-group-item d-flex justify-content-between align-items-center" id="heading{{$course2->id.$course2->level}}" data-toggle="collapse" data-target="#collapse{{$course2->id.$course2->level}}" aria-expanded="false" aria-controls="collapse{{$course2->id.$course2->level}}">

                            <h5 class="mb-0">
                              <button class="btn collapsed">
                                {{$course2->level.'º de '.$course2->name}}
                              </button>
                            </h5>
                          </div>
                          <!-- collapse show lo muestra abierto por defecto -->
                          <div id="collapse{{$course2->id.$course2->level}}" class="collapse" aria-labelledby="heading{{$course2->id.$course2->level}}" data-parent="#accordion">
                            <div class="card-body">
                              <ul class="list-group list-group-flush">

                                @foreach($users as $user)

                                <li class="list-group-item list-group-item-action">{{$user->first_name}}, {{$user->last_name}}</li>
                                @endforeach
                              </ul>
                            </div>
                          </div>
                        </div>
                        @endif
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
                @endif
                @endforeach
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
