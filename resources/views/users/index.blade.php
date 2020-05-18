@extends('base')

@section('main')
<<<<<<< HEAD
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
=======
<link href="{{ asset('css/user.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

>>>>>>> 2dfad48e0d29c3db12647e27e6bb6bda5e35890c
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Usuarios</h3>
            <div>
<<<<<<< HEAD
            <a class="btn btn-outline-success" href="{{ route('users.create')}}">Añadir</a>
            </div>
        </div>
        <div class="card-body row no-gutters table-responsive">
            <table class="table col-12 ">
                <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
=======
                <a class="btn btn-outline-success" href="{{ route('users.create')}}">Añadir</a>
            </div>
        </div>
        <div class="card-body row no-gutters table-responsive">
            <table id="dtBasicExample" class="table col-12 ">
                <thead id="developers" class="thead-dark col-12 col-md-8 col-lg-10 p-3">
>>>>>>> 2dfad48e0d29c3db12647e27e6bb6bda5e35890c
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Email</th>
<<<<<<< HEAD
                        <th scope="col">Role id</th>
=======
                        <th scope="col">Rol</th>
>>>>>>> 2dfad48e0d29c3db12647e27e6bb6bda5e35890c
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                @foreach($users as $user)
                <tbody>
                    <tr>
                        <td>{{$user->first_name }}</td>
                        <td>{{$user->last_name }}</td>
                        <td>{{$user->email}}</td>
<<<<<<< HEAD
                        <td>{{$user->role_id }}</td>
=======
                        <td>{{$user->role}}</td>
>>>>>>> 2dfad48e0d29c3db12647e27e6bb6bda5e35890c
                        <td class="botones">
                            <a class="btn btn-outline-primary" href="{{ route('users.show',$user->id)}}">Ver</a>
                        </td>
                    </tr>

                </tbody>
                @endforeach
            </table>
<<<<<<< HEAD
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
=======

        </div>


        <div class="card-footer col-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <input type="hidden" value="{{$users}}">
>>>>>>> 2dfad48e0d29c3db12647e27e6bb6bda5e35890c
                </ul>
            </nav>
        </div>
    </div>
</main>
@endsection