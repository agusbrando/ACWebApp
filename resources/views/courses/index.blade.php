@extends('base')

@section('login')
@include('auth.login')
@endsection
@section('main')

<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Cursos</h3>
            <div>
                <a class="btn btn-outline-info" href="/courses/create" role="button">Añadir Curso</a>

            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-sm-12">
                
                <div class="d-flex flex-row bd-highlight mb-3">
                    <div class="container-fluid">
                        <table id='mytable' class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Año</th>
                                    <th>Nombre</th>
                                    <th>Numero de Alumnos</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courses as $course)
                                <tr>
                                    <td>{{$course->id}}</td>
                                    <td>{{$course->level}}</td>
                                    <td>{{$course->name}}</td>
                                    <td>{{$course->num_students}}</td>
                                    

                                    <td class="botones">
                                        <!-- <form > method="get" action="{{ route('courses.show', $course->id)}}"
                                            @csrf
                                            @method('GET')
                                            
                                        </form> -->
                                        <button class="btn btn-primary" type="submit">Ver</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
        <div class=" card-footer col-12">
            <a class="btn btn-outline-warning float-right" href="#" aria-disabled="true">Cancelar</a>
        </div>
        </form>
    </div>
</main>

@endsection