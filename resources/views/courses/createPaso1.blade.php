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
                    <h3 class="pb-5 pt-3">¿En que año se va a impartir este curso?</h3 class="pb-2">
                    <div class="form-group">
                        
                        <div class="card-deck justify-content-between p">
                            <div class="card text-white bg-info mb-3 " style="max-width: 18rem;">
                                <div class="card-header">
                                    <h5 class="card-title">Selecciona un año</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group ">
                                        <h6 class="card-title">Año</h6>
                                        <select class="form-control" id="year_id" name="year_id">
                                            <option disabled selected>Selecciona un año</option>
                                            <!--Hace la funcion de un placeholder-->
                                            @foreach($years as $year)
                                            <option value="{{$year->id}}">{{$year->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                                <div class="card-header">
                                    <h5 class="card-title">Crea un Año</h5>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <h6 class="card-title">Introduce un año</h6>
                                        <input type="text" id="nuevoYear" name="nuevoYear" placeholder="Ejemplo: 2020/2021" class="form-control">
                                    </div>
                                </div>
                            </div>

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