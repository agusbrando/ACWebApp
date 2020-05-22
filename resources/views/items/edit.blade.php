
@extends('base')

@section('login')
@include('auth.login')
@endsection
@section('main')

<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <form method="get" >    
                <div class="d-flex flex-row">
                    @csrf
                    @method('GET')
                    <a href="{{ url()->previous() }}" class="my-1 mx-1 h5"><i class="fas fa-arrow-left"></i></a>
                    
                    <h3>Editar Item</h3>
                </div>
            </form>
            <div class="d-flex flex-row-reverse">
                <form  method="post" action="{{ route('items.destroy', $itemId)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger ml-2" type="submit">Eliminar</button>
                </form>
                
            </div>
            
        </div>
        <div class="card-body row no-gutters">
            <div class="col-sm-12">

                <div class="container">


                    <form method="post" action="{{ route('items.updateItem', $itemId) }}">
                        <!-- Proteccion contra consultas no deseadas -->
                        @method('PATCH')
                        @csrf
                        
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombreItem" name="name" aria-describedby="nombreHelp" value="{{$item->name}}" placeholder="Cambia el nombre">
                        </div>
                        <div class="form-group">
                            <label for="number">Number</label>
                            <input type="text" class="form-control" id="numberItem" name="number" aria-describedby="nombreHelp" value="{{$item->number}}" placeholder="Numero del objeto">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Fecha de Compra</label>
                            <input type="date" id="date_pucharse" name="date_pucharse" value="{{date($item->date_pucharse)}}" placeholder="- Seleccionar fecha -" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="formControlSelect1">¿En que Aula va a estar?</label>
                            <select class="form-control" id="classroom_id" name="classroom_id">
                                <option disabled selected>Selecciona un Aula</option>
                                <!--Hace la funcion de un placeholder-->
                                @foreach($classrooms as $classroom)
                                @if($classroom->id == $item->classroom_id)
                                <option selected value="{{$classroom->id}}">{{$classroom->name}}</option>
                                @else
                                <option value="{{$classroom->id}}">{{$classroom->name}}</option>

                                @endif

                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formControlSelect1">Estado del objeto</label>
                            <select class="form-control" id="state_id" name="state_id">
                                <option disable>Selecciona un estado</option>
                                <!--Hace la funcion de un placeholder-->
                                @foreach($states as $state)
                                @if($state->id == $item->state_id)
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
                                <option disabled selected>Selecciona un Aula</option>
                                <!--Hace la funcion de un placeholder-->
                                @foreach($types as $type)
                                    @if($type->id == $item->type_id)
                                        <option selected value="{{$type->id}}">{{$type->name}}</option>
                                    @else
                                        <option value="{{$type->id}}">{{$type->name}}</option>

                                    @endif

                                @endforeach

                            </select>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Modificar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class=" card-footer col-12">
            
                <a class="btn btn-outline-warning float-right" href="{{ route('items.show', $item->id)}}" aria-disabled="true">Cancelar</a>
            </div>
            </form>
        </div>
</main>

@endsection