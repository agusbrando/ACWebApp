@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="card shadow">
    <div class="card-header row m-0 justify-content-between">
      <a style="margin: 19px; width: 100%;" href="#" class="btn btn-outline-primary">Publicar</a>
    </div>
    </br>
    <div>
      <div>
        <img style="float: left;" src="{{asset('img/foto.png')}}" alt="" width="35" height="35">
        @foreach($users as $user)
          @if($user->id==1)
            <p style="font-weight: bold; float: left;">{{$user->first_name}} {{$user->last_name}}</p>
          @endif
        @endforeach
        @foreach($posts as $post)
          @if($post->id==1)
            <h4 style="text-align: center;">{{$post->title}}</h4>
          @endif
        @endforeach
      </div>
      <div>
        @foreach($posts as $post)
          @if($post->id==1)
            <p>{{$post->created_at}}</p>
          @endif
        @endforeach
      </div>
    </div>
    <div class="card-body row no-gutters">
      <img src="{{asset('img/dinantia1.png')}}" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 50%;">
    </div>
    <div class="card-body row no-gutters">
      @foreach($posts as $post)
        @if($post->id==1)
          <p style="text-align: justify; display: block; margin-left: auto; margin-right: auto; width: 50%;">{{$post->text}}</p>
        @endif
      @endforeach
    </div>
    </hr>
    <div class="card-footer col-12">
      <div>
        <img style="float: left;" src="{{asset('img/corazon.png')}}" alt="" width="25" height="25">
        <p style="float: left;">0</p>
        <p style="float: right;">1 Comentarios</p>
      </div>
      </br>
      <div>
        <textarea style="width: 94%; border: none;">Añadir un comentario</textarea>
        <a style="width: 6%; float: right;" href="#" class="btn btn-danger">Enviar</a>
      </div>
    </div>
  </div>
  </br>
  <div class="card shadow">
    </br>
    <div>
      <div>
        <img style="float: left;" src="{{asset('img/foto.png')}}" alt="" width="35" height="35">
        @foreach($users as $user)
          @if($user->id==2)
            <p style="font-weight: bold; float: left;">{{$user->first_name}} {{$user->last_name}}</p>
          @endif
        @endforeach
        @foreach($posts as $post)
          @if($post->id==2)
            <h4 style="text-align: center;">{{$post->title}}</h4>
          @endif
        @endforeach
      </div>
      <div>
        @foreach($posts as $post)
          @if($post->id==2)
            <p>{{$post->created_at}}</p>
          @endif
        @endforeach
      </div>
    </div>
    <div class="card-body row no-gutters">
      <img src="{{asset('img/dinantia4.png')}}" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 50%;">
    </div>
    <div class="card-body row no-gutters">
      @foreach($posts as $post)
        @if($post->id==2)
          <p style="text-align: justify; display: block; margin-left: auto; margin-right: auto; width: 50%;">{{$post->text}}</p>
        @endif
      @endforeach
    </div>
    </hr>
    <div class="card-footer col-12">
      <div>
        <img style="float: left;" src="{{asset('img/corazon.png')}}" alt="" width="25" height="25">
        <p style="float: left;">0</p>
        <p style="float: right;">1 Comentarios</p>
      </div>
      </br>
      <div>
        <textarea style="width: 94%; border: none;">Añadir un comentario</textarea>
        <a style="width: 6%; float: right;" href="#" class="btn btn-danger">Enviar</a>
      </div>
    </div>
  </div>
  </br>
  <div class="card shadow">
    </br>
    <div>
      <div>
        <img style="float: left;" src="{{asset('img/foto.png')}}" alt="" width="35" height="35">
        @foreach($users as $user)
          @if($user->id==3)
            <p style="font-weight: bold; float: left;">{{$user->first_name}} {{$user->last_name}}</p>
          @endif
        @endforeach
        @foreach($posts as $post)
          @if($post->id==3)
            <h4 style="text-align: center;">{{$post->title}}</h4>
          @endif
        @endforeach
      </div>
      <div>
        @foreach($posts as $post)
          @if($post->id==3)
            <p>{{$post->created_at}}</p>
          @endif
        @endforeach
      </div>
    </div>
    <div class="card-body row no-gutters">
      <img src="{{asset('img/dinantia3.png')}}" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 50%;">
    </div>
    <div class="card-body row no-gutters">
      @foreach($posts as $post)
        @if($post->id==3)
          <p style="text-align: justify; display: block; margin-left: auto; margin-right: auto; width: 50%;">{{$post->text}}</p>
        @endif
      @endforeach
    </div>
    </hr>
    <div class="card-footer col-12">
      <div>
        <img style="float: left;" src="{{asset('img/corazon.png')}}" alt="" width="25" height="25">
        <p style="float: left;">0</p>
        <p style="float: right;">1 Comentarios</p>
      </div>
      </br>
      <div>
        <textarea style="width: 94%; border: none;">Añadir un comentario</textarea>
        <a style="width: 6%; float: right;" href="#" class="btn btn-danger">Enviar</a>
      </div>
    </div>
  </div>
</main>
@endsection