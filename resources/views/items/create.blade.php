@extends('base')
<<<<<<< HEAD

=======
@section('login')
@include('auth.login')
@endsection
>>>>>>> 2dfad48e0d29c3db12647e27e6bb6bda5e35890c
@section('main')

<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<<<<<<< HEAD
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
            <label for="formControlSelect1">Estado del objeto</label>
            <select class="form-control" id="state_id" name="state_id">
                <option  disable >Selecciona un estado</option>
                <!--Hace la funcion de un placeholder-->
                @foreach($states as $state)
                @if($state->id == 1)
                    <option selected value="{{$state->id}}">{{$state->name}}</option>
                @else
                    <option value="{{$state->id}}">{{$state->name}}</option>
                
                @endif
                
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="formControlSelect1">Tipo de objeto</label>
            <select class="form-control" id="type_id" name="type_id">
                <option disabled selected>Selecciona un tipo</option>
                <!--Hace la funcion de un placeholder-->
                @foreach($types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
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
=======
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <form method="get">
                <div class="d-flex flex-row">
                    @csrf
                    @method('GET')
                    <a href="{{ url()->previous() }}" class="my-1 mx-1 h5"><i class="fas fa-arrow-left"></i></a>

                    <h3>Crear Item</h3>
                </div>
            </form>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-sm-12">
                <div class="container">
                    <form method="post" action="{{ route('items.store') }}">
                        <!-- Proteccion contra consultas no deseadas -->
                        @csrf

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombreItem" name="name" aria-describedby="nombreHelp" placeholder="Nombre del objeto">
                        </div>
                        <div class="form-group">
                            <label for="number">Number</label>
                            <input type="text" class="form-control" id="numberItem" name="number" aria-describedby="nombreHelp" placeholder="Numero del objeto">
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
                            <label for="formControlSelect1">Estado del objeto</label>
                            <select class="form-control" id="state_id" name="state_id">
                                <option disable>Selecciona un estado</option>
                                <!--Hace la funcion de un placeholder-->
                                @foreach($states as $state)
                                @if($state->id == 1)
                                <option selected value="{{$state->id}}">{{$state->name}}</option>
                                @else
                                <option value="{{$state->id}}">{{$state->name}}</option>

                                @endif

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formControlSelect1">Tipo de objeto</label>
                            <select class="form-control" id="type_id" name="type_id">
                                <option disabled selected>Selecciona un tipo</option>
                                <!--Hace la funcion de un placeholder-->
                                @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->

                            <button type="submit" class="btn btn-outline-primary">Crear</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class=" card-footer w-100">
            <a class="btn btn-outline-warning float-right" href="/items" aria-disabled="true">Cancelar</a>
        </div>
</main>

>>>>>>> 2dfad48e0d29c3db12647e27e6bb6bda5e35890c
@endsection