@extends('base')

@section('main')
<link href="{{ asset('css/calendar.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class=" col-md-10 ml-sm-auto col-lg-10">

  <div class="space"></div>
  <p class="lead">
    <h1 class="display-4 pr-3">Calendario</h1>
    <br>
    <hr>
    <br>
    <div class="calendar">
      <div class="row d-flex justify-content-center">
        <div class="row border-right-0 border-top-0 border-bottom-0 col-12 w-100">
          <form method="POST" action="{{ url('calendarTime') }}">
            {{ csrf_field() }}
            <div class="col-12 p-0" style="overflow:hidden;">
              <div class="form-group">
                <div class="row">
                  <!-- <div class="col-12">                 
                  <div id="datetimepicker13"></div> 
                </div>-->
                </div>
              </div>
              <!-- <script type="text/javascript">
              $(function() {
                $('#datetimepicker13').datetimepicker({
                  inline: true,
                  sideBySide: false
                });
              });
            </script> -->
            </div>
        </div>

        <div class="col-md-3 bg-light border-right p-0">
          <div id="espacio" class="bg-dark w-100">
            <h3>Eventos</h3>
          </div>
          <br>
          <div id="calendario">
            <input id="diaElegido" class="form-control" type="date" id="date" name="date">
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
        <div class="col-md-3 bg-light border-left border-right p-0 ">
          <div id="espacio" class="bg-dark w-100">
            <h3>Horas</h3>
          </div>
          <br>
          <div id="buttons">
            @foreach($sessions as $session)
            <button type="submit" onclick="window.location.href='{{route('crearEvento',['fecha'=> $dia, 'hora' => $session->time_start->format('H:i'), 'tipo' => $tipo])}}'" class="btn btn-info btn-block">{{ $session->time_start->format('H:i') }}</button>
            @endforeach
          </div>
          <br>
        </div>
        <div class="col-md-3 bg-light border-left p-0 ">
          <div id="espacio" class="bg-dark w-100">
            <h3>Reservas</h3>
          </div>
          <br>
          <div id="buttons">
            @foreach($events as $event)
            <h5>{{ substr($event->date, -8, 5) }}</h4>
            <div class="card-body d-flex justify-content-between align-items-center">
                <a>{{ $event->title }}</a>
                <a id="info" type="submit" href="{{ url('/detallesEvento/'.$event->id) }}" class="btn btn-primary btn-sm">Detalles</a>
              </div>
              <hr>
              @endforeach
          </div>
        </div>

      </div>
    </div>

</main>
@endsection