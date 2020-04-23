@extends('base')

@section('main')

<link href="{{ asset('css/timetable.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    
                <h1 class="display-3">Horario {{$timetable->name}} </h1>



            

</main>
@endsection