@extends('base')

@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <a href="{{ url()->previous() }}" class="my-auto mx-2 h5"><i class="fas fa-arrow-left"></i></a>
            

            <form action="{{ route('sessiontimetable.destroy', $session_timetable->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger  float-right m-1" type="submit">Borrar</button>
            </form>
        </div>
        <div class="card-body row no-gutters">
        <form method="post" action="{{ route('sessiontimetable.update',$session_timetable->id) }}">
                @csrf
                @method('patch')
                    <div class="form-group">
                        <label for="timetable">Horario:</label>
                        <input type="text" class="form-control" id="name" name="timetable" value="{{$timetable->id}}-{{$timetable->name}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="sesion">Sesión:</label>
                        <select class="form-control" id="classroom" name="sesion">
                        <option value="{{$hora_valida->id}}">{{$hora_valida->dia}}-{{$hora_valida->time_start}}</option>
                                @foreach($horas_validas as $hora_valida)
                                <option value="{{$hora_valida->id}}">{{$hora_valida->dia}}-{{$hora_valida->time_start}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="asignatura">Asignatura</label>
                        
                        <select class="form-control" id="asignatura" name="asignatura">
                        <option value="{{$subject->id}}">{{$subject->abbreviation}}</option>
                                 @foreach($subjects as $subject)
                                
                                <option value="{{$subject->id}}">{{$subject->abbreviation}}</option>
                                @endforeach 
                            </select>
                    </div>
                    


                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Guardar Cambios">
                    </div>
                </form>
        </div>
        <div class="card-footer col-12">
            <div class="col-md-12 text-center">

            </div>
        </div>
    </div>
    </div>

</main>
@endsection