@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <br>
  <div class="card shadow">
    <div class="card-header bg-dark text-light row m-0 justify-content-between">
      <div class="row">
        <a href="/list" class="my-auto mx-1 h5"><i class="fas fa-arrow-left ml-1"></i></a>
        <h3 class="mt-1">Detalles Evento</h3>
      </div>
      <div>
        <a class="btn btn-outline-info mt-1 mr-1" href="{{ route('events.edit',$event->id)}}">Editar</a>
        <form class="float-right" action="{{ route('events.destroy',$event->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline-danger mt-1 ml-1">Eliminar</button>
        </form>
      </div>
    </div>
    <div class="card-body row no-gutters">
      <div class="col-12 col-md-4 col-lg-2 p-3">
        <img src="{{asset('img/default_event.jpg')}}" class="img-thumbnail" alt="...">
      </div>
      <div class="col-12 col-md-8 col-lg-10 p-3">
        <div>
          <h5 class="card-title">{{($event->title)}}</h5>
          <p class="card-text">{{($event->date)}}</p>
          <p class="card-text">{{($event->description)}}</p>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection