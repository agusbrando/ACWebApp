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
        <h1 class="display-3">Programación didáctica </h1>
        
        <p class="display-4 text-center">Lista de programaciones</p>

        <a href="/misProgramaciones" class="btn btn-outline-success btn-sm mb-5">Mis Programaciones</a>
        <a href="/programs" class="btn btn-outline-primary btn-sm mb-5">Lista</a>

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
                                <a class="btn btn-warning btn-sm mr-2" href="/programs/{{$program->id}}">Ver</a>
                                <a href="{{route('programs.edit',$program->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{route('programs.destroy',$program->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @foreach($programs_professor as $program)
                        <tr>
                            <td>{{$program->name}}</td>
                            <td style="color:blue;">{{$program->professor->first_name}} {{$program->professor->last_name}}</td>
                            <td>{{$program->responsable->first_name}} {{$program->responsable->last_name}}</td>
                            <td class="botones">
                                <a class="btn btn-warning btn-sm mr-2" href="/programs/{{$program->id}}">Ver</a>
                                <a href="{{route('programs.edit',$program->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{route('programs.destroy',$program->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @foreach($programs_responsable as $program)
                        <tr>
                            <td>{{$program->name}}</td>
                            <td>{{$program->professor->first_name}} {{$program->professor->last_name}}</td>
                            <td style="color:red;">{{$program->responsable->first_name}} {{$program->responsable->last_name}}</td>
                            <td class="botones">
                                <a class="btn btn-warning btn-sm mr-2" href="/programs/{{$program->id}}">Ver</a>
                                <a href="{{route('programs.edit',$program->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{route('programs.destroy',$program->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
        </table>
</main>

@endsection
