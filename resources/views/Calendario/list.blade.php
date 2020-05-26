@extends('base')

@section('main')

<link href="{{ asset('css/calendar.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class=" col-md-10 ml-sm-auto col-lg-10">
    <div class="card shadow">
        <div class="card-header bg-dark text-light row m-0 justify-content-between">
        <div class="row">
                <a href="/events" class="my-auto mx-1 h5"><i class="fas fa-arrow-left ml-1"></i></a>
                <h3 class="mt-1 ml-1">Reserva de aulas</h3>
            </div>
            <div>
            @if(Session::get('user_role')!= 'Alumno'&&'User'&&'Unverified')
                <a type="button" href="/types" class="btn btn-outline-light mt-1">Añadir Tipo</a>
                <a type="button" href="/sessions" class="btn btn-outline-light mt-1 ml-1">Añadir Hora</a>
            @endif
                <a type="button" href="/list" class="btn btn-outline-light mt-1 ml-1">Listado</a>
            </div>
        </div>
        <div class="card-body row no-gutters">

            <div class="row border-right-0 border-top-0 border-bottom-0 col-12 w-100">
                {{ csrf_field() }}
            </div>

            <div class="col-md-12 bg-light border-right p-0">
                <br>
                <h3 class="text-center mt-2 mb-1">Listado de eventos</h3>
                <hr class="w-75">
                <br>
                <div id="buttons">
                     @if(!empty($events))
                        @foreach($events->sortBy('date') as $event)
                            @if($event->type_id == 1 || ($event->type_id == 2 && $user->role_id != 4))
                                <h3>{{ substr($event->date, -2, 2).substr($event->date, -6, 4).substr($event->date, -10, 4) }}</h3>
                                @if($event->type_id == 1)
                                    <h5 class="text-muted">Tutoría</h5>
                                @else
                                    <h5 class="text-muted">Reserva de aula</h5>
                                @endif
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <a>{{ $event->title }}</a>
                                    <a id="info" type="submit" href="{{ asset('events/edit/'.$event->id) }}" class="btn btn-info btn-sm">Detalles</a>
                                </div>
                                <hr>
                            @endif
                        @endforeach
                    @else
                        <p>No existen reservas.</p>
                    @endif
                </div>
                <br>
            </div>
        </div>
</main>
@endsection