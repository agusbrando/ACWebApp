@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Comentarios</h1>
            <table id="tabla" class="table table-striped table-bordered">
                <thead class="cabezeraTabla">
                    <tr>
                        <td>Número</td>
                        <!--<td>Id Usuario</td>-->
                        <!--<td>Id Post</td>-->
                        <td>Texto</td>
                        <td>Fecha Creado</td>
                        <td>Fecha Actualizado</td>
                        <td>Ver</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{$comment->id}}</td>
                            <!--<td>{{$comment->user_id}}</td>-->
                            <!--<td>{{$comment->post_id}}</td>-->
                            <td style="text-align:justify;">{{$comment->text}}</td>
                            <td>{{$comment->created_at}}</td>
                            <td>{{$comment->updated_at}}</td>
                            <td>
                                <a href="{{ route('comments.show', $comment->id)}}" class="btn btn-primary">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-12">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
    <div>
        <a style="margin: 19px;" href="{{ route('comments.create')}}" class="btn btn-primary">Nuevo Comentario</a>
        <a href="{{ route('comments.edit', $comment->id)}}" class="btn btn-primary">Editar</a>
        <a href="{{ route('comments.destroy', $comment->id)}}" class="btn btn-danger">Eliminar</a>
    </div>
    <script>
        // $(document).ready(function() {
        //     $('#datepicker').datepicker({
        //         language: 'es'
        //     });
        // });
        $(document).ready(function() {
            $('#tabla').DataTable({
                dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
                buttons: [{
                        extend: 'excel',
                        className: 'btn-outline-success mr-2 boton'
                    },
                    {
                        extend: 'pdf',
                        className: 'btn-outline-danger mr-2 boton'
                    }
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
            });
        });
    </script>
</main>
@endsection