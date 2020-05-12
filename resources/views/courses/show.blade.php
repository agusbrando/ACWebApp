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
            <div>
                <a class="btn btn-outline-info" href="/courses/create" role="button">Añadir Curso</a>

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
                                                <button class="btn btn-outline-primary" type="submit">Ver Responsables</button>
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
        </div>

        </form>
    </div>
</main>

@endsection