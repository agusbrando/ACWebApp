@extends('base')

@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet" type="text/css" />

    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <div class="d-flex flex-row">
                <a href="{{ url()->previous() }}" class="my-auto mx-1 h5"><i class="fas fa-arrow-left"></i></a>
                <h3> Ver rol</h3>
            </div>
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
                </div>
            </div>

        </div>
    </div>
</main>
@endsection