@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Usuarios</h3>
            <div>
                <a class="btn btn-outline-primary" href="/courses/create" role="button">Asignar Asignatura</a>
            </div>
            <div>
            <a class="btn btn-outline-success" href="{{ route('subjects.create')}}">Añadir</a>
            </div>
        </div>
        <div class="card-body row no-gutters table-responsive">
            <table class="table col-12 ">
                <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                    <tr>
                        <th scope="col">Nombre</th>  
                        <th scope="col">Action</th>                     
                    </tr>
                </thead>
                @foreach($subjects as $subject)
                <tbody>
                    <tr>
                        <td>{{$subject->name }}</td>
                        <td class="botones">
                            <a class="btn btn-outline-primary" href="{{ route('subjects.show',$subject->id)}}">Ver</a>
                        </td>
                    </tr>

                </tbody>
                @endforeach
            </table>
        </div>

        <div class="card-footer col-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <input type="hidden" value="{{$subjects}}">
                </ul>
            </nav>
        </div>
    </div>
</main>
@endsection