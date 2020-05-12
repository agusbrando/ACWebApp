@extends('base')

@section('main')

<!-- Tonggle -->
<link href="{{ asset('css/toggle.css') }}" rel="stylesheet" type="text/css" />
<!-- Jquery -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Tabla -->
<!-- <script>
    $(document).ready(function() {
        $('#alumnos').DataTable({
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row mt-3'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
            scrollY: 500,
            scrollCollapse: true,
            buttons: [{
                label: 'Create',
                text: 'Comportamiento',
                action: function(nButton, oConfig, oFlash) {

                    window.location = "http://127.0.0.1:8000/comportamiento"

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
</script> -->
<!-- DatePicker -->
<script>
    $(document).ready(function() {
        $('#datepicker').datepicker({
            language: 'es'
        });
    });
</script>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <div class="col-12">
                <h1>Pasar Lista</h1>
                <hr>
                <!-- DatePicker -->
                <h5>Fecha:</h5>
                <form action="{{ url('asistencia/filter') }}" method="post">
                    <div class="contenedor col-4">
                        <input type="text" id="datepicker" placeholder="- Seleccionar fecha -" class="form-control col-6" name="data">
                        <div class="espacio"> </div>
                        <div class="form-group select-iz">
                            <select class="form-control pl-1" id="horarios" name="horario">
                                <option>8:35 - 9:25 1ºHora</option>
                                <option>9:25 - 10:20 2ºHora</option>
                                <option>10:20 - 11:35 3ºHora</option>
                                <option>11:35 - 12:25 4ºHora</option>
                                <option>12:25 - 13:15 5ºHora</option>
                                <option>13:15 - 14:15 6ºHora</option>
                            </select>
                        </div>
                    </div>
                    <!-- Grupo -->
                    <div style="display: flex ">
                        <div>
                            <h5>Grupo:</h5>
                            <div class="form-group pl-3">
                                <select class="form-control" id="cursos" name="curso">
                                    <option>DAM:1</option>
                                    <option>DAM:2</option>
                                    <option>SMR:1</option>
                                    <option>SMR:2</option>
                                    <option>DAW:1</option>
                                    <option>DAW:2</option>
                                </select>
                            </div>
                        </div>
                        <div class="espacio"> </div>
                        <!-- Asignatura -->
                        <div>
                            <h5>Asignatura:</h5>
                            <div class="form-group">
                                <select class="form-control" id="asignaturas" name="asignatura">
                                    <option>PMM-Programación multimedia y dispositivos móviles</option>
                                    <option>AD-Acceso a datos</option>
                                    <option>DI-Diseño de interfaces</option>
                                    <option>EIE-Empresa e iniciativa emprenderora</option>
                                    <option>PSP-Programación de servicios y procesos</option>
                                    <option>SGE-Sistema de gestión empresarial</option>
                                    <option>INGLÉS</option>

                                </select>
                            </div>
                        </div>
                </form>
            </div>
            <!-- Tabla -->
            <table id="alumnos" class="table mt-3" style="width:100%;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Apellidos, Nombre</th>
                        <th scope="col">Número de Faltas</th>

                        <th scope="col">Presente</th>
                        <th scope="col">Faltas de Comportamiento</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user ->first_name}}, {{$user ->last_name}}</td>
                        <td>15</td>

                        <td><label class="switch">
                                <input type="checkbox" checked data-toggle="toggle">
                                <span class="slider round"></span>
                            </label></td>
                        <td>

                        </td>
                        <td> <a type="button" class="btn btn-primary mr-2 float-right" href="/faltas/{{$user->id}}">Más Info.</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <button type="button" class="btn btn-outline-info">Guardar</button>
            </div>
        </div>
    </div>
    </div>
</main>
@endsection