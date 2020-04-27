@extends('base')

@section('main')

<link href="{{ asset('css/timetable.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    
                <h1 class="display-3">Horario {{$timetable->name}} </h1>
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


            

</main>
@endsection