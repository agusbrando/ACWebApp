@extends('base')

@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet" type="text/css" />

    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <div class="d-flex flex-row">
                <a href="{{ url()->previous() }}" class="my-auto mx-1 h5"><i class="fas fa-arrow-left"></i></a>
                <h3> Perfil usuario</h3>
            </div>
            <div>

                <a class="btn btn-outline-info" href="{{ route('users.edit',$user->id)}}">Editar</a>
                <form class="float-right" action="{{ route('users.destroy',$user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger ml-1">Eliminar</button>
                </form>

            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-12 col-md-4 col-lg-2 p-3">
                <img src="{{asset('img/default_avatar.jpg')}}" class="img-thumbnail" alt="...">
            </div>
            <div class="col-12 col-md-8 col-lg-10 p-3">
                <div>
                    <h5 class="card-title">{{($user->first_name)}} {{($user->last_name)}}</h5>
                    <p class="card-text">{{($user->email)}}</p>
                    <p class="card-text">{{$user->role->name}}</p>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection