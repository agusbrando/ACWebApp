@extends('base')

@section('main')
<main role="main" class=" col-md-10 ml-sm-auto col-lg-10">

<div class="space"></div>
  <p class="lead">
    <h1 class="display-4 pr-3">Calendario</h1>   
    <hr>
    <br>
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
                <form action="{{ asset('/editarEvento/update/'.$event->id) }}" method="get">
                    @csrf
                    <div class="fomr-group">
                        <h5>Título</h5>
                        <input type="text" value="{{$titulo}}" class="form-control" name="titulo">
                    </div>
                    <br>
                    <div class="fomr-group">
                        <h5>Descripción del Evento</h5>
                        <textarea type="text" rows="3" maxlength="30" style="resize:none;" class="form-control" name="descripcion">{{$descripcion}}</textarea>
                    </div>
                    <br>

                    <input type="submit" class="btn btn-success" value="Guardar">
                   
                    <input type="submit" class="btn btn-info" onclick="history.back()" name="Volver" value="Volver ">
                    
                </form>

                <a></a>

            </div>
    </div>
</main>

@endsection