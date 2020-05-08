@extends('base')

@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Detalles Sesiones</h3>
            <form action="{{ route('sessions.update',$session->id)}}" method="POST">
                @method('PATCH')
                <div>
                    <div class="col-12">
                        <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
                        @csrf
                        <a class="btn btn-outline-warning float-right" href="{{ route('sessions.show',$session->id)}}" tabindex="-1" aria-disabled="true">Cancelar</a>
                    </div>
                </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-12 col-md-4 col-lg-2 p-3">
                <img src="{{asset('img/default_session.jpg')}}" class="img-thumbnail" alt="...">
            </div>
            <div class="col-12 col-md-8 col-lg-10 p-3">
                <div>

                    <fieldset>
                        <div class="form-group">
                            <label for="classromm_id">Classroom_id</label>
                            <input value="{{$session->classromm_id}}" name="classromm_id" id="classromm_id" type="text" class="@error('classromm_id') is-invalid @enderror form-control">
                        </div>
                        <div class="form-group">
                            <label for="type_id">Type_id</label>
                            <input value="{{$session->type_id}}" name="type_id" id="type_id" type="text" class="@error('type_id') is-invalid @enderror form-control">
                        </div>
                        <div class="form-group">
                            <label for="day">Dia</label>
                            <input value="{{$session->day}}" name="day" id="day" type="text" class="@error('day') is-invalid @enderror form-control">
                        </div>     
                        <div class="form-group">
                            <label for="time_start">Hora de Inicio</label>
                            <input value="{{$session->time_start}}" name="time_start" id="time_start" type="text" class="@error('time_start') is-invalid @enderror form-control">
                            
                        </div>  
                        <div class="form-group">
                            <label for="time_end">Hora de Fin</label>
                            <input value="{{$session->time_end}}" name="time_end" id="time_end" type="text" class="@error('time_end') is-invalid @enderror form-control">
                            
                            

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