@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet" type="text/css" />
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <div class="d-flex flex-row">
                <a href="/sessions" class="my-auto mx-1 h5"><i class="fas fa-arrow-left"></i></a>
                <h3>Detalles Sesión</h3>
            </div>
            <div>
                <a class="btn btn-outline-info" href="{{ route('sessions.edit',$session->id)}}">Editar</a>
                <form class="float-right" action="{{ route('sessions.destroy',$session->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger ml-1">Eliminar</button>
                </form>
            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-12 col-md-4 col-lg-2 p-3">
                <img src="{{asset('img/default_session.jpg')}}" class="img-thumbnail" alt="...">
            </div>
            <div class="col-12 col-md-8 col-lg-10 p-3">
                <div>
                    <h5 class="card-title">Aula: {{$session->classroom->name }}</h5>
                    <p class="card-text">Tipo: {{$session->type->name }}</p>
                    <p class="card-text">Dia de la semana: {{$days[$session->day]}}</p>
                    <p class="card-text">Hora de inicio: {{$session->time_start}}</p>
                    <p class="card-text">Hora de fin: {{$session->time_end}}</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection