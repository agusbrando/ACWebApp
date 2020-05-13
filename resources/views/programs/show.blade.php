@extends('base')

@section('main')
<script>
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
</script>
<script>
    $(document).ready(function() {
        $('#tablaAspectos').DataTable( {
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
</script>
<!-- <script type="text/javascript">
	$(document).ready(function()
	    {  
            $('#multiCollapseExample1').show();
            $('#BotonAspecto').hide(); 
            $("#tab1").on( "click", function() {	 
                $('#multiCollapseExample1').show();
                $('#multiCollapseExample2').hide();
                $('#multiCollapseExample3').hide();
                $('#BotonUnidad').show();
                $('#BotonAspecto').hide();
                $('#tab1').addClass('active');
                $('#tab2').removeClass('active');
                $('#tab3').removeClass('active');
                });
            $("#tab2").on( "click", function() {	 
                $('#multiCollapseExample1').hide();
                $('#multiCollapseExample2').show();
                $('#multiCollapseExample3').hide();
                $('#BotonUnidad').hide();
                $('#BotonAspecto').show();
                $('#tab1').removeClass('active');
                $('#tab2').addClass('active');
                $('#tab3').removeClass('active');
                });
            $("#tab3").on( "click", function() {	 
                $('#multiCollapseExample1').hide();
                $('#multiCollapseExample2').hide();
                $('#multiCollapseExample3').show();
               
                $('#BotonUnidad').hide();
                $('#BotonAspecto').hide();
                $('#tab1').removeClass('active');
                $('#tab2').removeClass('active');
                $('#tab3').addClass('active');
            });
        });
        
</script> -->
<script>
    $(document).ready(function(){
        $('#multiCollapseExample1').show();
        $('#Boton2').hide();  
        @for($i=1;$i<=3;$i++)
            $("#tab{{$i}}").on( "click", function() {	 
                $('#multiCollapseExample{{$i}}').show();
                $('#tab{{$i}}').addClass('active');
                $('#Boton{{$i}}').show();
                @if($i==3)
                    $(".dropdown-toggle").dropdown();
                @endif
                @for($j=1;$j<=3;$j++)
                    @if($i!=$j)
                        $('#multiCollapseExample{{$j}}').hide();
                        $('#tab{{$j}}').removeClass('active');
                        $('#Boton{{$j}}').hide();
                    @endif
                @endfor
            });
        @endfor
    });
</script>
<script>
    $(document).ready(function(){ 
        @for($i=1;$i<=3;$i++)
            $('#divTablaEval{{$i}}').hide();
            $("#b{{$i}}EVAL").on( "click", function() {	 
                $('#divTablaEval{{$i}}').show();
                @for($j=1;$j<=3;$j++)
                    @if($i!=$j)
                        $('#divTablaEval{{$j}}').hide();
                    @endif
                @endfor
            });
        @endfor
    });
</script>
@for($i=1;$i<=3;$i++)
<script>
    $(document).ready(function() {
        $('#tablaEval{{$i}}').DataTable( {
            dom : "<'row'<'col-sm-6'><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-4 boton'><'col-sm-4'><'col-sm-4'>>",
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
</script>
@endfor

@if($editar || ($mostrarAspecto ?? '') )
<script type="text/javascript">
	$(document).ready(function()
	    {
            $('#multiCollapseExample1').hide();
            $('#multiCollapseExample2').show();
            $('#BotonAspecto').show();
            $('#BotonUnidad').hide();
        });
        
</script>
@endif

<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
    <div class="col-sm-12">
        
        
        <div class="bd-highlight mb-3 tablas col-12 center">
            
            <div class="card text-center">
                <div class="card-header">
                    <div class="col-12">
                        <h3 class="text-left p-1">{{$program->name}}</h3>
                        <div class="float-right">
                            <a class="btn btn-outline-success" id="Boton1" href="{{route('units.create',$program->id)}}">Añadir Unidad</a>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-outline-success"  id="Boton2" href="#" data-toggle="modal" data-target="#crearAspecto">Añadir Nuevo Aspecto</a>
                        </div>
                    </div>

                    <ul class="nav nav-tabs card-header-tabs pt-3">
                    <li class="nav-item">
                        <a id="tab1" class="nav-link active" href="#">Unidades</a>
                    </li>
                    <li class="nav-item">
                        <a id="tab2" class="nav-link" href="#">Aspectos Evaluados</a>
                    </li>
                    <li class="nav-item">
                        <a id="tab3" class="nav-link" href="#">Evaluación Programación</a>
                    </li>
                    </ul>
                </div>
                <div class="card-body"> 
            <div class="row justify-content-center">
                <div class="collapse multi-collapse col-sm-12"  id="multiCollapseExample1">
                    <table id='tabla' class="table table-striped table-bordered nowrap dt-responsive compact text-truncate"  style="width:100%">
                        <thead>
                            <tr>
                                <th>Contenido</th>
                                <th>F. inicio prevista</th>
                                <th>F. final prevista</th>
                                <th>Eval. prevista</th>
                                <th>F. inicio</th>
                                <th>F. final</th>
                                <th>Eval.</th>
                
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
                                
                                <td class="botones justify-content-center">
                                    
                                    <a type="button" class="btn"  href="{{ route('units.show',  ['program_id'=> ($program->id), 'id'=> ($unidad->id)]) }}"><i class="far fa-eye"></i></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    
                </div> 
                <div class="collapse multi-collapse col-lg-12 col-sm-12"  id="multiCollapseExample2">
                        @if(!$editar)
                        <table id='tablaAspectos' class="table table-striped table-bordered nowrap dt-responsive compact"  style="width:100%">
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
                                            
                                            {{$evaluable->pivot->description}}
                                        </td>
                                        <td class="botones justify-content-center">
                                            <a type="button" class="btn mr-2" href="{{route('programs.editarAspecto', ['program_id'=> ($program->id), 'id'=> ($evaluable->pivot->id)] )}}"><i class="far fa-edit"></i></a>
        

                                            <a type="button" class="btn" data-toggle="modal" data-target="#confirm-delete/{{$evaluable->pivot->id}}"><i class="fas fa-trash-alt"></i></a>
                                                    
                                                     <!-- Modal Confirmacion Borrar-->
                                                    <div class="modal fade" id="confirm-delete/{{$evaluable->pivot->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    Confirmación de borrar
                                                                </div>
                                                                <div class="modal-body">
                                                                    ¿Estas seguro de que deseas borrar este aspecto evaluado de la programacion?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                    <form  action="{{ route('programs.destroyAspecto',  ['program_id'=> ($program->id), 'id'=> ($evaluable->pivot->id)]) }}" method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-danger btn-sm" type="submit">Borrar</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        </td>
                                    </tr>  
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <form method="POST" action="{{ route('programs.updateAspecto', ['program_id'=> ($program->id), 'id'=> $evaluadoEditar_id] ) }}">
                            @method('PATCH')  
                            @csrf
                            <table id='tablaAspectos' class="table table-striped table-bordered  nowrap dt-responsive compact"  style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Aspecto Evaluado</th>
                                            <th>Observaciones</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($program->evaluables as $evaluable)
                                        @if($evaluable->pivot->id != $evaluadoEditar_id)
                                            <tr>
                                                <td>{{$evaluable->name}}</td>
                                                <td>
                                                    
                                                    {{$evaluable->pivot->description}}
                                                </td>
                                                <td class="botones justify-content-center align-items-center">
                                                    <a type="button" class="btn mr-2" href="{{route('programs.editarAspecto', ['program_id'=> ($program->id), 'id'=> ($evaluable->pivot->id)] )}}"><i class="far fa-edit"></i></a>
                                                </td>
                                            </tr>
                                        @else
                                            
                                            <tr>
                                               
                                                    <td>{{$evaluable->name}}</td>
                                                    <td><textarea rows="1" name="description" class="form-control" >{{$evaluable->pivot->description}}</textarea></td>
                                                    <td class="botones justify-content-center">
                                                        <button class="btn" type="submit"><i class="far fa-save"></i></button>
                                                        <a type="button" class="btn ml-2" href="{{route('programs.show',$program->id)}}"><i class="fas fa-times"></i></a>
                                                    </td>
                                            </tr>
                                                
                                        @endif
                                    @endforeach
                                    </tbody>
                            </table>
                        </form>
                        @endif
                </div> 
                <div class="collapse multi-collapse col-sm-12"  id="multiCollapseExample3">
                    <div class="dropdown justify-content-start">
                    
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Evaluacion
                            </button>
                        
                        
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" id="b1EVAL" href="#">1EVAL</a>
                            <a class="dropdown-item" id="b2EVAL" href="#">2EVAL</a>
                            <a class="dropdown-item" id="b3EVAL" href="#">3EVAL</a>
                        </div>
                    </div>

                    @for($i=1;$i<=3;$i++)
                    <div id='divTablaEval{{$i}}' class="mt-5">
                        <span class="badge badge-primary float-left"> {{$i}}º Evaluacion </span>
                        <a type="button" href="#" class="btn btn-sm btn-outline-primary">Mostrar/ocultar fechas previstas</a>
                        <table id='tablaEval{{$i}}' class="table table-striped table-bordered nowrap dt-responsive compact text-truncate"  style="width:100%">
                            <thead>
                                <tr>
                                    <th>Contenido</th>
                                    <th>F. inicio prevista</th>
                                    <th>F. final prevista</th>
                                    <th>Eval. prevista</th>
                                    <th>F. inicio</th>
                                    <th>F. final</th>                
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($program->units->where('eval',$i) as $unidad)
                                <tr>
                                    <td>{{$unidad->name}}</td>
                                    <td>{{$unidad->expected_date_start}}</td>
                                    <td>{{$unidad->expected_date_end}}</td>
                                    <td>{{$unidad->expected_eval}}</td>
                                    <td>{{$unidad->date_start}}</td>
                                    <td>{{$unidad->date_end}}</td>
                                    
                                    <td class="botones justify-content-center">
                                        
                                        <a type="button" class="btn"  href="{{ route('units.show',  ['program_id'=> ($program->id), 'id'=> ($unidad->id)]) }}"><i class="far fa-eye"></i></a>

                                    </td>
                                </tr>
                                @endforeach    
                            </tbody>
                        </table>
                        @if($notas[$i] == '')
                        <form action="">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Notas</span>
                                </div>
                                <textarea class="form-control" name="notes{{$i}}" rows='3'></textarea>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Fecha Comprobacion</span>
                                </div>
                                <input class="form-control" type="date" name="check_date{{$i}}">
                            </div>
                            <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Responsable</span>
                                    <select class="form-control custom-select" id="exampleFormControlSelect1" name="responsable_{{$i}}">
                                        @foreach($responsables as $responsable)
                                        <option value="{{$responsable->id}}">{{$responsable->first_name}} {{$responsable->last_name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </form>
                        @else
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Notas</span>
                            </div>
                            <textarea class="form-control" name="notes{{$i}}" rows='3' readonly>{{$notas[$i]}}</textarea>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Fecha Comprobacion</span>
                            </div>
                            <input class="form-control" type="date" name="check_date{{$i}}" value="{{$fechas[$i]}}" readonly>
                        </div>
                        <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Responsable</span>
                                <select class="form-control custom-select" id="exampleFormControlSelect1" name="responsable_{{$i}}" disabled>
                                    @foreach($responsables as $respons)
                                    <option value="{{$respons->id}}" {{$responsable[$i]->id == $respons->id ? 'selected' : ''}}>{{$respons->first_name}} {{$respons->last_name}}</option>
                                    @endforeach
                                </select>
                        </div>
                        @endif

                    </div>
                    @endfor
 
                </div> 
            </div>
            
            <div class="row justify-content-center">
                    <div class="input-group col-sm-12 col-md-8 col-lg-5 pt-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Profesor</span>
                        </div>
                        <div class="form-control profesor  text-truncate">{{$program->professor->first_name}} {{$program->professor->last_name}}</div>
                    </div>
            </div>


                </div>
            </div>
  
    </div> 
        
</main>

        <!-- Modal form Aspecto -->
        <div class="modal fade" id="crearAspecto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
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
                                <select class="form-control custom-select" id="exampleFormControlSelect1" name="name">
                                @foreach($listaEvaluables as $evaluable)
                                    <option class="form-control anchuraselect" value="{{$evaluable->name}}">{{$evaluable->name}}</option>
                                @endforeach
                                </select>
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

