@extends('base')

@section('login')
@include('auth.login')
@endsection
@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <div class="d-flex flex-row">
                <a href="/courses" class="my-auto mx-1 h5"><i class="fas fa-arrow-left"></i></a>
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
                            Aquí iran las asignaturas
                        </div>
                        <div class="tab-pane fade" id="nav-items" role="tabpanel" aria-labelledby="nav-items-tab">
                            @foreach($yearUnions as $yearUnion)
                                <h3>{{$yearUnion->evaluation->name}}</h3>
                                <table id='mytable' class="table table-striped table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Evaluación</th>
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
                                                <td>{{$yearUnion->evaluation->name}}</td>

                                                <td class="botones d-flex flex-wrap border border-bottom-0 border-left-0 border-right-0 ">
                                                    @foreach($yearUnionUser->items as $item)
                                                        <button class="btn btn-outline-primary m-1 " type="submit">{{$item->number." ".$item->name}}</button>
                                                    @endforeach
                                                </td>
                                                
                                                <td>
                                                    <div class="form-group ">
                                                        <form class="botones d-flex flex-wrap" method="get" action="#">
                                                            @csrf
                                                            @method('GET')
                                                            <label for="formControlSelect1">Items</label>

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
                                                        

                                                            <button class="btn btn-outline-info mt-1" role="button">Asignar Item</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        </form>

                                        @endforeach
                                    </tbody>
                                </table>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </form>
    </div>
</main>

@endsection