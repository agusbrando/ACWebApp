@extends('base')

@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet" type="text/css" />

    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Perfil de permiso</h3>
            <div>

                <a class="btn btn-outline-info" href="{{ route('roles.edit',$role->id)}}">Editar</a>
                <form class="float-right" action="{{ route('roles.destroy',$role->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger ml-1">Eliminar</button>
                </form>

            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-12 col-md-8 col-lg-10 p-3">
                <div>
                    <h4 class="card-title">{{($role->name)}} </h4>
                    <h5 class="card-title">Slug: {{($role->slug)}}</h5>
                    <p class="card-text">Descripción: {{($role->description)}}</p>
                    <p class="card-text">Nivel: {{($role->level)}}</p>
                </div>
            </div>
            
        </div>
    </div>
</main>
@endsection
                