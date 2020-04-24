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
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex flex-flow mb-4">
                    <div class="d-flex flex-row">
                        <a href="javascript:history.go(-1)" class=" atras mt-3 mr-3"><i class="fas fa-arrow-left"></i></a>
                        <h1 class="display-4 pr-3">Porcentajes</h1>
                    </div>
                </div>
                <table class="table table-striped mt-5">
                    <thead class="cabezeraTabla">
                        <tr>
                            <td></td>
                            <td>Porcentaje</td>
                            <td>Nota Minima</td>
                            <td>Nota Media</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($percentages as $percentage)
                        <tr>
                            <td>{{$percentage->percentage}}</td>
                            <td>{{$percentage->nota_min}}</td>
                            <td>{{$percentage->nota_media}}</td>
                            <td>
                                <a href="#" class="atras"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                <a class="btn btn-outline-primary" href="{{ asset('/porcentajes.create') }}">Añadir</a>
            </div>
        </div>
    </div>
</main>
@endsection