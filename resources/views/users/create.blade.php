@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Nuevo Usuario</h3>
            <form action="{{ route('users.store')}}" method="POST">
                @method('POST')
                <div class="col-12">
                    <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
                    @csrf
                    <a class="btn btn-outline-warning float-right" href="{{ route('users.index')}}" tabindex="-1" aria-disabled="true">Cancelar</a>
                </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-12 col-md-4 col-lg-2 p-3">
                <img src="{{asset('img/default_avatar.jpg')}}" class="img-thumbnail" alt="...">
            </div>
            <div class="col-12 col-md-8 col-lg-10 p-3">
                <div>
                    <fieldset>
                        <div class="form-group">
                            <label for="first_name">Nombre</label>
                            <input value="" name="first_name" id="first_name" type="text" class="@error('first_name') is-invalid @enderror form-control">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Apellidos</label>
                            <input value="" name="last_name" id="last_name" type="text" class="@error('last_name') is-invalid @enderror form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input value="" name="email" id="email" type="text" class="@error('email') is-invalid @enderror form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Contraseña') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- CONFIRM PASSWORD -->
                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirmar contraseña') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <label for="role">Rol</label>
                            <select name="role" id="role" class="form-control">
                                @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
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