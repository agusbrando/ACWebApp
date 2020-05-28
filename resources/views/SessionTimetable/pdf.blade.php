<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        h1 {
            text-align: center;
            text-transform: uppercase;
        }

        .contenido {
            font-size: 20px;
        }

        #primero {
            background-color: #ccc;
        }

        #segundo {
            color: #44a359;
        }

        #tercero {
            text-decoration: line-through;
        }
        .border{
            border: 1px solid black;
        }
        thead{
            color:white;
            background-color: #2F2F2F;
            text-align: center;
            
        }
        td{
           width: 150px;
           text-align: center;
           border:2px solid #2F2F2F;
        }
        
        
        
    </style>
    
</head>

<body>

    <hr>
    <div class="contenido">
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
                    
                       <div class="tdhorario" style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='8:30' && $session->day==2)
                   
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='8:30' && $session->day==3)
                     
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='8:30' && $session->day==4)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='8:30' && $session->day==5)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>


                </tr>
                <tr>

                    <td class="td">9:25-10:20</td>
                    <td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='9:25' && $session->day==1)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='9:25' && $session->day==2)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='9:25' && $session->day==3)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='9:25' && $session->day==4)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='9:25' && $session->day==5)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
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
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='10:40' && $session->day==2)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='10:40' && $session->day==3)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='10:40' && $session->day==4)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='10:40' && $session->day==5)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                </tr>
                <tr>

                    <td class="td">11:35-12:25</td>
                    <td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='11:35' && $session->day==1)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='11:35' && $session->day==2)
                   
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='11:35' && $session->day==3)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='11:35' && $session->day==4)
                     
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='11:35' && $session->day==5)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
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
                   
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='12:40' && $session->day==2)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                     @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='12:40' && $session->day==3)
                   
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                   
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='12:40' && $session->day==4)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='12:40' && $session->day==5)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                </tr>
                <tr>

                    <td class="td">13:35-14:30</td>
                    <td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='13:35' && $session->day==1)
                   
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='13:35' && $session->day==2)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                   
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='13:35' && $session->day==3)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='13:35' && $session->day==4)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='13:35' && $session->day==5)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
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
                   
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:00' && $session->day==2)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:00' && $session->day==3)
                  
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:00' && $session->day==4)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:00' && $session->day==5)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
                       @endif
                    @endforeach
                    </td>
                </tr>
                <tr>

                    <td class="td">15:55-16:50</td>
                    <td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:55' && $session->day==1)
                   
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:55' && $session->day==2)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:55' && $session->day==3)
                     
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:55' && $session->day==4)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='15:55' && $session->day==5)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
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
                     
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='17:10' && $session->day==2)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='17:10' && $session->day==3)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='17:10' && $session->day==4)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='17:10' && $session->day==5)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
                       @endif
                    @endforeach
                    </td>
                </tr>
                <tr>

                    <td class="td">18:05-19:00</td>
                    <td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='18:05' && $session->day==1)
                   
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='18:05' && $session->day==2)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                  
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='18:05' && $session->day==3)
                   
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                      
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='18:05' && $session->day==4)
                   
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='18:05' && $session->day==5)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
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
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='19:15' && $session->day==2)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='19:15' && $session->day==3)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='19:15' && $session->day==4)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='19:15' && $session->day==5)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
                       @endif
                    @endforeach
                    </td>
                </tr>
                <tr>

                    <td class="td">20:05-21:00</td>
                    <td>
                    @foreach($sessions as $session)
                    @if($session->time_start=='20:05' && $session->day==1)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='20:05' && $session->day==2)
                     
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='20:05' && $session->day==3)
                     
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                    
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='20:05' && $session->day==4)
                     
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                    <td >
                    @foreach($sessions as $session)
                    @if($session->time_start=='20:05' && $session->day==5)
                    
                       <div class="tdhorario "style="background-color:{{$session->subject->color}}">{{$session->subject->abbreviation}}</div>
                     
                       @endif
                    @endforeach
                    </td>
                </tr>
            </table>

    </div>
</body>

</html>