@extends('base')

@section('main')
<link href="{{ asset('css/calendar.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class=" col-md-10 ml-sm-auto col-lg-10">
  <div class="card shadow">
    <div class="card-header bg-dark text-light row m-0 justify-content-between">
      <h3 class="mt-1">Reserva de aulas</h3>
    </div>
    <div class="card-body row no-gutters">

      <div class="row border-right-0 border-top-0 border-bottom-0 col-12 w-100">
        <form method="GET" action="{{ url('time') }}">
          {{ csrf_field() }}
      </div>

      <div class="col-md-12 bg-light border-right p-0">
        <br>
        <img id="snippet" src="{{asset('img/snippet1.jpg')}}" alt="...">
        <h3 class="text-center mt-2 mb-1">Selecciona el tipo de evento y fecha</h3>
        <hr class="w-75">
        <br>
        <div id="calendario">
          <input id="diaElegido" value="<?php echo date("Y-m-d"); ?>" class="form-control w-25" type="date" id="date" name="date">
        </div>
        <br>
        <div id="buttons">
          @foreach($types as $type)
          <input type="submit" name="tipo" value="{{ $type->name }}" class="btn btn-info btn-block" />
          @endforeach
        </div>
        <br>
        </form>
      </div>
    </div>

</main>
@endsection