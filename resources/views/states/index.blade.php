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
                <a class="btn btn-outline-info" href="#" role="button">Añadir Estado</a>
            </div>
        </div>
        <div class="card-body row no-gutters">


            <div class="col-sm-12">
                <h1 class="display-4">Estados de un Objeto</h1>

                <!-- <div class="d-flex flex-row botones">
                    <a class="btn btn-primary" href="/states/create" role="button">Añadir Estado</a>
                </div> -->
                <div class="add-form">
                    <!-- <h1 class="display-4">Crear Estado </h1>
                    <hr> -->
                    <form method="post" action="{{ route('items.store') }}">
                        <!-- Proteccion contra consultas no deseadas -->
                        @csrf

                        <div class="form-group">
                            <label for="nombre">Crear Estado</label>
                            <input type="text" class="form-control" id="nombreItem" name="name" aria-describedby="nombreHelp" placeholder="Nombre del estado">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>
                    </form>
                </div>
                <!-- Enlace al form create -->
                <br>
                <hr>
                
                <div class="d-flex flex-row ">
                    <div class="table-states container-fluid">
                        <table id='mytable' class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($states as $state)
                                <tr>
                                    <td>{{$state->id}}</td>
                                    <td>{{$state->name}}</td>


                                    <!-- <td class="botones">
                                    <form method="get" action="{{ route('states.show', $state->id)}}">
                                        @csrf
                                        @method('GET')
                                        <button class="btn btn-primary" type="submit">Ver</button>
                                    </form>
                                </td> -->
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