@extends('base')

@section('main')
<script>
    $(document).ready(function() {
        let datos = [];
        @foreach($subjects as $subject)
            datos.push("{{$subject->name}}")
        @endforeach
        $( "#tags" ).autocomplete({
        source: function( request, response ) {
                var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
                response( $.grep( datos, function( item ){
                    return matcher.test( item );
                }) );
            }
        });
        
    } );
</script>
<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
    <div class="col-sm-12">
        <h1 class="display-4">Programación didáctica </h1>
        <div class="dropdown">
            Selecciona la programacion
            <button class=" btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Cursos
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach($programs as $program)
                <a class="dropdown-item" href="/programs/{{$program->id}}">{{$program->id}} - {{$program->subject->name}} ({{date("Y", strtotime($program->created_at))}})</a>
            @endforeach
            </div>
            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#crearProgramacion">Crear</button>
        </div>  
        
        <input type="text" id="tags">
</main>

<!-- Modal -->
<div class="modal fade" id="crearProgramacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva Programacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
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
            
            

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Añadir Programación</button>
            </div>
      </form>
    </div>
  </div>
</div>
@endsection
