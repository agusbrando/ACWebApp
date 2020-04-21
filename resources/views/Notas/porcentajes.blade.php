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
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex flex-flow mb-4">
                    <h1 class="display-4 pr-5">Notas y Porcentages</h1>
                    <a class="btn btn-secondary evaluaciones mt-4" href="http://127.0.0.1:8000/evaluaciones">Evaluaciones</a>
                </div>
                <div class="d-flex flex-row bd-highlight mb-3 mt-n3">
                    <div class="tablaPorcentajes porcentajes">
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
                                <tr>
                                    <td>Trabajos</td>
                                    <td>20%</td>
                                    <td>4,00</td>
                                    <td>5,00</td>
                                    <td>
                                        <form action="#" method="post">
                                            <button class="btn btn-danger btn-sm" type="submit">Borrar</button>
                                        </form>
                                        <!-- Modal añadir porcentaje -->
                                        <div class="modal fade" id="formPorcentajes" tabindex="-1" role="dialog" aria-labelledby="formPorcentajes" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Añadir porcentaje</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="nombre">Nombre</label>
                                                                <input type="text" class="form-control" id="nombre" aria-describedby="nombreHelp" placeholder="Nombre del porcentaje">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Nombre">Porcentaje</label>
                                                                <select class="custom-select" id="inputGroupSelect01">
                                                                    <option value="0" selected>0%</option>
                                                                    <option value="10">10%</option>
                                                                    <option value="20">20%</option>
                                                                    <option value="30">30%</option>
                                                                    <option value="40">40%</option>
                                                                    <option value="50">50%</option>
                                                                    <option value="60">60%</option>
                                                                    <option value="70">70%</option>
                                                                    <option value="80">80%</option>
                                                                    <option value="90">90%</option>
                                                                    <option value="100">100%</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nota_min">Nota Minima</label>
                                                                <input type="text" class="form-control" id="nota_min" placeholder="Nota minima para hacer media">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nota_med">Nota Maxima</label>
                                                                <input type="text" class="form-control" id="nota_med" placeholder="Nota media para aprobar">
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                <button type="button" class="btn btn-primary">Guardar Cambios</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#formPorcentajes">
                            Añadir
                        </button>
                    </div>
                    <div class="tablaPorcentajes alumnos">
                        <table id="alumnos" class="table table-striped" style="width:100%">
                            <thead class="cabezeraTabla">
                                <tr>
                                    <td>Nº</td>
                                    <td>Apellidos, Nombre</td>
                                    <td>Baja</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->last_name}} {{$user->first_name}}</td>
                                    <td>No</td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-sm">Baja</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
</main>
@endsection