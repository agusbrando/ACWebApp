@extends('base')

@section('main')
<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    
        <!-- <h1 class="display-4">Programación didáctica </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Principal</a></li>
                <li class="breadcrumb-item"><a href="/programs">Programaciones</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('programs.show',$program->id)}}">{{$program->id}} - {{$program->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$unidad->name}}</li>
            </ol>
        </nav> -->
        
        
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card text-center">
                        <div class="card-header row m-0 justify-content-between">
                            
                                <div class="d-flex flex-row d-flex justify-content-between">
                                    
                                    <a href="/programs/{{$unidad->program_id}}" class="my-auto mx-1 h5 mr-1"><i class="fas fa-arrow-left" ></i></a>
                                    <h3 class="text-left ml-2 mt-2">{{$unidad->name}}</h3>
                                    
                                </div>
                                
                                <div class="mt-2">
                                     <div class="row justify-content-end align-items-center">
                                        <a type="button" role="button" class="btn btn-sm btn-outline-primary"  href="{{ route('units.edit',  ['program_id'=> ($program->id), 'id'=> ($unidad->id)]) }}"><i class="far fa-edit"></i></a>
                                        <div class="espacio"></div>
                                        
                                            <button class="btn btn-sm btn-outline-danger" type="button" role="button" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash-alt"></i></button>
                                        <div class="espacio"></div>
                                    </div>
                                </div>
                               
                            
                        </div>
                        <div class="card-body col-12">
                                
                                <div class="row justify-content-center col-12">
                                
                                    <div class="row justify-content-center  col-12 mt-5">
                                    <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Contenido</span>
                                            </div>
                                            <input class="form-control" type="text" name="name" value="{{$unidad->name}}" disabled>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Fecha Inicio Prevista</span>
                                            </div>
                                            <input class="form-control" type="date" name="expected_date_start" value="{{$unidad->expected_date_start}}" disabled>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Fecha Fin Prevista</span>
                                            </div>
                                            <input class="form-control" type="date" name="expected_date_end" value="{{$unidad->expected_date_end}}" disabled>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Evaluacion Prevista</span>
                                            </div>
                                            
                                            <select class="form-control custom-select" name="expected_eval" disabled>
                                                @for($i=1;$i<=3;$i++)
                                                <option value="{{$i}}EVAL" {{$unidad->expected_eval == $i.'EVAL' ? 'selected' : ''}}>{{$i}}EVAL</option>
                     
                                                @endfor
                                            </select>
                                        </div>
                                
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Fecha Inicio</span>
                                            </div>
                                            <input class="form-control" type="date" name="date_start" value="{{$unidad->date_start}}" disabled>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Fecha Fin</span>
                                            </div>
                                            <input class="form-control" type="date" name="date_end" value="{{$unidad->date_end}}" disabled>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Evaluacion</span>
                                            </div>
                                            <select class="form-control custom-select" name="eval" disabled>
                                                @for($i=1;$i<=3;$i++)
                                                <option value="{{$i}}EVAL" {{$unidad->eval == $i.'EVAL' ? 'selected' : ''}}>{{$i}}EVAL</option>
                
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Observaciones</span>
                                            </div>
                                            <textarea name="notes" rows="3" class="form-control" disabled>{{$unidad->notes}}</textarea>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Acciones de mejora</span>
                                            </div>
                                            <textarea name="improvements" rows="3" class="form-control" disabled>{{$unidad->improvements}}</textarea>
                                        </div>
                                        
                                    </div>
                                        
                            
                                </div>
                    </div>
                </div>   
            </div>
       </div>
            
  
    
        
</main>

<!-- Modal Confirmacion Borrar-->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title text-center" id="confirm-deleteLabel"> Confirmación de borrar</h5>
                
            </div>
            <div class="modal-body wrap">
                ¿Esta seguro/a de que desea borrar esta unidad de la programacion?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('programs.destroyUnit',  ['program_id'=> ($program->id), 'id'=> ($unidad->id)]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm" type="submit">Borrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

