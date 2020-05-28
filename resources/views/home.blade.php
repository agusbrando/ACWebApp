@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="card shadow">
    <div class="card-header row m-0 justify-content-between">
    @if(Session::get('user_role')!= 'Alumno'&&'User'&&'Unverified')
      <a style="margin: 19px; width: 100%;" href="#" class="btn btn-outline-primary">Publicar</a>
    @endif
    </div>
  </div>
  </br>
  @foreach($posts as $post)
    <div class="card shadow">
      <div>
        <div>
          <img style="float: left;" src="{{asset('img/foto.png')}}" alt="" width="35" height="35">
          <p style="font-weight: bold;">{{$post->user->first_name}} {{$post->user->last_name}}</p>
          <h4 style="text-align: center;">{{$post->title}}</h4>
        </div>
        <div>
          <p>{{$post->created_at}}</p>
        </div>
      </div>
      <div class="card-body row no-gutters">
        <img src="{{asset('img/dinantia1.png')}}" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 50%;">
      </div>
      <div class="card-body row no-gutters">
        <p style="text-align: justify; display: block; margin-left: auto; margin-right: auto; width: 50%;">{{$post->text}}</p>
      </div>
      <div class="card-body row no-gutters">
        <p style="text-align: justify; display: block; margin-left: auto; margin-right: auto; width: 50%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      </hr>
      <div class="card-footer col-12">
        <div>
          <img style="float: left;" src="{{asset('img/corazon.png')}}" alt="" width="25" height="25">
          <p style="float: left;">0</p>
          <p style="float: right;">{{count($post->comments)}} Comentarios</p>
        </div>
        </br>
        <div>
          <textarea style="width: 94%; border: none;">Añadir un comentario</textarea>
          <a style="width: 6%; float: right;" href="#" class="btn btn-danger">Enviar</a>
        </div>
        </br>
        <div>
          @foreach($comments as $comment)
            <img style="float: left;" src="{{asset('img/usuarioDinantia.png')}}" alt="" width="35" height="35">
            <div class="card-header row m-0 justify-content-between">
              <div>
                <p style="font-weight: bold;">{{$comment->user->first_name}} {{$comment->user->last_name}}</p>
                <p>{{$comment->text}}</p>
              </div>
              <p style="float: right;">{{$comment->created_at}}</p>
            </div>
            </br>
          @endforeach
        </div>
      </div>
    </div>
    </br>
  @endforeach
</main>
@endsection