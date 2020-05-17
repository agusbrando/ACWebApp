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
            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-sm-12">

                <div class="  bd-highlight mb-3">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">General</a>
                            <a class="nav-item nav-link" id="nav-asignaturas-tab" data-toggle="tab" href="#nav-asignaturas" role="tab" aria-controls="nav-asignaturas" aria-selected="false">Asignaturas</a>
                            <a class="nav-item nav-link" id="nav-items-tab" data-toggle="tab" href="#nav-items" role="tab" aria-controls="nav-items" aria-selected="false">Responsables</a>
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active table-responsive" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
                            Aquí irá la programacion del curso
                        </div>
                        <div class="tab-pane fade" id="nav-asignaturas" role="tabpanel" aria-labelledby="nav-asignaturas-tab">
                            <div class="card-body row no-gutters table-responsive">
                                <table class="table col-12 ">
                                    <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach($subjects as $subject)
                                    <tbody>
                                        <tr>
                                            <td>{{$subject->name }}</td>
                                            <td class="botones">
                                                <a class="btn btn-outline-primary" href="{{ route('subjects.show',$subject->id)}}">Ver</a>
                                                <form action="{{ route('subjects.evaluations',  ['subject' => $subject->id, 'year' => $yearId, 'course' => $courseId ]) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm mr-2">Evaluaciones</button>
                                                </form>
                                                <a href="{{ route('subjects.evaluations',  ['subject' => $subject->id, 'year' => $yearId, 'course' => $courseId ]) }}" class="btn btn-primary btn-sm mr-2">Evaluaciones</a>
                                                <a href="#" class="btn btn-primary btn-sm">Programacion</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-items" role="tabpanel" aria-labelledby="nav-items-tab">

                            <form class="d-flex flex-column bd-highlight mb-3 ml-2" method="post" action="{{ route('courses.filter', array($courseId, $yearId))}}">
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

                                                            <form method="get" action="">
                                                                @csrf
                                                                @method('GET')
                                                                <tr>

                                                                    <td>{{$yearUnionUser->user->first_name}}</td>
                                                                    <td>{{$yearUnionUser->user->last_name}}</td>

                                                                    <td class="botones d-flex flex-wrap border border-bottom-0 border-left-0 border-right-0 ">
                                                                        @foreach($yearUnionUser->items as $item)
                                                                        <form method="get" action="{{ route('courses.showItem', $item->id)}}">
                                                                            @csrf
                                                                            @method('GET')
                                                                            <button class="btn btn-outline-primary m-1 " type="submit">{{"Nº ".$item->number." - ".$item->name}}</button>
                                                                        </form>

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
                                                                                    @foreach($items as $item)
                                                                                    @if($item->id == $item->item_id)
                                                                                    <option selected value="{{$item->id}}">{{$item->name}}</option>
                                                                                    @else
                                                                                    <option value="{{$item->id}}">{{$item->name}}</option>

                                                                                    @endif

                                                                                    @endforeach

                                                                                </select>


                                                                                <button class="btn btn-outline-info mt-2" role="button">Asignar Item</button>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </form>

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