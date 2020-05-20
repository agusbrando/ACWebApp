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
                    <a href="{{ url()->previous() }}" class="my-1 mx-1 h5"><i class="fas fa-arrow-left"></i></a>

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
                            <label for="formControlSelect1">Curso</label>
                            <select class="form-control" id="course_id" name="course_id">
                                <option disabled selected>Selecciona un curso</option>
                                <!--Hace la funcion de un placeholder-->
                                @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->level}}º {{$course->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="card-deck justify-content-between">
                            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                                <div class="card-header">1º Eval</div>
                                <div class="card-body">
                                    <div>
                                        <h5 class="card-title">Fecha Inicio</h5>
                                        <input type="date" id="eval_1_date_start" name="eval_1_date_start" placeholder="- Seleccionar fecha -" class="form-control">
                                    </div>
                                    <div>
                                        <h5 class="card-title">Fecha Fin</h5>
                                        <input type="date" id="eval_1_date_end" name="eval_1_date_end" placeholder="- Seleccionar fecha -" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                                <div class="card-header">2º Eval</div>
                                <div class="card-body">
                                    <div>
                                        <h5 class="card-title">Fecha Inicio</h5>
                                        <input type="date" id="eval_2_date_start" name="eval_2_date_start" placeholder="- Seleccionar fecha -" class="form-control">
                                    </div>
                                    <div>
                                        <h5 class="card-title">Fecha Fin</h5>
                                        <input type="date" id="eval_2_date_end" name="eval_2_date_end" placeholder="- Seleccionar fecha -" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                                <div class="card-header">3º Eval</div>
                                <div class="card-body">
                                    <div>
                                        <h5 class="card-title">Fecha Inicio</h5>
                                        <input type="date" id="eval_3_date_start" name="eval_3_date_start" placeholder="- Seleccionar fecha -" class="form-control">
                                    </div>
                                    <div>
                                        <h5 class="card-title">Fecha Fin</h5>
                                        <input type="date" id="eval_3_date_end" name="eval_3_date_end" placeholder="- Seleccionar fecha -" class="form-control">
                                    </div>
                                </div>
                            </div>

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