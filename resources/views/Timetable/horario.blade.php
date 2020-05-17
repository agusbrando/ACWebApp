@extends('base')

@section('main')



<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <link href="{{ asset('css/timetable.css') }}" rel="stylesheet" type="text/css" />
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <a href="/horarios" class="my-auto mx-2 h5"><i class="fas fa-arrow-left"></i></a>
            <h3>Horario {{$timetable->name}}</h3>
            <div class="row">

                <td>

                    <form action="{{ route('horarios.edit', $timetable->id)}}" method="get">
                        @csrf

                        <button class="btn btn-outline-primary  float-right m-1" type="submit">Editar</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('horarios.destroy', $timetable->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger  float-right m-1" type="submit">Borrar</button>
                    </form>
                </td>

            </div>
        </div>
        <div class="card-body row no-gutters">

            <table class="tabla">
                <tr>
                    <th></th>
                    <th>LUNES</th>
                    <th>MARTES</th>
                    <th>MIÉRCOLES</th>
                    <th>JUEVES</th>
                    <th>VIERNES</th>
                </tr>
                <tr>
               
                   
                    <td class="td">8:30-9:25</td>
                   @foreach($horas as $hora)
                        @if($hora->time_start=='8:30')
                        <td>{{$hora->subject}}</td>
                        @endif
                   @endforeach

                </tr>
                <tr>

                    <td class="td">9:25-10:20</td>

                </tr>
                <tr>

                    <td class="td">10:20-10:40</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                </tr>
                <tr>

                    <td class="td">10:40-11:35</td>

                </tr>
                <tr>

                    <td class="td">11:35-12:25</td>

                </tr>
                <tr>

                    <td class="td">12:25-12:40</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                </tr>
                <tr>

                    <td class="td">12:40-13:35</td>

                </tr>
                <tr>

                    <td class="td">13:35-14:30</td>

                </tr>
            </table>
        </div>
        <div class=" card-footer col-12">



        </div>


</main>
@endsection