@extends('base')

@section('main')
<script>
    $(document).ready(function() {
        $('#mytable').DataTable({
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
            buttons: [{
                    extend: 'excel',
                    className: 'btn-outline-success mr-2'
                },
                {
                    extend: 'pdf',
                    className: 'btn-outline-danger mr-2'
                }
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de un total de _TOTAL_ Entradas",
                "infoEmpty": "No hay informacion",
                "infoFiltered": "(Filtrado de un total de _MAX_ entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se han encontrado resultados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
</script>
<link href="{{ asset('css/timetable.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="display-2">Horarios </h1>
                <form action="{{ route('horarios.create')}}" method="get">
                @csrf

                <button class="btn btn-primary" type="submit">Añadir Horario</button>
            </form>


            </div>
            
        
            <div class="d-flex flex-row bd-highlight mb-3 tablaTimetable">
                <div class="tablaTimetable">
                

                    <table class="table table-striped" id="mytable">
                        <thead class="cabezeraTabla">
                            <tr>
                                <td>ID</td>
                                <td>Nombre</td>
                                <td>Fecha Inicio</td>
                                <td>Fecha Fin</td>
                                <td>Editar</td>
                                <td>Borrar</td>
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

                                    <form action="{{ route('horarios.edit', $timetable->id)}}" method="get">
                                        @csrf

                                        <button class="btn btn-primary" type="submit">Editar</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('horarios.destroy', $timetable->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
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
    </div>

</main>
@endsection