@extends('base')

@section('main')


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-html5-1.6.1/r-2.2.3/datatables.min.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-html5-1.6.1/r-2.2.3/datatables.min.js"></script>

<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />

<script>
    $(document).ready(function() {
        $('#tabla').DataTable( {
            dom : "<'row'<'col-sm-6'><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'>>",
            buttons: [
                { extend: 'excel', className: 'btn-outline-success mr-2' }, 
                { extend: 'pdf', className: 'btn-outline-danger mr-2' }
            ],
            responsive : true,
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
        } );
    } );
</script>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
                
                <div class="card-header row m-0 justify-content-between">
                    
                        <h3>Programaciones</h3>
                    
                    <div class="float-right">
                        <a class="btn btn-outline-success" href="{{ route('programs.create')}}">Añadir</a>
                    </div>
                </div>
                <div class="card-body">
                
                <table id='tabla' class="table table-striped table-bordered dt-responsive nowrap compact text-center" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Actions</th>

                                    <th>Profesor</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($programs as $i=>$program)
                                <tr>
                                    <td>{{$program->name}}</td>
                                    <td class="botones">
                                        <a class="btn btn-warning btn-sm mr-2" href="/programs/{{$program->id}}">Ver</a>
                                        
                                    </td>
                                    <td>{{$program->professor->first_name}} {{$program->professor->last_name}}</td>
                                    
                                </tr>
                            @endforeach
                        
                            </tbody>
                        </table>
                
                </div>
                
            
    </div>
</main>

@endsection
