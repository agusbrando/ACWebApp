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
                <h3>Crear Curso - Paso 3</h3>

            </div>
            <form method="get" action="{{ route('courses.createPaso3') }}">
                @csrf
                @method('GET')
                @if(in_array('Crear_course', Session::get('user_permissions')))
                <div class="form-group">

                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->

                    <button type="submit" class="btn btn-outline-success">Crear</button>
                </div>
                @endif

        </div>
        <div class="card-body row no-gutters">
            <div class="col-sm-12">
                <div class="divShowCoursesContent  d-flex flex-row bd-highlight mb-3 ">
                    <div id="accordion" class="w-100 h-100">

                        @foreach($courses as $course)
                        <div class="card">
                            <div class="card-header list-group-item d-flex justify-content-between align-items-center" id="heading{{$course->id}}" data-toggle="collapse" data-target="#collapse{{$course->id}}" aria-expanded="false" aria-controls="collapse{{$course->id}}">

                                <h5 class="mb-0">
                                    <button class="btn collapsed">
                                        {{$course->level}}º {{$course->abbreviation}}
                                    </button>
                                </h5>

                            </div>
                            <!-- collapse show lo muestra abierto por defecto -->
                            <div id="collapse{{$course->id}}" class="collapse" aria-labelledby="heading{{$course->id}}" data-parent="#accordion">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">

                                        <div class="card">

                                            <div class="w-100" id="heading{{$course->id}}" data-toggle="collapse" data-target="#collapse{{$course->id}}" aria-expanded="false" aria-controls="collapse{{$course->id}}">
                                                <div class="w-100 scrollbar scrollbar-primary">
                                                    <div class="card row no-gutters table-responsive force-overflow ">

                                                        <table id='mytable' class="table w-100 pb-5">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Nombre</th>
                                                                    <th>Siglas</th>
                                                                    <th>Horas</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            @foreach($course->asignaturas as $asignatura)
                                                            <tbody>
                                                                <tr>

                                                                    <td>{{$asignatura->id}} </td>
                                                                    <td>{{$asignatura->name}}</td>
                                                                    <td>{{$asignatura->abbreviation}}</td>
                                                                    <td>{{$asignatura->hours}}</td>

                                                                    @if(in_array('Listar_course', Session::get('user_permissions')))
                                                                    <td class="botones">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="customSwitch{{$asignatura->id}}" name="asignatura{{$asignatura->id}}Añadido" value="{{$asignatura->id}}">
                                                                            <label class="custom-control-label" for="customSwitch{{$asignatura->id}}" name="asignatura{{$asignatura->id}}Añadido"></label>
                                                                        </div>
                                                                    </td>
                                                                    @endif
                                                                </tr>

                                                            </tbody>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
        <div class=" card-footer w-100">
            <a class="btn btn-outline-warning float-right" href="/courses" aria-disabled="true">Cancelar</a>
        </div>
</main>

@endsection