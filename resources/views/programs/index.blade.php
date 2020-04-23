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
<script>
    $(document).ready(function() {
        $('#tabla').DataTable( {
            dom : "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
            buttons: [
                { extend: 'excel', className: 'btn-outline-success mr-2' }, 
                { extend: 'pdf', className: 'btn-outline-danger mr-2' },
                {text: 'Crear', className: 'btn-outline-primary', 
                    action: function () {
                        window.location="/programs/create";

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
                <a class="dropdown-item" href="/programs/{{$program->id}}">{{$program->id}} - {{$program->name}}</a>
            @endforeach
            </div>
            <a class="btn btn-outline-primary" href="/programs/create">Crear</a>
        </div>  
        
        <!-- <input type="text" id="tags"> -->
        <table id='tabla' class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Profesor</th>
                            <th>Responsable</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($programs as $program)
                        <tr>
                            <td>{{$program->name}}</td>
                            <td>{{$program->professor->first_name}} {{$program->professor->last_name}}</td>
                            <td>{{$program->responsable->first_name}} {{$program->responsable->last_name}}</td>
                            <td class="botones">
                                <a href="{{route('programs.edit',$program->id)}}" class="btn btn-primary">Edit</a>
                                <form action="{{route('programs.destroy',$program->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
        </table>
</main>

@endsection
