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
                <h3>Crear Curso - Paso 2</h3>

            </div>
            <form method="get" action="{{ url('courses/createPaso3') }}">
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
                <div class="divShowCoursesContent  d-flex flex-row bd-highlight mb-3 ">
                    <table id='mytable' class="table w-100 pb-5">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Año</th>
                                <th>Nombre</th>
                                <th>Numero de Alumnos</th>
                                @if(in_array('Listar_course', Session::get('user_permissions')))
                                <th>Añadir</th>
                                @endif
                            </tr>
                        </thead>
                        @foreach($courses as $course)
                        <tr>

                            <td>{{$course->id}} </td>
                            <td>{{$course->level}}</td>
                            <td>{{$course->name}}</td>
                            <td>{{$course->num_students}}</td>


                            @if(in_array('Listar_course', Session::get('user_permissions')))
                            <td class="botones">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch{{$course->id}}" name="curso{{$course->id}}Añadido" value="{{$course->id}}">
                                    <label class="custom-control-label" for="customSwitch{{$course->id}}" name="curso{{$course->id}}Añadido"></label>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            </form>
        </div>
        <div class=" card-footer w-100">
            <a class="btn btn-outline-warning float-right" href="/courses" aria-disabled="true">Cancelar</a>
        </div>
</main>

@endsection