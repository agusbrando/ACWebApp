@extends('base')

@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet" type="text/css" />

    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Editar permiso</h3>
            <form action="{{ route('permissions.update',$permissions->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div>
                    <div class="col-12">
                        <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
                        <a class="btn btn-outline-warning float-right" href="{{ route('permissions.show',$permissions->id)}}" tabindex="-1" aria-disabled="true">Cancelar</a>
                    </div>
                </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-12 col-md-8 col-lg-10 p-3">
                <div>
                    <fieldset>
                        <div class="form-group">
                            <label for="name">Nombre permiso</label>
                            <input value="{{$permissions->name}}" name="name" id="name" type="text" class="@error('name') is-invalid @enderror form-control">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input value="{{$permissions->slug}}" name="slug" id="slug" type="text" class="@error('slug') is-invalid @enderror form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <input value="{{$permissions->description}}" name="description" id="description" type="text" class="@error('description') is-invalid @enderror form-control">
                        </div>
                        <div class="form-group">
                            <label for="model">Modelo</label>
                            <input value="{{$permissions->model}}" readonly name="model" id="model" type="text" class="@error('model') is-invalid @enderror form-control">
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