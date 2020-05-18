@extends('base')

@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10">

    <link href="{{ asset('css/seguimiento.css') }}" rel="stylesheet" type="text/css" />

    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Firmas de docente</h3>
            <div>
                <a href="{{ route('seguimiento.create')}}" class="btn btn-outline-primary"> Añadir firma diaria </a>


            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class=" col-12">


                <div class="filtro w-100">
                    <form method="get" action="{{ route('seguimiento.filtrar') }}">

                        @csrf

                        <table class="tabla w-100">

                            <tr>
                                <td class="class20">Filtrar por fecha inicial:</td>
                                <td class="class20">Filtrar por fecha final:</td>
                                <td class="class20">Filtrar por mes:</td>
                                <td class="class20">Filtrar por año:</td>
                                <td class="class20"></td>
                            </tr>
                            <tr>
                                <td class="class20"><input type="date" class="rounded class20" name="fecha"></td>
                                <td class="class20"><input type="date" class="rounded class20" name="fecha_fin"></td>
                                <td class="class20"><input type="month" class="rounded class20" name="mes"></td>
                                <td class="class20"><input class="quantity rounded class20" type="number" name="anyo"></td>
                                <td class="class20"><input type="submit" class="btn btn-success boton class20" value="Filtrar"></td>
                            </tr>
                        </table>

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





            <button type="submit" class="btn btn-outline-danger ml-1 float-right">Descargar PDF</button>
            </form>
            <form class="float-right" action="{{ route('seguimiento.excel')}}" method="POST">
                @csrf
                @method('POST')


                @foreach($trackings as $tracking)
                <input type="hidden" value={{$tracking}} name="trackings[]">
                @endforeach

                <button type="submit" class="btn btn-outline-success ml-1 float-right"> Descargar Excel </button>
            </form>

            <input type="hidden" value={{$trackings}}>
        </div>


    </div>

</main>
@endsection