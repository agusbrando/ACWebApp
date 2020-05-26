@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <div class="d-flex flex-row">
                <a href="/events" class="my-auto mx-1 h5"><i class="fas fa-arrow-left"></i></a>
                <h3>Sesiones</h3>
            </div>
            <div>
                <a class="btn btn-outline-success" href="{{ route('sessions.create')}}">Añadir</a>
            </div>
        </div>
        <div class="card-body row no-gutters table-responsive">
            <table class="table col-12 ">
                <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                    <tr>
                        <th scope="col">Classroom</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Dia</th>
                        <th scope="col">Hora de Inicio</th>
                        <th scope="col">Hora de Fin</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @foreach($sessions as $session)
                <tbody>
                    <tr>
                        <td>{{$session->classroom->name }}</td>
                        <td>{{$session->type->name }}</td>
                        <td>{{$days[$session->day]}}</td>
                        <td>{{$session->time_start}}</td>
                        <td>{{$session->time_end}}</td>
                        <td class="botones">
                            <a class="btn btn-outline-primary" href="{{ route('sessions.show',$session->id)}}">Ver</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <div class="card-footer col-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <input type="hidden" value="{{$sessions}}">
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</main>
@endsection