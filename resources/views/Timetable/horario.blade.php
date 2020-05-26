@extends('base')

@section('main')



<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <link href="{{ asset('css/timetable.css') }}" rel="stylesheet" type="text/css" />
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <a href="{{ url()->previous() }}" class="my-auto mx-2 h5"><i class="fas fa-arrow-left"></i></a>
            <h3>Horario {{$timetable->name}}</h3>
            @if(Session::get('user_role')!= 'Alumno'&&'User'&&'Unverified')
            <div class="row">
                <td>

                     <a href="{{ route('session', $timetable->id)}}" class="btn btn-outline-primary float-right m-1 " type="button">
                        Añadir Horario
                    </a>

                    <form action="{{ route('horarios.edit', $timetable->id)}}" method="get">
                        @csrf
                        <button class="btn btn-outline-primary  float-right m-1" type="submit">Editar</button>
                    </form>

                    <form action="{{ route('horarios.destroy', $timetable->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger  float-right m-1" type="submit">Borrar</button>
                    </form>
                </td>


            </div>
            @endif
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

                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='8:30' && $session->day==1)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario" style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='8:30' && $session->day==2)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='8:30' && $session->day==3)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='8:30' && $session->day==4)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='8:30' && $session->day==5)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>


                </tr>
                <tr>

                    <td class="td">9:25-10:20</td>
                    <td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='9:25' && $session->day==1)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='9:25' && $session->day==2)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='9:25' && $session->day==3)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='9:25' && $session->day==4)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='9:25' && $session->day==5)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
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
                    <td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='10:40' && $session->day==1)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='10:40' && $session->day==2)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='10:40' && $session->day==3)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='10:40' && $session->day==4)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='10:40' && $session->day==5)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                </tr>
                <tr>

                    <td class="td">11:35-12:25</td>
                    <td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='11:35' && $session->day==1)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='11:35' && $session->day==2)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='11:35' && $session->day==3)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='11:35' && $session->day==4)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='11:35' && $session->day==5)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
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
                    <td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='12:40' && $session->day==1)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='12:40' && $session->day==2)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                     @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='12:40' && $session->day==3)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='12:40' && $session->day==4)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='12:40' && $session->day==5)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                </tr>
                <tr>

                    <td class="td">13:35-14:30</td>
                    <td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='13:35' && $session->day==1)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='13:35' && $session->day==2)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='13:35' && $session->day==3)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='13:35' && $session->day==4)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='13:35' && $session->day==5)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
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
                    <td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:00' && $session->day==1)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    
                    
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:00' && $session->day==2)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:00' && $session->day==3)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:00' && $session->day==4)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:00' && $session->day==5)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                </tr>
                <tr>

                    <td class="td">15:55-16:50</td>
                    <td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:55' && $session->day==1)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:55' && $session->day==2)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:55' && $session->day==3)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:55' && $session->day==4)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a>
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:55' && $session->day==5)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
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
                    <td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='17:10' && $session->day==1)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='17:10' && $session->day==2)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='17:10' && $session->day==3)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='17:10' && $session->day==4)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='17:10' && $session->day==5)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                </tr>
                <tr>

                    <td class="td">18:05-19:00</td>
                    <td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='18:05' && $session->day==1)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='18:05' && $session->day==2)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='18:05' && $session->day==3)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='18:05' && $session->day==4)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='18:05' && $session->day==5)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                </tr>
                <tr class="descanso">

                    <td class="td">19:00-19:15</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                    <td>DESCANSO</td>
                </tr>
                <tr>

                    <td class="td">19:15-20:05</td>
                    <td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='19:15' && $session->day==1)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='19:15' && $session->day==2)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='19:15' && $session->day==3)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='19:15' && $session->day==4)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='19:15' && $session->day==5)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                </tr>
                <tr>

                    <td class="td">20:05-21:00</td>
                    <td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='20:05' && $session->day==1)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='20:05' && $session->day==2)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='20:05' && $session->day==3)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='20:05' && $session->day==4)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='20:05' && $session->day==5)
                    <a href="{{route('session.show', ['session_id'=>$session->id ,'timetable_id'=>$timetable->id])}}"> 
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     </a> 
                       @endif
                    @endforeach
                    </td>
                </tr>
            </table>
        </div>
        <div class=" card-footer col-12">

        <form class="float-right" action="{{ route('horario.print',$timetable->id)}}" method="POST">
                @csrf
                @method('POST')

                <button type="submit" class="btn btn-outline-danger ml-1 float-right"><i class="fas fa-file-pdf"></i></button>
            </form>

        </div>


</main>
@endsection