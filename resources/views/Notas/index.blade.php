@extends('base')

@section('main')
<script>
    $(document).ready(function() {
        $('#alumnos').DataTable({
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row mt-3'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
            scrollY: 500,
            scrollCollapse: true,
            buttons: [{
                extend: 'excel',
                className: 'btn-outline-success'
            }],
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
<link href="{{ asset('css/notas.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="container-fluid">
        <h1 class="display-4 pr-5">Asignaturas</h1>
        <div class="mt-5">
            <table id="alumnos" class="table table-striped" style="width:100%">
                <thead class="cabezeraTabla">
                    <tr>
                        <td>Id</td>
                        <td>Nombre</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subjects as $subject)
                    <tr>
                        <td>{{$subject->id}}</td>
                        <td>{{$subject->name}}</td>
                        <td class="w-25">
                            <div class="d-flex flex-row">
                                <a href="{{ route('asignaturas.show', $subject->id) }}" class="btn btn-primary btn-sm mr-2">Evaluaciones</a>
                                <a href="#" class="btn btn-primary btn-sm">Programacion</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</main>
@endsection