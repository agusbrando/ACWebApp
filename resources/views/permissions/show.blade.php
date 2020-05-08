@extends('base')

@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet" type="text/css" />

    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Perfil de permiso</h3>
            <div>

                <a class="btn btn-outline-info" href="{{ route('permissions.edit',$permissions->id)}}">Editar</a>
                <form class="float-right" action="{{ route('permissions.destroy',$permissions->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger ml-1">Eliminar</button>
                </form>

            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-12 col-md-8 col-lg-10 p-3">
                <div>
                    <h5 class="card-title">{{($permissions->name)}} {{($permissions->slug)}}</h5>
                    <p class="card-text">{{($permissions->description)}}</p>
                    <p class="card-text">{{($permissions->model)}}</p>
                </div>
            </div>
            
        </div>
    </div>
</main>
@endsection
                