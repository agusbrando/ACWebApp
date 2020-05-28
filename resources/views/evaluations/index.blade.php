@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Evaluaciones</h3>
            @if(in_array('Crear_evaluation', Session::get('user_permissions')))
            <div>
            <a class="btn btn-outline-success" href="{{ route('evaluations.create')}}">Añadir</a>
            </div>
            @endif
        </div>
        <div class="card-body row no-gutters table-responsive">
            <table class="table col-12 ">
                <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                    <tr>                       
                        <th scope="col">Nombre</th>               
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                @foreach($evaluations as $evaluation)
                <tbody>
                    <tr>                        
                        <td>{{$evaluation->name }}</td>
                        <td class="botones">
                            <a class="btn btn-outline-primary" href="{{ route('evaluations.show',$evaluation->id)}}">Ver</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <div class="card-footer col-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <input type="hidden" value="{{$evaluations}}">
                </ul>
            </nav>
        </div>
    </div>
</main>
@endsection