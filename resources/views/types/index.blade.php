@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <div class="d-flex flex-row">
                <a href="/events" class="my-auto mx-1 h5"><i class="fas fa-arrow-left"></i></a>
                <h3> Tipos</h3>
            </div>
            @if(in_array('Crear_type', Session::get('user_permissions')))                       
            <div>
                <a class="btn btn-outline-success" href="{{ route('types.create')}}">Añadir</a>
            </div>
            @endif
        </div>
        <div class="card-body row no-gutters table-responsive">
            <table class="table col-12 ">
                <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Model</th>
                        @if(in_array('Listar_type', Session::get('user_permissions')))                       
                        <th scope="col">Accion</th>
                        @endif
                    </tr>
                </thead>
                @foreach($types as $type)
                <tbody>
                    <tr>
                        <td>{{$type->name }}</td>
                        <td>{{$type->model }}</td>
                        @if(in_array('Listar_type', Session::get('user_permissions')))                       
                        <td class="botones">
                            <a class="btn btn-outline-primary" href="{{ route('types.show',$type->id)}}">Ver</a>
                        </td>
                        @endif
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <div class="card-footer col-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <input type="hidden" value="{{$types}}">
                </ul>
            </nav>
        </div>
    </div>
</main>
@endsection