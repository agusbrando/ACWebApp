@extends('base')

@section('main')
<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
    <div class="col-sm-12">
        <h1 class="display-4">Programación didáctica </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Principal</a></li>
                <li class="breadcrumb-item"><a href="/programs">Programaciones</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('programs.show',$program->id)}}">{{$program->id}} - {{$program->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$unidad->name}}</li>
            </ol>
        </nav>
        
        
        <div class="row justify-content-center">
        <div class="col-10">
        <div class="card text-center">
                <div class="card-header">
               
                <h1 class="display-5 text-center">{{$unidad->name}}</h1>
               
                </div>
                <div class="card-body col-12">
                        
                        <div class="row justify-content-center col-12">
                        
                            <form method="POST" action="{{ route('programs.updateUnit', ['program_id'=>$unidad->program->id, 'id'=>$unidad->id]) }}" class="col-10">
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
                                <div class="row justify-content-center">
                                        <a type="button" class="btn btn-outline-secondary" href="{{ route('units.show',  ['program_id'=> ($program->id), 'id'=> ($unidad->id)]) }}">Descartar</a>
                                        <div class="espacio"></div>
                                        <button type="submit" class="btn btn-outline-primary pl-10">Guardar</button>
                                </div>
                            </form>
                       
                         </div>
            </div>
        </div>   
        </div>
        
            
  
    
        
</main>


@endsection

