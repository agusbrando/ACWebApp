@extends('base')

@section('main')
<script>
    $(document).ready(function() {
        $('#tabla').DataTable( {
            dom : "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
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
<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />

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
                <a class="dropdown-item" href="#">{{$program->id}} - {{$program->subject->name}} ({{date("Y", strtotime($program->created_at))}})</a>
            @endforeach
            </div>
            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#crearProgramacion">Crear</button>
        </div>  
        <div class="bd-highlight mb-3 tablas col-6 center">
            <div>
                <table id='tabla' class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Curso</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div> 
    </div>   
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
