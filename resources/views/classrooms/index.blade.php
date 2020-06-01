@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Aulas</h3>
            @if(in_array('Crear_classroom', Session::get('user_permissions')))
            <div>
            <a class="btn btn-outline-success" href="{{ route('classrooms.create')}}">Añadir</a>
            </div>
            @endif
        </div>
        <div class="card-body row no-gutters table-responsive">
            <table class="table col-12 ">
                <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Número</th>                       
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                @foreach($classrooms as $classroom)
                <tbody>
                    <tr>
                        <td>{{$classroom->name }}</td>
                        <td>{{$classroom->number }}</td>     
                        @if(in_array('Listar_classroom', Session::get('user_permissions')))                 
                        <td class="botones">
                            <a class="btn btn-outline-primary" href="{{ route('classrooms.show',$classroom->id)}}">Ver</a>
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
</main>
@endsection