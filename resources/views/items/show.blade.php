@extends('base')

@section('main')

<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 ">
  <div class="row">
    <h1 class="display-4">{{$type->name}} {{$item->name}} </h1>
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

          <div class="card" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
            <div class="card-header list-group-item d-flex justify-content-between align-items-center" id="heading1" >
              <h5 class="mb-0">
                <button class="btn collapsed" >
                  2019 - 2020
                </button>
              </h5>
              <span class="badge badge-primary badge-pill">4</span>
            </div>
            <!-- collapse show lo muestra abierto por defecto --> 
            <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion">
              <div class="card-body">
              truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf mh hered npiente ea proident. Ad vegan excepteur butcher vice lomo.
              </div>
            </div>
          </div>

          <div class="card" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
            <div class="card-header list-group-item d-flex justify-content-between align-items-center" id="heading2">
              <h5 class="mb-0">
                <button class="btn collapsed ">
                  2018 - 2019
                </button>
                
              </h5>
              <span class="badge badge-primary badge-pill">14</span>
            </div>
            <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion">
              <div class="card-body">
                 truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf mh hered npiente ea proident. Ad vegan excepteur butcher vice lomo.
              </div>
            </div>
          </div>

          <div class="card" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
            <div class="card-header list-group-item d-flex justify-content-between align-items-center" id="heading3">
              <h5 class="mb-0">
                <button class="btn collapsed" >
                  2017 - 2018
                </button>
              </h5>
              <span class="badge badge-primary badge-pill">2</span>
            </div>
            <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
              <div class="card-body">
              truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf mh hered npiente ea proident. Ad vegan excepteur butcher vice lomo.
              </div>
            </div>
          </div>
          <div class="card" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
            <div class="card-header list-group-item d-flex justify-content-between align-items-center" id="heading4">
              <h5 class="mb-0">
                <button class="btn collapsed" >
                  2017 - 2018
                </button>
              </h5>
              <span class="badge badge-primary badge-pill">2</span>
            </div>
            <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
              <div class="card-body">
              truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf mh hered npiente ea proident. Ad vegan excepteur butcher vice lomo.
              </div>
            </div>
          </div>
        </div>
        

      </div>

      <div class="col-md-4">
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