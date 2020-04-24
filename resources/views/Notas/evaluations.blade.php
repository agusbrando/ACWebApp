@extends('base')

@section('main')
<script>
    $(document).ready(function() {
        var table = $('#evaluacion1').DataTable({
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row mt-3'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
            scrollY: 500,
            scrollCollapse: true,
            buttons: [{
                    extend: 'excel',
                    className: 'btn-outline-success'
                },
                {
                    label: 'Create',
                    text: 'Desglose',
                    action: function(nButton, oConfig, oFlash) {

                        window.location = "http://127.0.0.1:8000/desglose"

                    },
                    className: 'btn btn-outline-primary ml-1'
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
<script>
    $(document).ready(function() {
        $('#evaluacion2').DataTable({
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row mt-3'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
            scrollY: 500,
            scrollCollapse: true,
            buttons: [{
                    extend: 'excel',
                    className: 'btn-outline-success'
                },
                {
                    label: 'Create',
                    text: 'Desglose',
                    action: function(nButton, oConfig, oFlash) {

                        window.location = "http://127.0.0.1:8000/desglose"

                    },
                    className: 'btn btn-outline-primary ml-1'
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
<script>
    $(document).ready(function() {
        $('#evaluacion3').DataTable({
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row mt-3'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
            scrollY: 500,
            scrollCollapse: true,
            buttons: [{
                    extend: 'excel',
                    className: 'btn-outline-success'
                },
                {
                    label: 'Create',
                    text: 'Desglose',
                    action: function(nButton, oConfig, oFlash) {

                        window.location = "http://127.0.0.1:8000/desglose"

                    },
                    className: 'btn btn-outline-primary ml-1'
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
<script>
    $(document).ready(function() {
        $('#evaluacionF').DataTable({
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row mt-3'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
            scrollY: 500,
            scrollCollapse: true,
            buttons: [{
                    extend: 'excel',
                    className: 'btn-outline-success'
                },
                {
                    label: 'Create',
                    text: 'Desglose',
                    action: function(nButton, oConfig, oFlash) {

                        window.location = "http://127.0.0.1:8000/desglose"

                    },
                    className: 'btn btn-outline-primary ml-1'
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
<link href="{{ asset('css/notas.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <section id="tabs">
        <div class="container-fluid">
            <div class="d-flex flex-row">
                <a href="/asignaturas" class=" atras mt-3 mr-3"><i class="fas fa-arrow-left"></i></a>
                <h1 class="display-4 pr-3">{{$subject->course->name}} - {{$subject->name}}</h1>
            </div>
            <div class="row">
                <div class="col mt-4">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link" id="nav-base-tab" data-toggle="tab" href="#nav-base" role="tab" aria-controls="nav-base" aria-selected="false">Base</a>
                            <a class="nav-item nav-link active" id="nav-eval1-tab" data-toggle="tab" href="#nav-eval1" role="tab" aria-controls="nav-eval1" aria-selected="true">Evaluacion 1</a>
                            <a class="nav-item nav-link" id="nav-eval2-tab" data-toggle="tab" href="#nav-eval2" role="tab" aria-controls="nav-eval2" aria-selected="false">Evaluacion 2</a>
                            <a class="nav-item nav-link" id="nav-eval3-tab" data-toggle="tab" href="#nav-eval3" role="tab" aria-controls="nav-eval3" aria-selected="false">Evaluacion 3</a>
                            <a class="nav-item nav-link" id="nav-evalF-tab" data-toggle="tab" href="#nav-evalF" role="tab" aria-controls="nav-evalF" aria-selected="false">Evaluacion Final</a>
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade" id="nav-base" role="tabpanel" aria-labelledby="nav-base-tab">
                            @foreach($evaluaciones as $eval)
                            <table class="table table-striped mt-5">
                                <thead class="cabezeraTabla">
                                    <tr>
                                        <td>{{$eval->name}}</td>
                                        <td>Porcentaje</td>
                                        <td>Nota Minima</td>
                                        <td>Nota Media</td>
                                        <td>Actions</td>
                                    </tr>
                                </thead>
                                @if($eval->name == '1Eval')
                                @foreach($eval1 as $porcentaje)
                                <tbody>
                                    <tr>
                                        <td>{{$porcentaje->type}}</td>
                                        <td>{{$porcentaje->porcentaje}}%</td>
                                        <td>{{$porcentaje->nota_min}}</td>
                                        <td>{{$porcentaje->nota_media}}</td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <a href="{{url('porcentajes/edit',  ['subject_id'=> ($subject->id) ,'evaluation_id'=> ($porcentaje->evaluacion_id), 'type_id'=> ($porcentaje->type_id)])}}" class="mr-3 icon"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="icon"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                @elseif($eval->name == '2Eval')
                                @foreach($eval2 as $porcentaje)
                                <tbody>
                                    <tr>
                                        <td>{{$porcentaje->type}}</td>
                                        <td>{{$porcentaje->porcentaje}}%</td>
                                        <td>{{$porcentaje->nota_min}}</td>
                                        <td>{{$porcentaje->nota_media}}</td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <a href="{{url('porcentajes/edit',  ['subject_id'=> ($subject->id) ,'evaluation_id'=> ($porcentaje->evaluacion_id), 'type_id'=> ($porcentaje->type_id)])}}" class="mr-3 icon"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="icon"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                @elseif($eval->name == '3Eval')
                                @foreach($eval3 as $porcentaje)
                                <tbody>
                                    <tr>
                                        <td>{{$porcentaje->type}}</td>
                                        <td>{{$porcentaje->porcentaje}}%</td>
                                        <td>{{$porcentaje->nota_min}}</td>
                                        <td>{{$porcentaje->nota_media}}</td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <a href="{{url('porcentajes/edit',  ['subject_id'=> ($subject->id) ,'evaluation_id'=> ($porcentaje->evaluacion_id), 'type_id'=> ($porcentaje->type_id)])}}" class="mr-3 icon"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="icon"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                @endif
                            </table>
                            @endforeach
                            <a class="btn btn-outline-primary" href="{{ url('/porcentajes/create', $subject->id) }}">Añadir</a>
                        </div>
                        <div class="tab-pane fade show active" id="nav-eval1" role="tabpanel" aria-labelledby="nav-eval1-tab">
                            <table id="evaluacion1" class="table table-striped" style="width:100%">
                                <thead class="cabezeraTabla">
                                    <tr>
                                        <td>Nº</td>
                                        <td>Apellidos, Nombre</td>
                                        <td>%Trabajos</td>
                                        <td>%Examen</td>
                                        <td>%Actitud</td>
                                        <td>NOTA FINAL</td>
                                        <td>%Recuperacion</td>
                                        <td>BOLETIN</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->last_name}} {{$user->first_name}}</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-eval2" role="tabpanel" aria-labelledby="nav-eval2-tab" style="width:100%">
                            <table id="evaluacion2" class="table table-striped evaluation">
                                <thead class="cabezeraTabla">
                                    <tr>
                                        <td>Nº</td>
                                        <td>Apellidos, Nombre</td>
                                        <td>%Trabajos</td>
                                        <td>%Examen</td>
                                        <td>%Actitud</td>
                                        <td>%NOTA FINAL</td>
                                        <td>%Recuperacion</td>
                                        <td>%BOLETIN</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->last_name}} {{$user->first_name}}</td>
                                        <td>No</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-eval3" role="tabpanel" aria-labelledby="nav-eval3-tab">
                            <table id="evaluacion3" class="table table-striped" style="width:100%">
                                <thead class="cabezeraTabla">
                                    <tr>
                                        <td>Nº</td>
                                        <td>Apellidos, Nombre</td>
                                        <td>%Trabajos</td>
                                        <td>%Examen</td>
                                        <td>%Actitud</td>
                                        <td>%NOTA FINAL</td>
                                        <td>%Recuperacion</td>
                                        <td>%BOLETIN</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->last_name}} {{$user->first_name}}</td>
                                        <td>No</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-evalF" role="tabpanel" aria-labelledby="nav-eval-tab">
                            <table id="evaluacionF" class="table table-striped" style="width:100%">
                                <thead class="cabezeraTabla">
                                    <tr>
                                        <td>Nº</td>
                                        <td>Apellidos, Nombre</td>
                                        <td>%Trabajos</td>
                                        <td>%Examen</td>
                                        <td>%Actitud</td>
                                        <td>%NOTA FINAL</td>
                                        <td>%Recuperacion</td>
                                        <td>%BOLETIN</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->last_name}} {{$user->first_name}}</td>
                                        <td>No</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection