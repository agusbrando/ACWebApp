@extends('base')

@section('main')



<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<link href="{{ asset('css/timetable.css') }}" rel="stylesheet" type="text/css" />
    <div class="card shadow ">
        <div class="card-header row m-0 justify-content-between">
            <h3>Horarios</h3>
            <div>
                <form action="{{ route('horarios.create')}}" method="get">
                    @csrf

                    <button class="btn btn-outline-primary" type="submit">Añadir Horario</button>
                </form>


            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="d-flex flex-row bd-highlight mb-3 tablaTimetable">
                <div class="tablaTimetable">


                    <table class="table table-striped" id="mytable">
                        <thead class="cabezeraTabla">
                            <tr>
                                <td>ID</td>
                                <td>Nombre</td>
                                <td>Fecha Inicio</td>
                                <td>Fecha Fin</td>
                                
                                <td>Ver</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($timetables as $timetable)
                            <tr>
                                <td>{{$timetable->id}}</td>
                                <td>{{$timetable->name}}</td>
                                <td>{{$timetable->date_start}}</td>
                                <td>{{$timetable->date_end}}</td>
                                
                                <td>
                                    <form action="{{ route('Ind', $timetable->id)}}" method="get">
                                        @csrf

                                        <button class="btn btn-warning" type="submit">Ver</button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class=" card-footer col-12">





            <button type="submit" class="btn btn-outline-danger ml-1 float-right">Descargar PDF</button>
            </form>
            <form class="float-right" action="{{ route('excel')}}" method="POST">
                @csrf
                @method('POST')

                <button type="submit" class="btn btn-outline-success ml-1 float-right"> Descargar Excel </button>
            </form>

            
        </div>
    </div>

</main>
@endsection