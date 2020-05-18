@extends('base')

@section('login')
@include('auth.login')
@endsection
@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <link href="{{ asset('css/courses.css') }}" rel="stylesheet" type="text/css" />
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <div class="d-flex flex-row">
                <a href="{{ url()->previous() }}" class="my-auto mx-1 h5"><i class="fas fa-arrow-left"></i></a>
                <h3>Curso </h3>

            </div>
            <div class="d-flex flex-row-reverse">
                <form method="post" action="">
                    @csrf
                    <button class="btn btn-outline-danger ml-2" type="submit">Eliminar</button>
                </form>
                <form method="post" action="">
                    @csrf
                    <button class="btn btn-outline-primary ml-2" type="submit">Editar Curso</button>
                </form>


            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-sm-12">

                <div class="  bd-highlight mb-3">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link " id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="false">General</a>
                            <a class="nav-item nav-link" id="nav-asignaturas-tab" data-toggle="tab" href="#nav-asignaturas" role="tab" aria-controls="nav-asignaturas" aria-selected="false">Asignaturas</a>
                            <a class="nav-item nav-link active" id="nav-items-tab" data-toggle="tab" href="#nav-items" role="tab" aria-controls="nav-items" aria-selected="true">Responsables</a>
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade  table-responsive" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
                            Aquí irá la programacion del curso
                        </div>
                        <div class="tab-pane fade" id="nav-asignaturas" role="tabpanel" aria-labelledby="nav-asignaturas-tab">
                            Aquí iran las asignaturas
                        </div>
                        <div class="tab-pane fade show active" id="nav-items" role="tabpanel" aria-labelledby="nav-items-tab">

                            <form class="d-flex flex-column bd-highlight mb-3 ml-2" method="post" action="">
                                @csrf
                                <label for="formControlSelect1">Aulas</label>
                                <div class="d-flex flex-row bd-highlight mb-3">

                                    <div class="d-flex flex-row ">
                                        <select class="form-control " id="classroom_id" name="idClass">
                                            <option value="" selected>Todas</option>
                                            <!--Hace la funcion de un placeholder-->
                                            @foreach($classrooms as $classroom)
                                            <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="d-flex flex-row ml-3 botones">
                                            <button class="btn btn-outline-primary " type="submit">Filtrar</button>
                                        </div>
                                    </div>
                                </div>

                            </form>


                            <div class="divShowCoursesContent" id="accordion">
                                @foreach($yearUnions as $yearUnion)

                                <div class="card">
                                    <div class="card-header list-group-item d-flex justify-content-between align-items-center m-0" id="heading{{$yearUnion->evaluation->name}}" data-toggle="collapse" data-target="#collapse{{$yearUnion->evaluation->name}}" aria-expanded="false" aria-controls="collapse{{$yearUnion->evaluation->name}}">
                                        <h5 class="mb-0">
                                            <button class="btn collapsed">
                                                {{$yearUnion->evaluation->name}}
                                            </button>
                                        </h5>
                                        <span class="badge badge-primary badge-pill"> {{$yearUnion->yearUnionUsers->count()}}</span>
                                    </div>

                                    <div id="collapse{{$yearUnion->evaluation->name}}" class="collapse" aria-labelledby="heading{{$yearUnion->evaluation->name}}" data-parent="#accordion">
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <div class="card">


                                                    <table id='mytable' class="table w-100">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Apellido</th>
                                                                <th>Items</th>
                                                                <th>Responsabilizar Item</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach($yearUnion->yearUnionUsers as $yearUnionUser)


                                                            <tr>

                                                                <td>{{$yearUnionUser->user->first_name}}</td>
                                                                <td>{{$yearUnionUser->user->last_name}}</td>

                                                                <td class="botones d-flex flex-wrap border border-bottom-0 border-left-0 border-right-0 ">


                                                                    @foreach($yearUnionUser->items as $item)
                                                                    <a class="btn btn-outline-primary m-1 " href="{{ route('courses.showItem', $item->id)}}" type="button ">{{"Nº ".$item->number." - ".$item->name}}</a>
                                                                    @endforeach

                                                                </td>

                                                                <td>
                                                                    <div class="form-group ">
                                                                        <form class="botones d-flex flex-wrap" method="get" action="#">
                                                                            @csrf
                                                                            @method('GET')

                                                                            <select class="form-control " id="type_id" name="type_id">
                                                                                <option disabled selected>Selecciona un Item</option>
                                                                                <!--Hace la funcion de un placeholder-->
                                                                                @foreach($yearUnionUser->items as $item1)

                                                                                @foreach($items as $item2)
                                                                                @if($item2->id == $item->id)
                                                                                <option selected value="{{$item2->id}}">{{$item2->name}}</option>
                                                                                @else
                                                                                <option value="{{$item2->id}}">{{$item2->name}}</option>

                                                                                @endif

                                                                                @endforeach
                                                                                @endforeach
                                                                            </select>


                                                                            <button class="btn btn-outline-info mt-2" role="button">Asignar Item</button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>


                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        </form>
    </div>
</main>

@endsection