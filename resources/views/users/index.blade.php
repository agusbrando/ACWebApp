@extends('base')

@section('main')
<link href="{{ asset('css/user.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Usuarios</h3>
            <div>
                <a class="btn btn-outline-success" href="{{ route('users.create')}}">Añadir</a>
            </div>
        </div>
        <div class="card-body row no-gutters table-responsive">
            <table id="dtBasicExample" class="table col-12 ">
                <thead id="developers" class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                @foreach($users as $user)
                <tbody>
                    <tr>
                        <td>{{$user->first_name }}</td>
                        <td>{{$user->last_name }}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                        <td class="botones">
                            <a class="btn btn-outline-primary" href="{{ route('users.show',$user->id)}}">Ver</a>
                        </td>
                    </tr>

                </tbody>
                @endforeach
            </table>

        </div>


        <div class="card-footer col-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <input type="hidden" value="{{$users}}">
                </ul>
            </nav>
        </div>
    </div>
</main>
@endsection