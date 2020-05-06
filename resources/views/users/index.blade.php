@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Usuarios</h3>
            <div>
            <a class="btn btn-outline-info">Añadir</a>
            </div>
        </div>
        <table class="table col-11 mt-3 ml-5">
            <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role id</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            @foreach($users as $user)
            <tbody>
                <tr>
                    <td>{{$user->first_name }}</td>
                    <td>{{$user->last_name }}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role_id }}</td>
                    <td class="botones">
                        <a class="btn btn-outline-primary" href="{{ route('users.show',$user->id)}}">Ver</a>
                    </td>
                </tr>

            </tbody>
            @endforeach
        </table>

        <div>
            <form action="{{ route('users.store',$user->id)}}" method="POST">
                @method('PATCH')
                <fieldset>
                    <div class="form-group">
                        <label for="first_name">Nombre</label>
                        <input value="{{$user->first_name}}" name="first_name" id="first_name" type="text" class="@error('first_name') is-invalid @enderror form-control">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Apellidos</label>
                        <input value="{{$user->last_name}}" name="last_name" id="last_name" type="text" class="@error('last_name') is-invalid @enderror form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="{{$user->email}}" name="email" id="email" type="text" class="@error('email') is-invalid @enderror form-control">
                    </div>
                    <div class="form-group">
                        <label for="role">Rol</label>
                        <select name="role" id="role" class="form-control">
                            <option></option>
                        </select>
                    </div>
                </fieldset>
                @error('email', 'login')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
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


        <!-- <table id="users" class="table table-striped col-12 col-md-8 col-lg-10 " style="width:100%">

            <thead class="col-12 col-md-8 col-lg-10 p-3">
                <tr>
                    <td>Nombre</td>
                    <td>Apellidos</td>
                    <td>Email</td>
                    <td>Role id</td>
                    <td>Accion</td>
                </tr>
            </thead>
            @foreach($users as $user)
            <tbody>
                <tr>
                    <td>{{$user->first_name }}</td>
                    <td>{{$user->last_name }}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role_id }}</td>
                    <td class="botones">
                        <a class="btn btn-outline-primary" href="{{ route('users.show',$user->id)}}">Ver</a>
                    </td>

                </tr>
            </tbody>
            @endforeach
        </table> -->
    </div>
</main>
@endsection