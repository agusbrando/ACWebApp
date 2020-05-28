@extends('base')

@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <link href="{{ asset('css/posts.css') }}" rel="stylesheet" type="text/css" />

    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <a href="/posts" class="my-auto mx-2 h5"><i class="fas fa-arrow-left"></i></a>
            <h3>Editar Post</h3>
            <form action="{{ route('posts.update',$post->id)}}" method="POST">
                @method('PATCH')
                @if(in_array('Modificar_post', Session::get('user_permissions')))
                <div>
                    <div class="col-12">
                        <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
                        <a class="btn btn-outline-warning float-right" href="{{ route('posts.show',$post->id)}}" tabindex="-1" aria-disabled="true">Cancelar</a>
                    </div>
                </div>
                @endif
        </div>
        <div class="card-body row no-gutters">
            <div class="col-12 col-md-4 col-lg-2 p-3">
                <img src="{{asset('img/default_post.jpg')}}" class="img-thumbnail" alt="...">
            </div>
            <div class="col-12 col-md-8 col-lg-10 p-3">
                <div>

                    <fieldset>
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input value="{{$post->title}}" name="title" id="title" type="text" class="@error('title') is-invalid @enderror form-control">
                        </div>
                        <div class="form-group">
                            <label for="text">Texto</label>
                            <input value="{{$post->text}}" name="text" id="text" type="text" class="@error('text') is-invalid @enderror form-control">
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