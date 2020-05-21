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
                    @foreach($sessions as $session)
                    @if($session->time_start=='8:30')
                    @if($session->day==1)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==2)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==3)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==4)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==5)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @endif
                    @endforeach

                </tr>
                <tr>

                    <td class="td">9:25-10:20</td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='9:25')
                    @if($session->day==1)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==2)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==3)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==4)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==5)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @endif


                    @endforeach
                </tr>
                <tr class="descanso">

                    <td class="td">10:20-10:40</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                </tr>
                <tr>

                    <td class="td">10:40-11:35</td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='10:40')
                    @if($session->day==1)
                    <td style="background-color:{{$session->subject->color}}"> 
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td >
                    @endif
                    @if($session->day==2)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td >
                    @endif
                    @if($session->day==3)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td >
                    @endif
                    @if($session->day==4)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td >
                    @endif
                    @if($session->day==5)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @endif


                    @endforeach
                </tr>
                <tr>

                    <td class="td">11:35-12:25</td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='11:35')
                    @if($session->day==1)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==2)
                    <td style="background-color:{{$session->subject->color}}"> 
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==3)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==4)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==5)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @endif


                    @endforeach
                </tr>
                <tr class="descanso">

                    <td class="td">12:25-12:40</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                </tr>
                <tr>

                    <td class="td">12:40-13:35</td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='12:40')
                    @if($session->day==1)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==2)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==3)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==4)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==5)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @endif


                    @endforeach
                </tr>
                <tr>

                    <td class="td">13:35-14:30</td>
                    @foreach($sessions as $session)

                    @if($session->time_start=='13:35')
                    @if($session->day==1)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==2)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==3)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==4)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==5)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @endif

                    @endforeach
                </tr>
                <tr class="descanso">

                    <td class="td">14:30-15:00</td>
                    <td>MEDIODIA</td>
                    <td>MEDIODIA</td>
                    <td>MEDIODIA</td>
                    <td>MEDIODIA</td>
                    <td>MEDIODIA</td>
                </tr>
                <tr>


                    <td class="td">15:00-15:55</td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:00')
                    @if($session->day==1)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==2)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==3)
                    <td style="background-color:{{$session->subject->color}}"> 
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==4)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==5)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @endif
                    @endforeach

                </tr>
                <tr>

                    <td class="td">15:55-16:50</td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:55')
                    @if($session->day==1)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==2)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==3)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==4)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==5)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @endif


                    @endforeach
                </tr>
                <tr class="descanso">

                    <td class="td">16:50-17:10</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                </tr>
                <tr>

                    <td class="td">17:10-18:05</td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='17:10')
                    @if($session->day==1)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==2)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==3)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==4)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==5)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @endif


                    @endforeach
                </tr>
                <tr>

                    <td class="td">18:05-19:05</td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='18:05')
                    @if($session->day==1)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==2)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==3)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==4)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==5)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @endif


                    @endforeach
                </tr>
                <tr class="descanso">

                    <td class="td">19:05-19:20</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                </tr>
                <tr>

                    <td class="td">19:10-20:05</td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='19:10')
                    @if($session->day==1)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==2)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==3)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==4)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==5)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @endif


                    @endforeach
                </tr>
                <tr>

                    <td class="td">20:05-21:00</td>
                    @foreach($sessions as $session)

                    @if($session->time_start=='20:05')
                    @if($session->day==1)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==2)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==3)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==4)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @if($session->day==5)
                    <td style="background-color:{{$session->subject->color}}">
                        {{$session->subject->abbreviation}}-{{$session->subject->name}}
                    </td>
                    @endif
                    @endif

                    @endforeach
                </tr>
            </table>
        </div>
        <div class=" card-footer col-12">



        </div>


</main>
@endsection