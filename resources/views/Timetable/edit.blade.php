@extends('base')

@section('main')
<link href="{{ asset('css/timetable.css') }}" rel="stylesheet" type="text/css" />
<main class="col-md-9 col-lg-10 px-1">
<div class="header"></div>
<div class="container-fluid">
        <form method="post" action="{{ route('horarios.update',$timetable->id) }}">
            @method('patch')
            @csrf

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$timetable->name}}">
            </div>
            <div class="form-group">
                <label for="date_start">Fecha de inicio del horario</label>
                <input type="date" class="form-control" id="date_start" name="date_start" value="{{$timetable->date_start}}">
            </div>
            <div class="form-group">
                <label for="date_end">Fecha de fin del horario</label>
                <input type="date" class="form-control" id="date_end" name="date_end" value="{{$timetable->date_end}}">
            </div>


            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Guardar Cambios">
            </div>
        </form>
    <div>
</main>
@endsection