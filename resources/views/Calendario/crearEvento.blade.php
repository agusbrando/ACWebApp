@extends('base')

@section('main')

<main role="main" class=" col-md-10 ml-sm-auto col-lg-10">
    <br>
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Calendario</h3>
            <div>
                <input type="submit" class="btn btn-outline-success" value="Guardar">
                <input type="submit" onclick="history.back()" class="btn btn-outline-info" name="Volver" value="Volver ">
            </div>
        </div>
        <div class="card-body row no-gutters">

            <div class="col-md-12">
                <form action="{{ asset('/crearEvento') }}" method="post">
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


                </form>

            </div>
        </div>

</main>

@endsection