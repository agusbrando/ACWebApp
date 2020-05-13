@extends('base')
@section('login')
@include('auth.login')
@endsection
@section('main')

<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <form method="get">
                <div class="d-flex flex-row">
                    @csrf
                    @method('GET')
                    <a href="{{ route('courses.index')}}" class="my-1 mx-1 h5"><i class="fas fa-arrow-left"></i></a>

                    <h3>Crear Curso</h3>
                </div>
            </form>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-sm-12">
                <div class="container">
                    <form method="post" action="{{ route('courses.store') }}">
                        <!-- Proteccion contra consultas no deseadas -->
                        @csrf

                        <div class="form-group">
                            <label for="formControlSelect1">Asignatura</label>
                            <select class="form-control" id="subject_id" name="subject_id">
                                <option disabled selected>Selecciona una asignatura</option>
                                <!--Hace la funcion de un placeholder-->
                                @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formControlSelect1">Curso</label>
                            <select class="form-control" id="course_id" name="course_id">
                                <option disabled selected>Selecciona un curso</option>
                                <!--Hace la funcion de un placeholder-->
                                @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->level}}º {{$course->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formControlSelect1">Evaluación</label>
                            <select class="form-control" id="evaluation_id" name="evaluation_id">
                                <option disabled selected>Selecciona una evaluación</option>
                                <!--Hace la funcion de un placeholder-->
                                @foreach($evaluations as $evaluation)
                                <option value="{{$evaluation->id}}">{{$evaluation->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formControlSelect1">Año</label>
                            <select class="form-control" id="year_id" name="year_id">
                                <option disabled selected>Selecciona un año</option>
                                <!--Hace la funcion de un placeholder-->
                                @foreach($years as $year)
                                <option value="{{$year->id}}">{{$year->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formControlSelect1">¿Quien es el responsable?</label>
                            <select class="form-control" id="responsable_id" name="responsable_id">
                                <option disabled selected>Selecciona un responsable</option>
                                <!--Hace la funcion de un placeholder-->
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Observaciones</label>
                            <input type="text" class="form-control" id="notes" name="notes" aria-describedby="notesHelp" placeholder="Observaciones">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Fecha de correción</label>
                            <input type="date" id="date_check" name="date_check" placeholder="- Seleccionar fecha -" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Fecha inicio</label>
                            <input type="date" id="date_start" name="date_start" placeholder="- Seleccionar fecha -" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Fecha fin</label>
                            <input type="date" id="date_end" name="date_end" placeholder="- Seleccionar fecha -" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->

                            <button type="submit" class="btn btn-outline-primary">Crear</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class=" card-footer w-100">
            <a class="btn btn-outline-warning float-right" href="/courses" aria-disabled="true">Cancelar</a>
        </div>
</main>

@endsection