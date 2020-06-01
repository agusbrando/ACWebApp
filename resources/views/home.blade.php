@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <link href="{{asset('css/home.css')}}" rel="stylesheet" type="text/css"/>
  <div class="card shadow">
  @if(in_array('Crear_post', Session::get('user_permissions')))
    <div class="card-header row m-0 justify-content-between">
      <a href="#" class="m-19 w-100 btn btn-outline-primary">Publicar</a>
    @endif
    </div>
  </div>
  </br>
  @foreach($posts as $post)
    <div class="card shadow">
      <div class="card-header justify-content-between">
        <div>
          <img class="float-left" src="{{asset('img/foto.png')}}" alt="" width="35" height="35">
          <p class="font-weight-bold">{{$post->user->first_name}} {{$post->user->last_name}}</p>
          <p>{{$post->created_at}}</p>
        </div>
        <div class="text-center">
          <h4>{{$post->title}}</h4>
        </div>
      </div>
      <div class="card-body row no-gutters">
        <img src="{{asset('img/dinantia1.png')}}" alt="" class="d-block w-50 mx-auto">
      </div>
      <div class="card-body row no-gutters">
        <p class="text-justify d-block w-50 mx-auto">{{$post->text}}</p>
      </div>
      <div class="card-body row no-gutters">
        <p class="text-justify d-block w-50 mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      </hr>
      <div class="card-footer col-12">
        <div>
          <img class="float-left" src="{{asset('img/corazon.png')}}" alt="" width="25" height="25">
          <p class="float-left">0</p>
          <p class="float-right">{{count($post->comments)}} Comentarios</p>
        </div>
        </br>
        <div>
          <textarea class="w94 border-0">Añadir un comentario</textarea>
          <a href="#" class="w-6 float-right btn btn-danger">Enviar</a>
        </div>
        </br>
        <div>
          @foreach($comments as $comment)
            <img class="float-left" src="{{asset('img/usuarioDinantia.png')}}" alt="" width="35" height="35">
            <div class="card-header justify-content-between">
              <div>
                <div>
                  <p class="float-left font-weight-bold">{{$comment->user->first_name}} {{$comment->user->last_name}}</p>
                  <p class="float-right">{{$comment->created_at}}</p>
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
