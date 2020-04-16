@extends('base')

@section('main')
<script>
    $(document).ready(function() {
        $('#examenes').DataTable({
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
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
<script>
    $(document).ready(function() {
        $('#actitud').DataTable({
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
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

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h1 class="display-4 pr-5 mb-5">Desglose {{$titulo}} </h1>
    <div class="mb-4">
        <!-- <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#Actitud" aria-expanded="false" aria-controls="Actitud">Actitud</button> -->
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="Examenes Actitud">Cambiar Vista</button>
    </div>
    <div class="collapse multi-collapse show" id="Examenes">
        <table id="examenes" class="table table-striped examenes" style="width:100%">
            <thead class="cabezeraTabla">
                <tr>
                    <td>Apellidos, Nombre</td>
                    <td>Parcial 1</td>
                    <td>Parcial 2</td>
                    <td>Nota Examenes</td>
                    <td>Comentarios</td>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="text-left">{{$user->last_name}} {{$user->first_name}}</td>
                    <td>5</td>
                    <td>6</td>
                    <td>6</td>
                    <td>
                        <div class="input-group col-10">
                            <input type="text" class="form-control" placeholder="">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon1">Guardar</button>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="collapse multi-collapse" id="Actitud">
        <table id="actitud" class="table table-striped examenes" style="width:100%">
            <thead class="cabezeraTabla">
                <tr>
                    <td>Apellidos, Nombre</td>
                    <td>Nota Media Actitud</td>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="text-left">{{$user->last_name}} {{$user->first_name}}</td>
                    <td>5</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection