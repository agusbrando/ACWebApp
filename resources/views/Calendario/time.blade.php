@extends('base')

@section('main')
<link href="{{ asset('css/calendar.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class=" col-md-10 ml-sm-auto col-lg-10">
  <div class="card shadow">
    <div class="card-header bg-dark text-light row m-0 justify-content-between">
      <div class="row">
        <a href="/events" class="my-auto mx-1 h5"><i class="fas fa-arrow-left ml-1"></i></a>
        <h3 class="mt-1 ml-1">Reserva de aulas</h3>
      </div>
      <div>
        <a type="button" href="/types" class="btn btn-outline-light mt-1">Añadir Tipo</a>
        <a type="button" href="/sessions" class="btn btn-outline-light mt-1 ml-1">Añadir Hora</a>
        <a type="button" href="/list" class="btn btn-outline-light mt-1 ml-1">Listado</a>
      </div>
    </div>
    <div class="card-body row no-gutters">

      <div class="row border-right-0 border-top-0 border-bottom-0 col-12 w-100">
          {{ csrf_field() }}
      </div>

      <div class="col-md-12 bg-light border-right p-0">
        <br>
        <img id="snippet" src="{{asset('img/snippet2.jpg')}}" alt="...">
        <h3 class="text-center mt-2 mb-1">Selecciona una hora disponible</h3>
        <hr class="w-75">
        <br>
        <div id="buttons">
          @if(!empty($sessions))
            @foreach($sessions->sortBy('time_start') as $session)
              <button type="submit" 
              onclick="window.location.href='{{ route('crearEvento',['fecha'=> $dia, 'hora' => $session->time_start, 'tipo' => $tipo]) }}'"
              class="btn btn-info btn-block">{{ $session->time_start }}</button>
            @endforeach
          @else
            <p>No hay horas disponibles.</p>
          @endif
        </div>
        <br>
      </div>
    </div>
</main>
@endsection