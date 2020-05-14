@extends('base')

@section('main')

<!-- Tonggle -->
<link href="{{ asset('css/toggle.css') }}" rel="stylesheet" type="text/css" />
<!-- Jquery -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Tabla -->
<script>
    $(document).ready(function() {
        $('#alumnos').DataTable({
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row mt-3'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
            scrollY: 500,
            scrollCollapse: true,
            buttons: [{
                label: 'Create',
                text: 'Asistencia',
                action: function(nButton, oConfig, oFlash) {

                    window.location = "http://127.0.0.1:8000/asistencia"

                },
                className: 'btn btn-outline-primary mr-1'
            }, {
                extend: 'excel',
                className: 'btn-outline-success'
            }, ],
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
<!-- DatePicker -->
<script>
    $(document).ready(function() {
        $('#datepicker').datepicker({
            language: 'es'
        });
    });
</script>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


    <h1>Comportamiento</h1>
    <hr>
        <!-- Tabla -->
        <table id="alumnos" class="table table-striped" style="width:100%;">
            <thead class="cabezeraTabla">
                <tr>
                    <td>Apellidos, Nombre</td>
                    <td>Faltas de Comportamiento</td>

                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user ->first_name}}, {{$user ->last_name}}</td>
                    <td>15</td>
                </tr>
                @endforeach
            </tbody>

        </table>
</main>
@endsection