@extends('base')

@section('login')
@include('auth.login')
@endsection
@section('main')

<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Material del Aula</h3>

            <div>
                <a class="btn btn-outline-info" href="/items/create" role="button">Añadir Material</a>

            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-sm-12">
                <form method="post" action="{{ url('items/filter') }}">

                    @csrf

                    <div class="form-group float-left mr-3 ">
                        <label for="formControlSelect1">Aulas</label>
                        <select class="form-control " id="classroom_id" name="idClass">
                            <option value="" selected>Todas</option>
                            <!--Hace la funcion de un placeholder-->
                            @foreach($classrooms as $classroom)
                            <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group float-left mr-3">
                        <label for="formControlSelect1">Tipo</label>
                        <select class="form-control" id="type_id" name="idType">
                            <option value="" selected>Todos</option>
                            <!--Hace la funcion de un placeholder-->
                            @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group float-left mr-3">
                        <label for="formControlSelect1">Estado</label>
                        <select class="form-control" id="state_id" name="idState">
                            <option value="" selected>Todos</option>
                            <!--Hace la funcion de un placeholder-->
                            @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex flex-row botones">
                        <button class="btn btn-primary " type="submit">Filtrar</button>
                    </div>

                </form>
                <br>
                <hr>
                <div class="d-flex flex-row bd-highlight mb-3">
                    <div class="container-fluid">
                        <table id='mytable' class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Número</th>
                                    <th>Nombre</th>
                                    <th>Fecha Compra</th>
                                    <th>Id clase</th>
                                    <th>Estado</th>
                                    <th>Tipo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->number}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->date_pucharse}}</td>
                                    @foreach($classrooms as $classroom)
                                    @if($item->classroom_id == $classroom->id)
                                    <td>{{$classroom->name}}</td>
                                    @endif
                                    @endforeach
                                    @foreach($states as $state)
                                    @if($item->state_id == $state->id)
                                    <td>{{$state->name}}</td>
                                    @endif
                                    @endforeach
                                    @foreach($types as $type)
                                    @if($item->type_id == $type->id)
                                    <td>{{$type->name}}</td>
                                    @endif
                                    @endforeach

                                    <td class="botones">
                                        <form method="get" action="{{ route('items.show', $item->id)}}">
                                            @csrf
                                            @method('GET')
                                            <button class="btn btn-primary" type="submit">Ver</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
        <div class=" card-footer col-12">
            <a class="btn btn-outline-warning float-right" href="#" aria-disabled="true">Cancelar</a>
        </div>
        </form>
    </div>
</main>

@endsection