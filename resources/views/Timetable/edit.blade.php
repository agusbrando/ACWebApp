@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Edita el horario</h1>

        
    
        <form method="post" action="{{ route('horarios.update', $timetable->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="name">Nombre del horario:</label>
                <input type="text" class="form-control" name="name" value={{ $timetable->name }} />
            </div>
            <div class="form-group">
                <label for="date_start">Inicio del horario:</label>
                <input type="text" class="form-control" name="date_start" value={{ $timetable->date_start }} />
            </div>

            <div class="form-group">
                <label for="date_end">Fin del horario:</label>
                <input type="text" class="form-control" name="date_end" value={{ $timetable->date_end }} />
            </div>
           
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
@endsection