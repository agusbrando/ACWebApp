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
                    <div id="accordion">

                        @foreach($courses as $course)
                        @if(($course->level % 2) != 0)
                        <div class="card">
                            <div class="card-header list-group-item d-flex justify-content-between align-items-center" id="heading{{$course->id}}" data-toggle="collapse" data-target="#collapse{{$course->id}}" aria-expanded="false" aria-controls="collapse{{$course->id}}">

                                <h5 class="mb-0">
                                    <button class="btn collapsed">
                                        {{$course->name}}
                                    </button>
                                </h5>
                               
                            </div>
                            <!-- collapse show lo muestra abierto por defecto -->
                            <div id="collapse{{$course->id}}" class="collapse" aria-labelledby="heading{{$course->id}}" data-parent="#accordion">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">

                                        <div class="card">

                                            <div class="card-header list-group-item d-flex justify-content-between align-items-center" id="heading{{$course->id.$course->level}}" data-toggle="collapse" data-target="#collapse{{$course->id.$course->level}}" aria-expanded="false" aria-controls="collapse{{$course->id.$course->level}}">

                                                <h5 class="mb-0">
                                                    <button class="btn collapsed">
                                                        {{$course->level.'º de '.$course->name}}
                                                    </button>
                                                </h5>
                                            </div>
                                            <!-- collapse show lo muestra abierto por defecto -->
                                            
                                        </div>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        
        </form>
    </div>
</main>

@endsection