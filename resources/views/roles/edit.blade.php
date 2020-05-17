@extends('base')

@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet" type="text/css" />

    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <div class="d-flex flex-row">
                <a href="{{ url()->previous() }}"class="my-auto mx-1 h5"><i class="fas fa-arrow-left"></i></a>
                <h3> Editar rol</h3>
            </div>
            <form action="{{ route('roles.update',$role->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div>
                    <div class="col-12">
                        <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
                        <a class="btn btn-outline-warning float-right" href="{{ route('roles.show',$role->id)}}" tabindex="-1" aria-disabled="true">Cancelar</a>
                    </div>
                </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-12 col-md-8 col-lg-10 p-3">
                <div>
                    <fieldset>
                        <div class="form-group">
                            <label for="name">Nombre rol</label>
                            <input value="{{$role->name}}" name="name" id="name" type="text" class="@error('name') is-invalid @enderror form-control">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input value="{{$role->slug}}" name="slug" id="slug" type="text" class="@error('slug') is-invalid @enderror form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <input value="{{$role->description}}" name="description" id="description" type="text" class="@error('description') is-invalid @enderror form-control">
                        </div>
                        <div class="form-group">
                            <label for="level">Nivel</label>
                            <input value="{{$role->level}}" readonly name="level" id="level" type="text" class="@error('level') is-invalid @enderror form-control">
                        </div>
                    </fieldset>
                    @error('email', 'login')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        </form>
    </div>
</main>
@endsection