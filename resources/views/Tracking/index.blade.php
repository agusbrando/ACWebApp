@extends('base')

@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10">

    <link href="{{ asset('css/seguimiento.css') }}" rel="stylesheet" type="text/css" />

    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Firmas de docente</h3>
            <div>
            @if(in_array('Crear_trackings', Session::get('user_permissions')))
                <a href="{{ route('seguimiento.create')}}" class="btn btn-outline-primary"> Añadir firma diaria </a>
            @endif
            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class=" col-12">


                <div class="filtro w-100">
                    <form method="get" action="{{ route('seguimiento.filtrar') }}">

                        @csrf
                        <div class="form-group w-100">
                            <label for="formControlSelect1"></label>
                            <div class="card-deck ">
                                <div class="card text-white w-25 bg-info mb-2" style="max-width: 18rem;">
                                    <div class="card-header w-100 bg-dark">Filtrar por fecha única o inicial::</div>
                                    <div class="card-body w-100 cabezeraTabla">
                                        <div>
                                            <h5 class="card-title"></h5>
                                            <input type="date" class="rounded form-control" name="fecha">
                                        </div>

                                    </div>
                                </div>
                                <div class="card text-white w-25 bg-info mb-2" style="max-width: 18rem;">
                                    <div class="card-header w-100 bg-dark">Filtrar por mes:</div>
                                    <div class="card-body w-100 cabezeraTabla">
                                        <div>
                                            <h5 class="card-title"></h5>
                                            <input type="date" class="rounded form-control" name="fecha_fin">
                                        </div>

                                    </div>
                                </div>
                                <div class="card text-white w-25 bg-info mb-2" style="max-width: 18rem;">
                                    <div class="card-header w-100 bg-dark">Filtrar por mes:</div>
                                    <div class="card-body w-100 cabezeraTabla">
                                        <div>
                                            <h5 class="card-title"></h5>
                                            <input type="month" class="rounded form-control" name="mes">
                                        </div>

                                    </div>
                                </div>
                                <div class="card text-white w-25 bg-info mb-2" style="max-width: 18rem;">
                                    <div class="card-header w-100 bg-dark">Filtrar por año:</div>
                                    <div class="card-body w-100 cabezeraTabla">
                                        <div>
                                            <h5 class="card-title"></h5>
                                            <input class="quantity rounded form-control" type="number" name="anyo">
                                        </div>

                                    </div>
                                </div>
                                @if(in_array('Listar_tracking', Session::get('user_permissions')))
                                <div><input type="submit" class="btn btn-success boton class20" value="Filtrar"></div>
                                @endif
                            </div>

                        </div>




                    </form>

                </div>


                <table class="table-striped table col-12 ">
                    <thead class="bg-dark col-12 cabezeraTabla">
                        <tr>
                            <td>Fecha Firma</td>
                            <td>Hora Inicio</td>
                            <td>Hora Final</td>
                            <td>Suma Horas</td>
                            <td>Firma</td>
                        </tr>
                    </thead>
                    <form class="float-right" action="{{ route('seguimiento.print')}}" method="POST">
                        @csrf
                        @method('POST')

                        <tbody>

                            @foreach($trackings as $tracking)

                            <input type="hidden" value={{$tracking}} name="trackings[]">

                            <tr>
                                <td>{{$tracking->date_signature}}</td>
                                <td>{{$tracking->time_start}}</td>
                                <td>{{$tracking->time_end}}</td>
                                <td>{{$tracking->num_hours}}</td>
                                <td><img class="border" src="{{url($tracking->signature)}}" />
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                        @if($count == 0)
                        <tbody>
                            <tr>
                                <td colspan="5" class="center">No hay tracking, añade uno para mostrarlo</td>
                            </tr>
                        </tbody>
                        @endif
                        <thead class="cabezeraTabla">
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Suma Horas Total:</td>
                                <td>{{$horas}}</td>
                                <td></td>
                            </tr>
                        </thead>
                </table>

            </div>

        </div>
        <div class=" card-footer col-12">




        @if(in_array('Listar_trackings', Session::get('user_permissions')))
            <button type="submit" class="btn btn-outline-danger ml-1 float-right">Descargar PDF <i class="fas fa-file-pdf"></i></button>
            </form>
            <form class="float-right" action="{{ route('seguimiento.excel')}}" method="POST">
                @csrf
                @method('POST')


                @foreach($trackings as $tracking)
                <input type="hidden" value={{$tracking}} name="trackings[]">
                @endforeach

                <button type="submit" class="btn btn-outline-success ml-1 float-right">Descargar excel <i class="fas fa-file-excel"></i></button>
            </form>

            <input type="hidden" value={{$trackings}}>
            @endif
        </div>


    </div>

</main>
@endsection
