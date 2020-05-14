@extends('base')

@section('main')

<link href="{{ asset('css/calendar.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class=" col-md-10 ml-sm-auto col-lg-10">
    <div class="card shadow">
        <div class="card-header bg-dark text-light row m-0 justify-content-between">
            <h3 class="mt-1">Reserva de aulas</h3>
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
                            <h3>{{ substr($event->date, -17, 14) }}</h3>
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