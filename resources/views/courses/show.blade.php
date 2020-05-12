@extends('base')

@section('login')
@include('auth.login')
@endsection
@section('main')

<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <div class="d-flex flex-row">
                <a href="/courses" class="my-auto mx-1 h5"><i class="fas fa-arrow-left"></i></a>
                <h3>Curso {{$yearUnion->course->name}}</h3>
            </div>
            
        </div>
        <div class="card-body row no-gutters">
            <div class="col-sm-12">

                <div class="  bd-highlight mb-3">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">General</a>
                            <a class="nav-item nav-link" id="nav-asignaturas-tab" data-toggle="tab" href="#nav-asignaturas" role="tab" aria-controls="nav-asignaturas" aria-selected="false">Asignaturas</a>
                            <a class="nav-item nav-link" id="nav-items-tab" data-toggle="tab" href="#nav-items" role="tab" aria-controls="nav-items" aria-selected="false">Items</a>
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active table-responsive" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
                            Aquí irá la programacion del curso
                        </div>
                        <div class="tab-pane fade" id="nav-asignaturas" role="tabpanel" aria-labelledby="nav-asignaturas-tab">
                            Aquí iran las asignaturas
                        </div>
                        <div class="tab-pane fade" id="nav-items" role="tabpanel" aria-labelledby="nav-items-tab">
                            <table id='mytable' class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Número</th>
                                        <th>Nombre</th>
                                        <th>Responsables</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $item)
                                    <form method="get" action=""> 
                                        @csrf
                                        @method('GET')
                                        <tr>
                                            
                                            <td>{{$item->number}}</td>
                                            <td>{{$item->name}}</td>
                                        

                                            <td class="botones d-flex flex-wrap">
                                                @foreach($users as $user)
                                                <!-- Esto llevará al usuario -->
                                                
                                                    <button class="btn btn-outline-primary m-1" type="submit">{{$user->first_name}}</button>
                                                
                                                @endforeach
                                                
                                            </td>
                                        </tr>
                                    </form>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </form>
    </div>
</main>

@endsection