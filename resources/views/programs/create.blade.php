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
                @if($editar)
                <li class="breadcrumb-item active" aria-current="page">{{$programacion->id}} - {{$programacion->name}}</li>
                @else
                <li class="breadcrumb-item active" aria-current="page">Nueva Programación</li>
                @endif
            </ol>
        </nav>
        
        
        <div class="row justify-content-center">
        <div class="col-10">
        <div class="card text-center">
                <div class="card-header">
                @if($editar)
                <h1 class="display-5 text-center">{{$programacion->name}}</h1>
                @else
                <h1 class="display-5 text-center">Nueva programación</h1>
                @endif
                </div>
                <div class="card-body">
                        
                        <div class="row justify-content-center">
                        @if(!$editar)
                            <form method="post" action="{{ route('programs.store') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Profesor</span>
                                    </div>
                                        <select class="form-control" id="exampleFormControlSelect1" name="professor_id">
                                            @foreach($profesores as $profesor)
                                            <option value="{{$profesor->id}}">{{$profesor->first_name}} {{$profesor->last_name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Responsable</span>
                                    </div>
                                    <select class="form-control" id="exampleFormControlSelect1" name="user_id">
                                        @foreach($profesores as $profesor)
                                        <option value="{{$profesor->id}}">{{$profesor->first_name}} {{$profesor->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Asignaturas</span>
                                    </div>
                                    <select class="form-control" id="exampleFormControlSelect1" name="subject_id">
                                        @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Nombre</span>
                                    </div>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                

                                </div>
                                <div class="row justify-content-center">
                                    <a type="button" class="btn btn-outline-secondary" href="/programs">Cerrar</a>
                                    <div class="espacio"></div>
                                    <button type="submit" class="btn btn-outline-primary pl-10">Añadir Programación</button>
                                </div>
                            </form>
                        @else
                            <form method="post" action="{{ route('programs.update',$programacion->id) }}" class="col-8">
                                @method('patch')
                                    @csrf
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Profesor</span>
                                        </div>
                                            <select class="form-control" id="exampleFormControlSelect1" name="professor_id">
                                                @foreach($profesores as $profesor)
                                                    @if(($profesor->id)!=($programacion->professor_id))
                                                    <option value="{{$profesor->id}}">{{$profesor->first_name}} {{$profesor->last_name}}</option>
                                                    @else
                                                    <option selected="true" value="{{$profesor->id}}">{{$profesor->first_name}} {{$profesor->last_name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Responsable</span>
                                        </div>
                                        <select class="form-control" id="exampleFormControlSelect1" name="user_id">
                                            @foreach($profesores as $profesor)
                                                    @if(($profesor->id)!=($programacion->user_id))
                                                    <option value="{{$profesor->id}}">{{$profesor->first_name}} {{$profesor->last_name}}</option>
                                                    @else
                                                    <option selected="true" value="{{$profesor->id}}">{{$profesor->first_name}} {{$profesor->last_name}}</option>
                                                    @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Asignatura</span>
                                        </div>
                                        <select class="form-control" id="exampleFormControlSelect1" name="subject_id">
                                            @foreach($subjects as $subject)
                                                    @if(($subject->id)!=($programacion->subject_id))
                                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                    @else
                                                    <option selected="true" value="{{$subject->id}}">{{$subject->name}}</option>
                                                    @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group mb-5">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Nombre</span>
                                        </div>
                                        <input type="text" name="name" class="form-control" value="{{$programacion->name}}">
                                    </div>
                                    

                                    </div>
                                    <div class="row justify-content-center">
                                        <a type="button" class="btn btn-outline-secondary" href="/programs">Descartar</a>
                                        <div class="espacio"></div>
                                        <button type="submit" class="btn btn-outline-primary pl-10">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                </div>
            </div>
        </div>   
        </div>
        
            
  
    
        
</main>


@endsection

