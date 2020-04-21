@extends('base')

@section('main')

<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h1 class="display-4">Crear Objeto </h1>
    <hr>
    <form method="post" action="{{ route('items.store') }}">   
        <!-- Proteccion contra consultas no deseadas -->
        {{ csrf_field() }} 

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombreItem" name="name" aria-describedby="nombreHelp" placeholder="Nombre del objeto">
        </div>
        <div class="form-group">
            <label for="nombre">Fecha de Compra</label>
            <input type="date" id="date_pucharse" name="date_pucharse" placeholder="- Seleccionar fecha -" class="form-control">
        </div>
        <div class="form-group">
            <label for="formControlSelect1">¿En que Aula va a estar?</label>
            <select class="form-control" id="classroom_id" name="classroom_id">
                <option disabled selected>Selecciona un Aula</option>
                <!--Hace la funcion de un placeholder-->
                @foreach($classrooms as $classroom)
                <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="formControlSelect1">Tipo de objeto</label>
            <select class="form-control" id="type_id" name="type_id">
                <option disabled selected>Selecciona un tipo</option>
                <!--Hace la funcion de un placeholder-->
                @foreach($types as $type)
                <option value="{{$classroom->id}}">{{$type->name}}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
            <a class="btn btn-primary" href="/items" role="button">Volver</a>
            <button type="submit" class="btn btn-primary">Crear</button>
        </div>
    </form>

</main>
@endsection