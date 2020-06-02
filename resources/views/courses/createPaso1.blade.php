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
                    <a href="{{ url()->previous() }}" class="my-1 mx-1 h5"><i class="fas fa-arrow-left"></i></a>
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
        <div class="card-body row no-gutters">
            <div class="col-sm-12">
                <div class="container divShowCoursesContent">

                    <!-- Proteccion contra consultas no deseadas -->
                    @csrf
                    <div class="form-group ">
                        <div class="form-group mt-5 mb-5">
                            <h5 class="card-title">En que año se imparte</h5>
                            <select class="form-control mb-5" id="year_id" name="year_id">
                                <option disabled selected>Selecciona un año</option>
                                <!--Hace la funcion de un placeholder-->
                                @foreach($years as $year)
                                <option value="{{$year->id}}">{{$year->name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group mt-4 card shadow-sm p-3 mb-5 bg-white rounded">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Crea un año</h5>
                                <input type="text" id="nuevoYear" name="nuevoYear" placeholder="Ejemplo: 2020/2021" class="form-control mb-4">

                                <h6 class=" mb-3">Duración del año</h6>
                                <label for="nombre">Fecha de incio</label>
                                <input type="date" id="date_pucharse" name="date_pucharse" placeholder="- Seleccionar fecha -" class="form-control">

                                <label for="nombre">Fecha de fin</label>
                                <input type="date" id="date_pucharse" name="date_pucharse" placeholder="- Seleccionar fecha -" class="form-control">
                            </div>
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