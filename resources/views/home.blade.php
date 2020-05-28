@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <link href="{{asset('css/home.css')}}" rel="stylesheet" type="text/css"/>
  <div class="card shadow">
    <div class="card-header row m-0 justify-content-between">
    @if(Session::get('user_role')!= 'Alumno'&&'User'&&'Unverified')
      <a href="#" class="publicar btn btn-outline-primary">Publicar</a>
    @endif
    </div>
  </div>
  </br>
  @foreach($posts as $post)
    <div class="card shadow">
      <div>
        <div>
          <img class="izquierda" src="{{asset('img/foto.png')}}" alt="" width="35" height="35">
          <p class="negrita">{{$post->user->first_name}} {{$post->user->last_name}}</p>
          <h4 class="centrado">{{$post->title}}</h4>
        </div>
        <div>
          <p>{{$post->created_at}}</p>
        </div>
      </div>
      <div class="card-body row no-gutters">
        <img src="{{asset('img/dinantia1.png')}}" alt="" class="imagenPost">
      </div>
      <div class="card-body row no-gutters">
        <p class="justificado">{{$post->text}}</p>
      </div>
      <div class="card-body row no-gutters">
        <p class="justificado">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      </hr>
      <div class="card-footer col-12">
        <div>
          <img class="izquierda" src="{{asset('img/corazon.png')}}" alt="" width="25" height="25">
          <p class="izquierda">0</p>
          <p class="derecha">{{count($post->comments)}} Comentarios</p>
        </div>
        </br>
        <div>
          <textarea class="estiloTextarea">Añadir un comentario</textarea>
          <a href="#" class="enviar btn btn-danger">Enviar</a>
        </div>
        </br>
        <div>
          @foreach($comments as $comment)
            <img class="izquierda" src="{{asset('img/usuarioDinantia.png')}}" alt="" width="35" height="35">
            <div class="card-header row m-0 justify-content-between">
              <div>
                <div>
                  <p class="usuarioComentarios">{{$comment->user->first_name}} {{$comment->user->last_name}}</p>
                  <p class="derecha">{{$comment->created_at}}</p>
                </div>
                </br>
                <div>
                  <p>{{$comment->text}}</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
              </div>
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