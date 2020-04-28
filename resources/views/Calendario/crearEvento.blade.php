@extends('base')

@section('main')
<main role="main" class=" col-md-10 ml-sm-auto col-lg-10">

    <div class="container">
        <p class="lead">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif


            <div class="col-md-12">
                <form action="{{ asset('/crearEvento') }}" method="post">
                    @csrf                   
                    <div class="fomr-group">
                        <label>Titulo</label>
                        <input type="text" class="form-control" name="titulo">
                    </div>
                    <div class="fomr-group">
                        <label>Descripcion del Evento</label>
                        <input type="text" class="form-control" name="descripcion">
                    </div>
                    <div class="fomr-group">
                        <label>Hora</label>
                        <input type="text" value="{{$hora}}" class="form-control" name="hora">
                    </div>
                    <div class="fomr-group">
                        <label>Fecha</label>
                        <input type="date" value="{{$fecha}}" class="form-control" name="fecha">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-info" value="Guardar">                
                    <input type="submit"  class="btn btn-success" onclick="history.back()" name="Volver" value="Volver ">
                </form>
            </div>
    </div>
</main>

@endsection