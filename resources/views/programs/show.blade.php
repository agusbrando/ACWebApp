@extends('base')

@section('main')

<!-- Habilitar los tabs, y los botones de cada uno de ellos -->
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

<!-- Para que al entrar en esta vista con $editar = true se vaya a la pestaña correspondiente -->
@if($editar || ($mostrarAspecto ?? '') )
<script type="text/javascript">
	$(document).ready(function()
	    {
            $('#multiCollapseExample1').hide();
            $('#tab1').removeClass('active');
            $('#multiCollapseExample2').show();
            $('#tab2').addClass('active');
            $('#Boton2').show();
            $('#Boton1').hide();
        });
        
</script>
@endif

<!-- Hablitar los botones "+" / "-" para mostrar informacion adicional de cada unidad -->
<script>
    $(document).ready(function(){ 
        @for($i=0;$i<=($program->units->count());$i++)
        $('#masInfo{{$i}}').hide();
        $('#btnMenosInfo{{$i}}').hide();
        $('#cabFecha').hide();
        $('#fechaPrevista{{$i}}').hide();
        $("#btnMasInfo{{$i}}").on( "click", function() {	 
            $('#masInfo{{$i}}').toggle();
            $('#btnMasInfo{{$i}}').toggle();
            $('#cabFecha').toggle();
            $('#fechaPrevista{{$i}}').toggle();
            $('#columna{{$i}}').toggle();
            $('#btnMenosInfo{{$i}}').toggle();
        });
        $("#btnMenosInfo{{$i}}").on( "click", function() {	 
            $('#masInfo{{$i}}').toggle();
            $('#cabFecha').toggle();
            $('#fechaPrevista{{$i}}').toggle();
            $('#columna{{$i}}').toggle();
            $('#btnMasInfo{{$i}}').toggle();
            $('#btnMenosInfo{{$i}}').toggle();
        });
        @endfor
    });
