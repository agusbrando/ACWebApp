@extends('base')

@section('main')
<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    
        
        
        <div class="row justify-content-center">
        <form method="POST" action="{{ route('programs.updateUnit', ['program_id'=>$unidad->program->id, 'id'=>$unidad->id]) }}">

            <div class="col-12">
                @method('PATCH')  
                @csrf
                <div class="card text-center">
                        <div class="card-header">
                            <div class="d-flex flex-row d-flex justify-content-between">
                                <div class="d-flex flex-row d-flex justify-content-between">
                                    
                                    <a href="{{ route('units.show',  ['program_id'=> ($program->id), 'id'=> ($unidad->id)]) }}" class="my-auto mx-1 h5 mr-1"><i class="fas fa-arrow-left" ></i></a>
                                    <h3 class="text-left ml-2 mt-2">{{$unidad->name}}</h3>
                                    
                                </div>
                                <div class="row justify-content-end mt-2">
                                    <a type="button" class="btn" href="{{ route('units.show',  ['program_id'=> ($program->id), 'id'=> ($unidad->id)]) }}"><i class="fas fa-times"></i></i></a>
                                    <div class="espacio"></div>
                                    
                                    <button class="btn" type="submit"><i class="fas fa-save"></i></button>
                                    
                                    <div class="espacio"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body col-12">
                                
                                <div class="row justify-content-center col-12">
                                
                                    
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Contenido</span>
                                            </div>
                                            <input class="form-control" type="text" name="name" value="{{$unidad->name}}">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Fechas Inicio/Fin Previstas</span>
                                            </div>
                                            <input id="daterangepicker" class="form-control" type="text" name="expected_date_start" value="{{$unidad->expected_date_start}} - {{$unidad->expected_date_end}}">
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
                                            <select class="form-control custom-select" name="expected_eval" value="{{$unidad->expected_eval}}">
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
                                            <select class="form-control custom-select" name="eval" value="{{$unidad->eval}}">
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
                        </div>
                </div>
            </form>   
        </div>
        
            
  
    
        
</main>


@endsection

