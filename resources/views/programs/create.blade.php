@extends('base')

@section('main')
<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    @if($editar)
    <form method="post" action="{{ route('programs.update',$programacion->id) }}" class="col-8">
        @method('patch')
        @csrf 
    @else
    <form method="post" action="{{ route('programs.store') }}">
        @csrf    
    @endif  
        <div class="card shadow">
            
            <div class="card-header row m-0 justify-content-between">
                    @if($editar)
                    <h3>{{$programacion->name}}</h3>
                    @else
                    <h3>Nueva programación</h3>
                    @endif
                <div class="float-right">
                    <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
                    @if($asignar)
                    <a class="btn btn-outline-warning float-right" href="/courses/show/{{$courseId}}/{{$yearId}}" tabindex="-1" aria-disabled="true">Cancelar</a>
                    @else
                    <a class="btn btn-outline-warning float-right" href="/programs/" tabindex="-1" aria-disabled="true">Cancelar</a>
                    @endif
                </div>
            </div>
            <div class="card-body row no-gutters">
               
                <div class="row justify-content-center col-12 p-3">

                    @if(!$editar)
                        @if($asignar ==true)
                        <fieldset>
                        
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Profesor</span>
                                    </div>
                                    
                                    <select class="form-control custom-select" id="exampleFormControlSelect1" name="professor_id">
                                        @foreach($profesores as $profesor)
                                        <option value="{{$profesor->id}}">{{$profesor->first_name}} {{$profesor->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Curso</span>
                                    </div>
                                    <select class="form-control custom-select" id="exampleFormControlSelect1" name="course_id" disabled>
                                        @foreach($courses as $course)
                                        <option value="{{$course->id}}" {{$course->id == $courseId ? 'selected' : ''}}>{{$course->level}}{{$course->abbreviation}}</option>
                
                                        @endforeach
                                    </select>
                                    <input type="hidden" value="{{$courseId}}" name="course_id">

                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Asignaturas</span>
                                    </div>
                                    <select class="form-control custom-select" id="exampleFormControlSelect1" name="subject_id" disabled>
                                        @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}" {{$subject->id == $subjectId ? 'selected' : ''}}>{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" value="{{$subjectId}}" name="subject_id">

                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Año</span>
                                    </div>
                                    <select class="form-control custom-select" id="exampleFormControlSelect1" name="year_id" disabled>
                                         @foreach($years as $year)
                                        <option value="{{$year->id}}" {{$year->id == $yearId ? 'selected' : ''}}>{{$year->name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" value="{{$yearId}}" name="year_id">

                                </div>
                                

                                </div>
                                
                            
                        </fieldset>
                        @else
                        <fieldset>
                        
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Profesor</span>
                                    </div>
                                        <select class="form-control custom-select" id="exampleFormControlSelect1" name="professor_id">
                                            @foreach($profesores as $profesor)
                                            <option value="{{$profesor->id}}">{{$profesor->first_name}} {{$profesor->last_name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Curso</span>
                                    </div>
                                    <select class="form-control custom-select" id="exampleFormControlSelect1" name="course_id">
                                        @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->level}}º {{$course->abbreviation}} ({{$course->name}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Asignaturas</span>
                                    </div>
                                    <select class="form-control custom-select" id="exampleFormControlSelect1" name="subject_id">
                                        @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Año</span>
                                    </div>
                                    <select class="form-control custom-select" id="exampleFormControlSelect1" name="year_id">
                                        @foreach($years as $year)
                                        <option value="{{$year->id}}">{{$year->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                

                                </div>
                                
                            
                        </fieldset>
                        @endif
                    @else
                    
                        <fieldset>
                            
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
                                   
                            
                        </fieldset>
                    
                    
                    @endif
                    
                </div>
            </div>
            
          
        </div>
        
    </form>          
  
    
        
</main>


@endsection

