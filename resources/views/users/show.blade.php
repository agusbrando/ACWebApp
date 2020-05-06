@extends('base')

@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet" type="text/css" />

    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Perfil de usuario</h3>
            <div>

                <a class="btn btn-outline-info" href="{{ route('users.showedit',$user->id)}}">Editar</a>
                <form class="float-right"action="{{ route('users.destroy',$user->id)}}" method="POST">
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
                @if(!$edit)
                <div>
                    <h5 class="card-title">{{($user->first_name)}} {{($user->last_name)}}</h5>
                    <p class="card-text">{{($user->email)}}</p>
                    <p class="card-text">{{($user->role_id)}}</p>
                </div>
                @else
                <div>
                    <form action="{{ route('users.update',$user->id)}}" method="POST">
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
                                    @foreach($roles as $role)   
                                    <option value="{{$role->id}}" {{$user->role_id == $role->id ? 'selected' : ''}}>{{$role->name}}</option>
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
        <div class=" card-footer col-12">
            <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
            <a class="btn btn-outline-warning float-right" href="{{ route('users.show',$user->id)}}" tabindex="-1" aria-disabled="true">Cancelar</a>

        </div>
        </form>
        @endif
    </div>

</main>
@endsection


<!-- Rutas -->

<!-- Route::resource('users','UserController');
Route::get('users/edit/{id}',['as' => 'users.showedit', 'uses' => 'UserController@show']); -->

<!-- Controller -->

<!-- public function show($user_id)
    {
        $user = User::find($user_id);
        $edit = false;
        if(URL::current() == url("/users/edit/".$user_id)){
            $edit = true;
        }
        return view('users.show', compact('user','edit'));
    } -->
<!-- Import de URL -->
<!-- use Illuminate\Support\Facades\URL; -->
<!--  -->