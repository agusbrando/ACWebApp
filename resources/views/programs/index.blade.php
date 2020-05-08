@extends('base')

@section('main')

<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />
<!-- <script>
    $(document).ready(function() {
        $('#tabla').DataTable( {
            dom : "<'row'<'col-sm-6'><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'>>",
            buttons: [
                { extend: 'excel', className: 'btn-outline-success mr-2' }, 
                { extend: 'pdf', className: 'btn-outline-danger mr-2' }
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
        } );
    } );
</script> -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
                
                <div class="card-header row m-0 justify-content-between">
                    
                        <h3>Programaciones</h3>
                    
                    <div class="float-right">
                        <a class="btn btn-outline-success" href="{{ route('programs.create')}}">Añadir</a>
                    </div>
                </div>
                <div class="card-body row no-gutters table-responsive">
                
                    <div class="row justify-content-center col-12">

                        <table id='tabla' class="table table-striped table-bordered" width="100%">
                            <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Profesor</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($programs as $i=>$program)
                                <tr>
                                    <td>Programacion {{$i}}</td>
                                    <td>{{$program->name}}</td>
                                    <td>{{$program->professor->first_name}} {{$program->professor->last_name}}</td>
                                    <td class="botones">
                                        <a class="btn btn-warning btn-sm mr-2" href="/programs/{{$program->id}}">Ver</a>
                                        <a href="{{route('programs.edit',$program->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{route('programs.destroy',$program->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        
                            </tbody>
                        </table>
                        
                    </div>
                
                </div>
                
            
    </div>
</main>

@endsection
