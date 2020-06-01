@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Attachments</h3>
            <div>
            <a class="btn btn-outline-success" href="{{ route('posts.create')}}">Añadir</a>
        </div>
        </div>
        <div class="card-body row no-gutters table-responsive">
            <table id="tabla" class="table col-12 ">
                <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                    <tr>
                        <th scope="col">Número</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Id Attachmentable</th>
                        <th scope="col">Tipo Attachmentable</th>
                        <th scope="col">Fecha Creado</th>
                        <th scope="col">Fecha Actualizado</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                @foreach($attachments as $attachment)
                <tbody>
                    <tr>
                        <td>{{$attachment->id }}</td>
                        <td>{{$attachment->name }}</td>
                        <td>{{$attachment->attachmentable_id }}</td>
                        <td>{{$attachment->attachmentable_type }}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at }}</td>
                        @if(in_array('Listar_Attachment', Session::get('user_permissions')))
                        <td class="botones">
                            <a class="btn btn-outline-primary" href="{{ route('attachments.show',$attachment->id)}}">Ver</a>
                        </td>
                        @endif
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
</main>
@endsection