@extends('base')

@section('main')

<link href="{{ asset('css/calendar.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class=" col-md-10 ml-sm-auto col-lg-10">
    <div class="card shadow">
        <div class="card-header bg-dark text-light row m-0 justify-content-between">
            <div class="row">
                <a href="javascript:history.back()" class="my-auto mx-1 h5"><i class="fas fa-arrow-left ml-1"></i></a>
                <h3 class="mt-1 ml-1">Reserva de aulas</h3>
            </div>
            <div>
                <a type="button" href="/types" class="btn btn-outline-light mt-1">Añadir Tipo</a>
                <a type="button" href="/sessions" class="btn btn-outline-light mt-1 ml-1">Añadir Hora</a>
                <a type="button" href="/list" class="btn btn-outline-light mt-1 ml-1">Listado</a>
            </div>
        </div>
        <div class="card-body row no-gutters">

            <div class="row border-right-0 border-top-0 border-bottom-0 col-12 w-100">
                {{ csrf_field() }}
            </div>

            <div class="col-md-12 bg-light border-right p-0">
                <br>
                <img id="snippet" src="{{asset('img/snippet3.jpg')}}" alt="...">
                <h3 class="text-center mt-2 mb-1">Rellena los campos vacíos</h3>
                <hr class="w-75">
                <br>
                <form action="{{ asset('/crearEvento') }}" method="post">
                    <div id="form" class="col-md-12">
                        @csrf
                        <div class="fomr-group">
                            <h5>Evento</h5>
                            <input type="text" value="{{$tipo}}" class="form-control" readonly name="evento">
                        </div>
                        <br>
                        <div class="fomr-group">
                            <h5>Titulo</h5>
                            <input type="text" class="form-control" name="titulo">
                        </div>
                        <br>
                        <div class="fomr-group">
                            <h5>Descripcion del Evento</h5>
                            <textarea type="text" rows="3" maxlength="30" style="resize:none;" class="form-control" name="descripcion"></textarea>
                        </div>
                        <br>
                        <div class="fomr-group">
                            <h5>Hora</h5>
                            <input type="text" value="{{$hora}}" class="form-control" readonly name="hora">
                        </div>
                        <br>
                        <div class="fomr-group">
                            <h5>Fecha</h5>
                            <input type="date" value="{{$fecha}}" class="form-control" readonly name="fecha">
                        </div>
                        <br>
                        <input type="submit" class="btn btn-success w-25" value="Finalizar">
                    </div>
                </form>
                <br>
            </div>
        </div>
</main>
@endsection