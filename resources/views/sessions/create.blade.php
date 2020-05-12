@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Nueva Sesión</h3>
            <form action="{{ route('sessions.store')}}" method="POST">
                @method('POST')
                <div class="col-12">
                    <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
                    @csrf
                    <a class="btn btn-outline-warning float-right" href="{{ route('sessions.index')}}" tabindex="-1" aria-disabled="true">Cancelar</a>
                </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-12 col-md-4 col-lg-2 p-3">
                <img src="{{asset('img/default_session.jpg')}}" class="img-thumbnail" alt="...">
            </div>
            <div class="col-12 col-md-8 col-lg-10 p-3">
                <div>
                    <fieldset>
                        <div class="form-group">
                            <label for="classroom_id">Classroom_id</label>
                            <input value="" name="classroom_id" id="classroom_id" type="text" class="@error('classroom_id') is-invalid @enderror form-control">
                        </div>
                        <div class="form-group">
                            <label for="type_id">Type_id</label>
                            <input value="" name="type_id" id="type_id" type="text" class="@error('type_id') is-invalid @enderror form-control">
                        </div>
                        <div class="form-group">
                            <label for="day">Dia</label>
                            <input value="" name="day" id="day" type="text" class="@error('day') is-invalid @enderror form-control">
                        </div>  
                        <div class="form-group">
                            <label for="time_start">Hora de Inicio</label>
                            <input id="horaSession" value="<?php echo date("H:i"); ?>" class="form-control @error('time_start') is-invalid @enderror form-control" type="time" id="time_start" name="time_start">                            
                        </div>  
                        <div class="form-group">
                            <label for="time_end">Hora de Fin</label>
                            <input id="horaSession" value="<?php echo date("H:i"); ?>" class="form-control @error('time_end') is-invalid @enderror form-control" type="time" id="time_end" name="time_end">                            
                        </div>                     
                    </fieldset>
                    @error('email', 'login')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</main>
@endsection