@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Comentarios</h3>
            <div>
                <a class="btn btn-outline-info" href="{{ route('posts.edit',$post->id)}}">Editar</a>
                <form class="float-right" action="{{ route('posts.destroy',$post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger ml-1">Eliminar</button>
                </form>
            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-12 col-md-4 col-lg-2 p-3">
                <img src="{{asset('img/default_post.jpg" class="img-thumbnail" alt="...">
            </div>
        </div>
        <div class="card-body row no-gutters table-responsive">
            <table id="tabla" class="table col-12 ">
                <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                    <tr>
                        <th scope="col">Número</th>
                        <th scope="col">Texto</th>
                        <th scope="col">Fecha Creado</th>
                        <th scope="col">Fecha Actualizado</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                @foreach($comments as $comment)
                <tbody>
                    <tr>
                        <td>{{$comment->id }}</td>
                        <td style="text-align:justify;">{{$comment->text }}</td>
                        <td>{{$comment->created_at}}</td>
                        <td>{{$comment->updated_at }}</td>
                        <td class="botones">
                            <a class="btn btn-outline-primary" href="{{ route('comments.edit',$comment->id)}}">Editar</a>
                        </td>
                        <td class="botones">
                            <form action="{{ route('comments.destroy', $comment->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>

                </tbody>
                @endforeach
            </table>
        </div>

        <div class=" card-footer col-12">

            <nav class="col-5" aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="card-header row m-0 justify-content-between">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
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