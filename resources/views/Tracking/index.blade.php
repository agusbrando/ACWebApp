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
                                <td class="class20">Filtrar por fecha:</td>
                                <td class="class20">Filtrar por semana:</td>
                                <td class="class20">Filtrar por mes:</td>
                                <td class="class20">Filtrar por año:</td>
                                <td class="class20"></td>
                            </tr>
                            <tr>
                                <td class="class20"><input type="date" class="rounded class20" name="fecha"></td>
                                <td class="class20"><input type="week" class="rounded class20" name="semana"></td>
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
                    <tbody>
                        @foreach($trackings as $tracking)
                        @if($tracking->user_id == $user->id)
                        <tr>
                            <td>{{$tracking->date_signature}}</td>
                            <td>{{$tracking->time_start}}</td>
                            <td>{{$tracking->time_end}}</td>
                            <td>{{$tracking->num_hours}}</td>
                            <td><img class="border" src="{{url($tracking->signature)}}"/></td>
                        </tr>
                        @endif
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
            
            <a class="btn btn-outline-success float-left "> Descargar Excel </a>
            <div class="row float-left padding"><input type="hidden" value={{$trackings}}></div>
            <form class="float-right" action="{{ route('print')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger ml-1 float-left" >Descargar PDF</button>
            </form>


        </div>
        </form>

    </div>

</main>
@endsection