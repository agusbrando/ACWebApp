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
                <h3>Cursos Académicos</h3>
            </div>

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

                                                <table id='mytable' class="table w-100 pb-5">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Nombre</th>
                                                            <th>abbreviation</th>
                                                            <th>hours</th>
                                                        </tr>
                                                    </thead>
                                                    @foreach($course->asignaturas as $asignatura)
                                                    <tr>

                                                        <td>{{$asignatura->id}} </td>
                                                        <td>{{$asignatura->name}}</td>
                                                        <td>{{$asignatura->abbreviation}}</td>
                                                        <td>{{$asignatura->hours}}</td>


                                                        <td class="botones">
                                                            <a class="btn btn-outline-primary" href="#">Ver</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                
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