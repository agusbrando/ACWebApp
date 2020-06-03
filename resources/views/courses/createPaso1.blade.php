@extends('base')
@section('login')
@include('auth.login')
@endsection
@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <link href="{{ asset('css/courses.css') }}" rel="stylesheet" type="text/css" />
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">

            <div class="d-flex flex-row">
                <form method="get">
                    @csrf
                    @method('GET')
                    <a href="{{ route('courses.index') }}" class="my-1 mx-1 h5"><i class="fas fa-arrow-left"></i></a>
                </form>
                <h3>Crear Curso - Paso 1</h3>

            </div>
            <form method="get" action="{{ route('courses.createPaso2') }}">
                @csrf
                @method('GET')
                @if(in_array('Crear_course', Session::get('user_permissions')))
                <div class="form-group">

                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->

                    <button type="submit" class="btn btn-outline-success">Siguiente</button>
                </div>
                @endif

        </div>
        <div class="card-body row ">
            <div class="col-sm-12">

                <div class="container divShowCoursesContent">
                    
                    <div class="progress mt-3">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 33%"></div>
                    </div>

                    <!-- Proteccion contra consultas no deseadas -->
                    @csrf
                    <div class="form-group ">
                        <div class="form-group mt-5 mb-5">
                            <h5 class="card-title">En que año se imparte</h5>
                            <select class="form-control mb-5" id="year_id" name="selectYear_id">
                                <option disabled selected value="">Selecciona un año</option>
                                <!--Hace la funcion de un placeholder-->
                                @foreach($years as $year)
                                <option value="{{$year->id}}">{{$year->name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group mt-4 card shadow-sm  mb-5 bg-white rounded">
                            <div class="card-header">
                                <h5 class="card-title mb-1">Crea un año</h5>
                            </div>

                            <div class="card-body p-3">
                                <h6 class=" mb-3">Introduce el nuevo año lectivo</h6>
                                <input type="text" id="nuevoYear" name="nuevoYearTextInput" placeholder="Ejemplo: 2020/2021" class="form-control mb-4" v>
                                <hr>
                                <h6 class=" mb-3">Duración del año</h6>
                                <label for="nombre">Fecha de incio</label>
                                <input type="date" id="date_inicio" name="date_inicio" placeholder="- Seleccionar fecha -" class="form-control">

                                <label for="nombre">Fecha de fin</label>
                                <input type="date" id="date_fin" name="date_fin" placeholder="- Seleccionar fecha -" class="form-control">
                            </div>
                        </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
        <div class="card-footer w-100">
            <a class="btn btn-outline-warning float-right" href="/courses" aria-disabled="true">Cancelar</a>
        </div>
    </div>
</main>

@endsection