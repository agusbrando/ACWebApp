@extends('base')

@section('main')

<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h1 class="display-4">Crear Objeto </h1>
    <form>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombreItem" name="nombreItem" aria-describedby="nombreHelp" placeholder="Nombre del objeto">
        </div>
        <div class="form-group">
            <label for="nombre">Fecha de Compra</label>
            <input type="date" id="datepickerItem" name="fechaCompra" placeholder="- Seleccionar fecha -" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">¿En que Aula va a estar?</label>
            <select class="form-control" id="exampleFormControlSelect1" name="nombreAula">
                <option disabled selected>Selecciona un Aula</option>
                <!--Hace la funcion de un placeholder-->
                @foreach($classrooms as $classroom)
                <option>{{$classroom->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Tipo de objeto</label>
            <select class="form-control" id="exampleFormControlSelect1" name="tipoItem">
                <option disabled selected>Selecciona un tipo</option>
                <!--Hace la funcion de un placeholder-->
                @foreach($types as $type)
                <option>{{$type->name}}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
            <button type="button" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </form>

</main>
@endsection