</script>

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
                            <!-- <a class="btn btn-outline-success"  id="Boton2" href="#" data-toggle="modal" data-target="#crearAspecto">Añadir Nuevo Aspecto</a> -->
                            <a class="btn btn-outline-success"  id="Boton2" href="{{route('programs.createAspecto', $program->id)}}" >Añadir Nuevo Aspecto</a>

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
                <div class="card-body row no-gutters table-responsive"> 
            <div class="row justify-content-center">
                <div class="collapse multi-collapse col-sm-12 row no-gutters table-responsive"  id="multiCollapseExample1">
                    <table class="table col-12">
                        <thead class="thead-dark col-12">
                            <tr>
                                <th>Contenido</th>
                                <th>F. inicio prevista</th>
                                <th>F. final prevista</th>
                                <th>Eval. prevista</th>
                                <th>F. inicio</th>
                                <th>F. final</th>
                                <th>Eval.</th>
                
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($program->units as $unidad)
                            <tr>
                                <td>{{$unidad->name}}</td>
                                <td>{{date('d/m/Y',strtotime($unidad->expected_date_start))}}</td>
                                <td>{{date('d/m/Y',strtotime($unidad->expected_date_end))}}</td>
                                <td>{{$unidad->expected_eval}}</td>
                                @if(($unidad->date_start)!=null)
                                <td>{{date('d/m/Y',strtotime($unidad->date_start))}}</td>
                                <td>{{date('d/m/Y',strtotime($unidad->date_end))}}</td>
                                @else
                                <td></td>
                                <td></td>
                                @endif
                                <td>{{$unidad->eval}}</td>
                                
                                <td class="botones justify-content-center">
                                    
                                    <a type="button" class="btn btn-sm btn-outline-warning"  href="{{ route('units.show',  ['program_id'=> ($program->id), 'id'=> ($unidad->id)]) }}"><i class="far fa-eye"></i></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    
                </div> 
                <div class="collapse multi-collapse col-lg-12 col-sm-12 row no-gutters table-responsive"  id="multiCollapseExample2">
                   
                        @if(!$editar)
                        <div class="card-deck border-bottom bg-dark text-white">
                            <div class="card border-0 bg-dark">
                                <div class="card-body p-0">
                                <h5 class="card-title text-center p-1 pt-2">Aspecto Evaluado</h5>
                                
                                </div>
                            </div>
                            <div class="card border-0 bg-dark">
                                <div class="card-body p-0">
                                <h5 class="card-title text-center p-1 pt-2">Observaciones</h5>
                                
                                </div>
                            </div>
                            <div class="card border-0 bg-dark col-md-2">
                                <div class="card-body p-0">
                                <h5 class="card-title text-center"></h5>
                                
                                </div>
                            </div>
                        </div>
                        <!-- <div class="d-flex justify-content-between border-bottom bg-dark text-white p-3">
                                        
                            <div class="col-4 text-center">Aspecto Evaluado</div>
                            <div class="col-4 text-center">Observaciones</div>
                            <div  class="col-4 text-center"></div>
                                        
                        </div> -->
                        @foreach($program->evaluables as $evaluable)
                        <div class="card-deck border-bottom">
                            <div class="card border-0">
                                <div class="card-body">
                                    <p class="card-text text-justify">{{$evaluable->name}}</p>
                                </div>
                            </div>
                            <div class="card border-0">
                                <div class="card-body">
                                    <p class="card-text text-justify">{{$evaluable->pivot->description}}</p>
                                </div>
                            </div>
                            <div class="card border-0 col-md-2">
                                <div class="card-body">
                                    <a type="button" class="btn btn-sm btn-outline-primary mr-2" href="{{route('programs.editarAspecto', ['program_id'=> ($program->id), 'id'=> ($evaluable->pivot->id)] )}}"><i class="far fa-edit"></i></a>
            

                                    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#confirm-delete{{$evaluable->pivot->id}}"><i class="fas fa-trash-alt"></i></button>
                                        
                                    <!-- Modal Confirmacion Borrar-->
                                    <div class="modal fade" id="confirm-delete{{$evaluable->pivot->id}}" tabindex="-1" role="dialog" aria-labelledby="confirm-delete{{$evaluable->pivot->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h5 class="modal-title text-center" id="confirm-delete{{$evaluable->pivot->id}}Label"> Confirmación de borrar</h5>
                                                   
                                                </div>
                                                <div class="modal-body wrap">
                                                    ¿Estas seguro de que deseas borrar este aspecto evaluado de la programacion?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                                    <form  action="{{ route('programs.destroyAspecto',  ['program_id'=> ($program->id), 'id'=> ($evaluable->pivot->id)]) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-outline-danger btn-sm" type="submit">Borrar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <form method="POST" action="{{ route('programs.updateAspecto', ['program_id'=> ($program->id), 'id'=> $evaluadoEditar_id] ) }}">
                            @method('PATCH')  
                            @csrf
                            <div class="card-deck border-bottom bg-dark text-white">
                                <div class="card border-0 bg-dark">
                                    <div class="card-body p-0">
                                    <h5 class="card-title text-center p-1 pt-2">Aspecto Evaluado</h5>
                                    
                                    </div>
                                </div>
                                <div class="card border-0 bg-dark">
                                    <div class="card-body p-0">
                                    <h5 class="card-title text-center p-1 pt-2">Observaciones</h5>
                                    
                                    </div>
                                </div>
                                <div class="card border-0 bg-dark col-md-2">
                                    <div class="card-body p-0">
                                    <h5 class="card-title text-center"></h5>
                                    
                                    </div>
                                </div>
                            </div>
                            @foreach($program->evaluables as $evaluable)
                            @if($evaluable->pivot->id != $evaluadoEditar_id)
                            <div class="card-deck border-bottom-1">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <p class="card-text text-justify">{{$evaluable->name}}</p>
                                    </div>
                                </div>
                                <div class="card border-0">
                                    <div class="card-body">
                                        <p class="card-text text-justify">{{$evaluable->pivot->description}}</p>
                                    </div>
                                </div>
                                <div class="card border-0 col-md-2">
                                    <div class="card-body">
                                        <a type="button" class="btn btn-sm btn-outline-primary mr-2" href="{{route('programs.editarAspecto', ['program_id'=> ($program->id), 'id'=> ($evaluable->pivot->id)] )}}"><i class="far fa-edit"></i></a>
                

                                        <a type="button" class="btn btn-sm btn-outline-danger borrar" data-toggle="modal" data-target="#confirm-delete/{{$evaluable->pivot->id}}"><i class="fas fa-trash-alt"></i></a>
                                            
                                        
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="card-deck border-bottom-1">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <p class="card-text text-justify">{{$evaluable->name}}</p>
                                    </div>
                                </div>
                                <div class="card border-0">
                                    <div class="card-body">
                                         <p class="card-text text-justify"><textarea rows="3" name="description" class="form-control" >{{$evaluable->pivot->description}}</textarea></p>
                                    </div>
                                </div>
                                <div class="card border-0 col-md-2">
                                    <div class="card-body">
                                        <button class="btn btn-sm btn-outline-success" type="submit"><i class="far fa-save"></i></button>
                                        <a type="button" class="btn btn-sm btn-outline-danger borrar ml-2" href="{{route('programs.show',$program->id)}}"><i class="fas fa-times"></i></a>
                                        
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </form>
                        @endif
                </div> 
                <div class="collapse multi-collapse col-sm-12"  id="multiCollapseExample3">


                    <div id="accordion">
                    @foreach($program->yearUnions as $i=>$yearUnion)
                        <div class="card">
                            <div class="card-header" id="heading{{$i+1}}">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#divTablaEval{{$i+1}}" aria-expanded="true" aria-controls="divTablaEval{{$i+1}}">
                                {{$yearUnion->evaluation->name}}
                                </button>
                            </h5>
                            </div>

                            <div id="divTablaEval{{$i+1}}" class="collapse" aria-labelledby="heading{{$i+1}}" data-parent="#accordion">
                                <div class="card-body row no-gutters table-responsive">
                                    @if($yearUnion->evaluation->id!=4)
                                    <table id='tablaEval{{$i+1}}' class="table col-12 text-left" >
                                        <thead class="thead-dark col-12">
                                            <tr>
                                                <th></th>
                                                <th>Contenido</th>
                                                <th></th>
                                                <th class="text-center">En Plazo</th>
                                                <th>Fechas</th>
                                                <th></th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                               
                                            @foreach($program->units->where('eval',$i+1) as $k=>$unidad)
                                            <tr>
                                                <td>
                                                    <a type="button" id="btnMasInfo{{$k}}" class="btn btn-sm btn-outline-primary" href="#"  role="button"><i class="fas fa-plus"></i></a>
                                                    <a type="button" id="btnMenosInfo{{$k}}" class="btn btn-sm btn-primary" href="#"  role="button"><i class="fas fa-minus"></i></a>
                                                </td>
                                                <td> {{$unidad->name}}</td>
                                                <td></td>
                                                @if(strtotime($unidad->expected_date_end) < strtotime($unidad->date_end))
                                                <td class="text-danger text-center"><i class="fas fa-times"></i></td>
                                                @else
                                                <td class="text-success  text-center"><i class="fas fa-check"></i></td>
                                                @endif
                                                
                                                <td class="text-nowrap">{{date('d/m/Y',strtotime($unidad->date_start))}} - {{date('d/m/Y',strtotime($unidad->date_end))}}</td>
                                                <td  class="text-nowrap" id="fechaPrevista{{$k}}">({{date('d/m/Y',strtotime($unidad->expected_date_start))}} - {{date('d/m/Y',strtotime($unidad->expected_date_end))}})</td>
                                                <td id="columna{{$k}}"></td>
                                                <td></td>
                                            </tr>
                                            @if($unidad->notes != '' || $unidad->improvements != '')
                                            <tr  id="masInfo{{$k}}">

                                                <!-- <th>Observaciones</th>
                                                
                                                
                                                <td  colspan="2" class="text-justify">{{$unidad->notes}}</td>
                                                <th>Acciones de mejora</th>
                                                <td class="text-justify" colspan="2">{{$unidad->improvements}}</td> -->
                                                <td colspan="7">
                                                    <div class="card-deck">
                                                        <div class="card border-0">
                                                            <div class="card-body observaciones">
                                                            <h5 class="card-title text-center">Observaciones</h5>
                                                            @if($unidad->notes != '')
                                                            <p class="card-text text-justify">{{$unidad->notes}}</p>
                                                            @else
                                                            <p class="card-text text-center">No hay observaciones en esta unidad</p>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="card border-0">
                                                            <div class="card-body observaciones">
                                                            <h5 class="card-title text-center">Acciones de mejora</h5>
                                                            @if($unidad->improvements != '')
                                                            <p class="card-text text-justify">{{$unidad->improvements}}</p>
                                                            @else
                                                            <p class="card-text text-center">No hay acciones de mejora en esta unidad</p>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                </td>
                                            
                                                
                                                
                                            </tr>
                                            @else
                                            @endif
                                            @endforeach    
                                        </tbody>
                                    </table>
                                    @endif
                                    @if($notas[$i+1] == '' && $usuario->role_id == 3)
                                        <form method="post" action="{{route('programs.storeEvaluacion', $program->id)}}">
                                        @csrf
                                            <input type="hidden" name="eval" value="{{$i+1}}">

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Notas</span>
                                                </div>
                                                <textarea class="form-control" name="notes" rows='3'></textarea>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Fecha Comprobacion</span>
                                                </div>
                                                <input class="form-control" type="date" name="date_check">
                                            </div>
                                            <div class="row justify-content-center">
                                                <input class="btn btn-outline-success" type='submit' value="Guardar">
                                            </div>
                                        </form>
                                    @else
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Notas</span>
                                        </div>
                                        <textarea class="form-control" name="notes" rows='3' readonly>{{$notas[$i+1]}}</textarea>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="input-group mb-3 col-12">
                                        @if(!$evaluado[$i+1])
                                            
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Fecha Comprobacion</span>
                                                </div>
                                                <div class="form-control"> Por Evaluar </div>
                                                <div class="espacio"></div>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Responsable</span>
                                                </div>
                                                <div class="form-control profesor  text-truncate">Por evaluar</div>
                                        @else
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Fecha Comprobacion</span>
                                                </div>
                                                <input class="form-control" type="date" name="date_check" value="{{$fechas[$i+1]}}" readonly>
                                                <div class="espacio"></div>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Responsable</span>
                                                </div>
                                                <div class="form-control profesor  text-truncate">{{$responsable[$i+1]->first_name}} {{$responsable[$i+1]->last_name}}</div>
                                        @endif
                                            </div>
                                        </div>
                                    @endif
                                        

                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>






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

