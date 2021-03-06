@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Nuevo Tipo</h3>
            <form action="{{ route('types.store')}}" method="POST">
                @method('POST')
                @csrf
                <div class="col-12">
                    <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
                    <a class="btn btn-outline-warning float-right" href="{{ route('types.index')}}" tabindex="-1" aria-disabled="true">Cancelar</a>
                </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-12 col-md-4 col-lg-2 p-3">
                <img src="{{asset('img/default_type.png')}}" class="img-thumbnail" alt="...">
            </div>
            <div class="col-12 col-md-8 col-lg-10 p-3">
                <div>
                    <fieldset>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input value="" name="name" id="name" type="text" class="@error('name') is-invalid @enderror form-control">
                        </div>
                        <div class="form-group">
                            <label for="model">Model</label>
                            <select name="model" id="model" class="form-control @error('model') is-invalid @enderror">
                                @foreach($types as $type)
                                <option value="{{$type->model}}">{{$type->model}}</option>
                                @endforeach
                            </select>
                        </div>

                    </fieldset>
                    @error('email', 'login')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</main>
@endsection