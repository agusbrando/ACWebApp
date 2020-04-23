@extends('base')

@section('main')
<script>
    $(document).ready(function() {
        $('#tabla').DataTable( {
            dom : "<'row'<'col-sm-6'><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-6 boton'B><'col-sm-6'>>",
            buttons: [
                { extend: 'excel', className: 'btn-outline-success mr-2' }, 
                { extend: 'pdf', className: 'btn-outline-danger mr-2' },
                {text: 'Añadir Unidad', className: 'btn-outline-primary', 
                    action: function () {
                        $('#crearUnidad').modal('show');
                        
                }} 
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
</script>
<script>
    $(document).ready(function() {
        $('#tablaAspectos').DataTable( {
            dom : "<'row'<'col-sm-6'><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-6 boton'B><'col-sm-6'>>",
            buttons: [
                { extend: 'excel', className: 'btn-outline-success mr-2' }, 
                { extend: 'pdf', className: 'btn-outline-danger mr-2' },
                {text: 'Añadir Aspecto Evaluado', className: 'btn-outline-primary', 
                    action: function () {
                        $('#crearAspecto').modal('show');
                        $('#crearAspecto').ready(function() {
                            let datos = [];
                            @foreach($evaluables as $ev)
                                datos.push("{{$ev->name}}")
                            @endforeach
                            $( "#evaluables" ).autocomplete({
                            source: function( request, response ) {
                                    var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
                                    response( $.grep( datos, function( item ){
                                        return matcher.test( item );
                                    }) );
                                }
                            },"option", "appendTo", "#crearAspecto");

                        });
                        
                }} 
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
</script>
<script type="text/javascript">
	$(document).ready(function()
	    {
        $('#multiCollapseExample1').show();
	    $("#et1").on( "click", function() {	 
            $('#multiCollapseExample1').toggle();
            $('#multiCollapseExample2').toggle();
            $('#et1').toggleClass('active');
            $('#et2').toggleClass('active');
             });
        $("#et2").on( "click", function() {	 
            $('#multiCollapseExample1').toggle();
            $('#multiCollapseExample2').toggle();
            $('#et1').toggleClass('active');
            $('#et2').toggleClass('active');
             });
        });
        
</script>

<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
    <div class="col-sm-12">
        <h1 class="display-4">Programación didáctica </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Principal</a></li>
                <li class="breadcrumb-item"><a href="/programs">Programaciones</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$program->id}} - {{$program->name}}</li>
            </ol>
        </nav>
        
        <div class="bd-highlight mb-3 tablas col-12 center">
            
            <h1 class="display-5 text-center">{{$program->id}} - {{$program->name}}</h1>
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a id="et1" class="nav-link active" href="#">Unidades</a>
                    </li>
                    <li class="nav-item">
                        <a id="et2" class="nav-link" href="#">Aspectos Evaluados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Comprobar</a>
                    </li>
                    </ul>
                </div>
                <div class="card-body">
                    
                
            <div class="row justify-content-center">
                <div class="collapse multi-collapse"  id="multiCollapseExample1">
                    <table id='tabla' class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Contenido</th>
                                <th>F. inicio prevista</th>
                                <th>F. final prevista</th>
                                <th>Eval. prevista</th>
                                <th>F. inicio</th>
                                <th>F. final</th>
                                <th>Eval.</th>
                                <th>Observaciones</th>
                                <th>Mejoras</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($program->units as $unidad)
                            <tr>
                                <td>{{$unidad->name}}</td>
                                <td>{{$unidad->expected_date_start}}</td>
                                <td>{{$unidad->expected_date_end}}</td>
                                <td>{{$unidad->expected_eval}}</td>
                                <td>{{$unidad->date_start}}</td>
                                <td>{{$unidad->date_end}}</td>
                                <td>{{$unidad->eval}}</td>
                                <td>
                                    <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#observaciones/{{$unidad->id}}">Mostrar</button>
                                    <!-- Modal Observaciones-->
                                    <div class="modal fade" id="observaciones/{{$unidad->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Observaciones</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                {{$unidad->notes}}
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#mejoras/{{$unidad->id}}">Mostrar</button>
                                    <div class="modal fade" id="mejoras/{{$unidad->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Mejoras</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                {{$unidad->improvements}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="botones">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editarUnidad/{{$unidad->id}}">Edit</button>
                                    <!-- Modal form Unidad Editar -->
                                        <div class="modal fade" id="editarUnidad/{{$unidad->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Unidad Nueva</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                            <form method="POST" action="{{ route('programs.updateUnit', ['program_id'=>$unidad->program->id, 'id'=>$unidad->id]) }}">
                                                            @method('PATCH')  
                                                            @csrf
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">Contenido</span>
                                                                    </div>
                                                                    <input class="form-control" type="text" name="name" value="{{$unidad->name}}">
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">Fecha Inicio Prevista</span>
                                                                    </div>
                                                                    <input class="form-control" type="date" name="expected_date_start" value="{{$unidad->expected_date_start}}">
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">Fecha Fin Prevista</span>
                                                                    </div>
                                                                    <input class="form-control" type="date" name="expected_date_end" value="{{$unidad->expected_date_end}}">
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">Evaluacion Prevista</span>
                                                                    </div>
                                                                    <select class="form-control" name="expected_eval" value="{{$unidad->expected_eval}}">
                                                                        <option value="1EVAL">1EVAL</option>
                                                                        <option value="2EVAL">2EVAL</option>
                                                                        <option value="3EVAL">3EVAL</option>
                                                                    </select>
                                                                </div>
                                                        
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">Fecha Inicio</span>
                                                                    </div>
                                                                    <input class="form-control" type="date" name="date_start" value="{{$unidad->date_start}}">
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">Fecha Fin</span>
                                                                    </div>
                                                                    <input class="form-control" type="date" name="date_end" value="{{$unidad->date_end}}">
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">Evaluacion</span>
                                                                    </div>
                                                                    <select class="form-control" name="eval" value="{{$unidad->eval}}">
                                                                        <option value="1EVAL">1EVAL</option>
                                                                        <option value="2EVAL">2EVAL</option>
                                                                        <option value="3EVAL">3EVAL</option>
                                                                    </select>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">Observaciones</span>
                                                                    </div>
                                                                    <textarea name="notes" rows="3" class="form-control">{{$unidad->notes}}</textarea>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">Acciones de mejora</span>
                                                                    </div>
                                                                    <textarea name="improvements" rows="3" class="form-control">{{$unidad->improvements}}</textarea>
                                                                </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
                                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                                </div>
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                        </div>  
                                    <form  action="{{ route('programs.destroyUnit',  ['program_id'=> ($program->id), 'id'=> ($unidad->id)]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    
                </div> 
                <div class="collapse multi-collapse col-8"  id="multiCollapseExample2">
                    <table id='tablaAspectos' class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Aspecto Evaluado</th>
                                <th>Observaciones</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($program->evaluables as $evaluable)
                            <tr>
                                <td>{{$evaluable->name}}</td>
                                <td>
                                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#descripcion/{{$evaluable->id}}">Mostrar</button><!-- Modal Observaciones-->
                                    <div class="modal fade" id="descripcion/{{$evaluable->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Descripcion</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                            {{$evaluable->pivot->description}}
                                            
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </td>
                                <td class="botones">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editarAspecto/{{$evaluable->pivot->id}}">Edit</button>
                                    <!-- Modal form Aspecto Editar -->
                                        <div class="modal fade" id="editarAspecto/{{$evaluable->pivot->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modificar Aspecto</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                        <form method="POST" action="{{ route('programs.updateAspecto', ['program_id'=> ($program->id), 'id'=> ($evaluable->pivot->id)] ) }}">
                                                            @method('PATCH')  
                                                            @csrf
                                                                
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Aspecto evaluado</span>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="name" id="evaluables" value="{{$evaluable->name}}">
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Descripcion</span>
                                                                        </div>
                                                                        <textarea name="description" rows="3" class="form-control">{{$evaluable->pivot->description}}</textarea>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
                                                                    <button type="submit" class="btn btn-primary">Cambiar</button>
                                                                </div>
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                        </div>

                                    <form  action="{{ route('programs.destroyAspecto',  ['program_id'=> ($program->id), 'id'=> ($evaluable->pivot->id)]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div> 
            </div>
            
            <div class="row justify-content-center">
                    <div class="input-group col-6 pt-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Profesor</span>
                        </div>
                        <div class="form-control">{{$program->professor->first_name}} {{$program->professor->last_name}}</div>
                        <div class="col-1"></div>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Responsable</span>
                        </div>
                        <div class="form-control">{{$program->responsable->first_name}} {{$program->responsable->last_name}}</div>
                    </div>

            </div>


                </div>
            </div>
  
    </div> 
        
</main>

        <!-- Modal form Unidad -->
        <div class="modal fade" id="crearUnidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Unidad Nueva</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                            <form method="post" action="{{ route('programs.storeUnit', $program->id) }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Contenido</span>
                                    </div>
                                    <input class="form-control" type="text" name="name" value="Unidad">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Fecha Inicio Prevista</span>
                                    </div>
                                    <input class="form-control" type="date" name="expected_date_start">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Fecha Fin Prevista</span>
                                    </div>
                                    <input class="form-control" type="date" name="expected_date_end">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Evaluacion Prevista</span>
                                    </div>
                                    <select class="form-control" name="expected_eval">
                                        <option value="1EVAL">1EVAL</option>
                                        <option value="2EVAL">2EVAL</option>
                                        <option value="3EVAL">3EVAL</option>
                                    </select>
                                </div>
                                
                                
                                

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Añadir Programación</button>
                                </div>
                        </form>
                </div>
            </div>
        </div>
        </div>    

        <!-- Modal form Aspecto -->
        <div class="modal fade" id="crearAspecto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aspecto Nuevo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                <form method="post" action="{{ route('programs.storeAspecto', $program->id) }}">
                @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Aspecto evaluado</span>
                                </div>
                                <input class="form-control" type="text" name="name" id="evaluables">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Descripcion</span>
                                </div>
                                <textarea name="description" rows="3" class="form-control"></textarea>
                            </div>
                            

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Añadir</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        </div>  


@endsection
