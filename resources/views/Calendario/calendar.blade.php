@extends('base')

@section('main')
<link href="{{ asset('css/calendar.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class=" col-md-10 ml-sm-auto col-lg-10">
  <div class="card shadow">
    <div class="card-header row m-0 justify-content-between">
      <h3>Calendario</h3>
    </div>
    <div class="card-body row no-gutters">

      <div class="row border-right-0 border-top-0 border-bottom-0 col-12 w-100">
        <form method="POST" action="{{ url('calendarTime') }}">
          {{ csrf_field() }}
      </div>

      <div class="col-md-4 bg-light border-right p-0">
        <div id="espacio" class="bg-dark w-100">
          <h3 class="text-white pt-2 pl-3 pr-3">Eventos</h3>
        </div>
        <br>
        <div id="calendario">
          <input id="diaElegido" value="<?php echo date("Y-m-d"); ?>" class="form-control" type="date" id="date" name="date">
        </div>
        <hr>
        <div id="buttons">
          @foreach($types as $type)
          <input type="submit" name="tipo" value="{{ $type->name }}" class="btn btn-info btn-block" />
          @endforeach
        </div>
        <br>
        </form>
      </div>
      <div class="col-md-4 bg-light border-left border-right p-0 ">
        <div id="espacio" class="bg-dark d-flex w-100">
          <h3 class="text-white pt-2 pl-3 pr-3">Horas</h3>
          <div id="añadir" class="float-right mt-2 pt-1">
            <a class="btn btn-outline-light text-light float-right w-100 h-100 p-0 pb-1" type='submit' href="{{ url('/sessions') }}">+</a>
          </div>
        </div>
        <br>
        <div id="buttons">
          @if(!empty($events))
          @foreach($sessions as $session)
          <button type="submit" onclick="window.location.href='{{route('crearEvento',['fecha'=> $dia, 'hora' => $session->time_start->format('H:i'), 'tipo' => $tipo])}}'" class="btn btn-info btn-block">{{ $session->time_start->format('H:i') }}</button>
          @endforeach
          @else
          <p>Selecciona un tipo de evento.</p>
          @endif
        </div>
        <br>
      </div>
      <div class="col-md-4 bg-light border-left p-0 ">
        <div id="espacio" class="bg-dark w-100">
          <h3 class="text-white pt-2 pl-3 pr-3">Reservas</h3>
        </div>
        <br>
        <div id="buttons">
          @if(!empty($events))
          @foreach($events->sortBy('date') as $event)
          <h5>{{ substr($event->date, -8, 5) }}</h4>
          <a>{{ substr($event->date, -30, 10) }}</a>
            <div class="card-body d-flex justify-content-between align-items-center">
              <a>{{ $event->title }}</a>            
              <a id="info" type="submit" href="{{ url('/detallesEvento/'.$event->id) }}" class="btn btn-info btn-sm">Detalles</a>
            </div>
            <hr>
            @endforeach
            @else
            <p>No existen reservas.</p>
            @endif
        </div>
      </div>
    </div>

</main>
@endsection