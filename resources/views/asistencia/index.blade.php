@extends('base')

@section('main')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="{{ asset('css/toggle.css') }}" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Tabla -->
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
<!-- DatePicker -->
<script>
    $(document).ready(function() {
        $('#datepicker').datepicker({
            language: 'es'
        });
    });
</script>
<!-- ApiGoogle -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


    <h1>Pasar Lista</h1>
    <hr>
    <!-- DatePicker -->
    <h5>Fecha:</h5>
    <input type="text" id="datepicker" placeholder="- Seleccionar fecha -" class="form-control">
    <div class="form-group">
        <select class="form-control mt-3 mb-3" id="exampleFormControlSelect1">
            <option>8:35 - 9:25 1ºHora</option>
            <option>9:25 - 10:20 2ºHora</option>
            <option>10:20 - 11:35 3ºHora</option>
            <option>11:35 - 12:25 4ºHora</option>
            <option>12:25 - 13:15 5ºHora</option>
            <option>13:15 - 14:15 6ºHora</option>
        </select>

        <!-- Grupo -->
        <h5>Grupo:</h5>
        <div class="form-group">
            <select class="form-control" id="exampleFormControlSelect1">
                <option>DAM:1</option>
                <option>DAM:2</option>
                <option>SMR:1</option>
                <option>SMR:2</option>
                <option>DAW:1</option>
                <option>DAW:2</option>
            </select>
        </div>

        <!-- Asignatura -->
        <h5>Asignatura:</h5>
        <div class="form-group">
            <select class="form-control" id="exampleFormControlSelect1">
                <option>PMM-Programación multimedia y dispositivos móviles</option>
                <option></option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>

        <!-- Tabla -->
        <table id="alumnos" class="table table-striped" style="width:100%;">
            <thead class="cabezeraTabla">
                <tr>
                    <td>Apellidos, Nombre</td>
                    <td>Número de Faltas</td>
                    <td>Ausente</td>
                    <td>Presente</td>
                    <td>Faltas de Comportamiento</td>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user ->first_name}}</td>
                    <td>15</td>
                    <td></td>
                    <td><label class="switch">
                            <input type="checkbox" checked data-toggle="toggle">
                            <span class="slider round"></span>
                        </label></td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Falta Grave</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Falta Comportamiento</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <textarea class="form-control" rows="3" placeholder="-Breve descripción-"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary">Guardar cambios</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
</main>
@endsection