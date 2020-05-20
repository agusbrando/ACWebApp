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
                <a href="{{ url()->previous() }}" class="my-auto mx-1 h5"><i class="fas fa-arrow-left"></i></a>
                <h3>Cursos</h3>
            </div>

            <div>
                <a class="btn btn-outline-info" href="/courses/create" role="button">Añadir Curso</a>

            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-sm-12">

                <div class="divShowCoursesContent  d-flex flex-row bd-highlight mb-3 ">
                    <div id="accordion" class="w-100 h-100">

                        @foreach($years as $year)
                        <div class="card">
                            <div class="card-header list-group-item d-flex justify-content-between align-items-center" id="heading{{$year->id}}" data-toggle="collapse" data-target="#collapse{{$year->id}}" aria-expanded="false" aria-controls="collapse{{$year->id}}">

                                <h5 class="mb-0">
                                    <button class="btn collapsed">
                                        {{$year->name}}
                                    </button>
                                </h5>

                            </div>
                            <!-- collapse show lo muestra abierto por defecto -->
                            <div id="collapse{{$year->id}}" class="collapse" aria-labelledby="heading{{$year->id}}" data-parent="#accordion">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">

                                        <div class="card">

                                            <div class="w-100" id="heading{{$year->id}}" data-toggle="collapse" data-target="#collapse{{$year->id}}" aria-expanded="false" aria-controls="collapse{{$year->id}}">
                                               
                                                @if(count($year->yearUnions) > 0)
                                                    @foreach($year->yearUnions as $course)
                                                        @if($course->trashed())
                                                            <table id='mytable' class="table w-100">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th>Id</th>
                                                                        <th>Año</th>
                                                                        <th>Nombre</th>
                                                                        <th>Numero de Alumnos</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tr>

                                                                    <td>{{$course->course_id}} </td>
                                                                    <td>{{$course->level}}</td>
                                                                    <td>{{$course->name}}</td>
                                                                    <td>{{$course->num_students}}</td>


                                                                    <td class="botones">
                                                                        <a class="btn btn-outline-primary" href="{{url('courses/show',array($course->course_id,$year->id))}}">Ver</a>
                                                                    </td>
                                                                </tr>

                                                                </tbody>
                                                            </table>
                                                        @endif

                                                    @endforeach
                                                @endif

                                            </div>
                                            <!-- collapse show lo muestra abierto por defecto -->

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
    </div>
</main>

@endsection