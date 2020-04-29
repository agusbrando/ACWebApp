@extends('base')

@section('login')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Muro</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Has iniciado sesion
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="row">
    <div class="col-sm-12">
      <div>
        <a style="margin: 19px;" href="#" class="btn btn-primary">Muro</a>
        <a style="margin: 19px;" href="#" class="btn btn-primary">Publicar</a>
        <a style="margin: 19px;" href="{{route('posts.index')}}" class="btn btn-primary">Admin</a>
      </div>
      <br/>
      <div>
        <img src="{{asset('img/foto.png')}}" alt="" width="51" height="51" style="float:left;">
        <h4>Prueba de welcome</h4>
      </div>
      <br/>
      <img src="{{asset('img/dinantia.png')}}" alt="">
      <p style="text-align:justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat.</p>
      <div>
        <textarea style="width:56%">Añadir un comentario</textarea>
        <button style="width:10%;" class="btn btn-danger">Enviar</button>
      </div>
      <a href="{{route('comments.create')}}" class="btn btn-primary">Nuevo Comentario</a>
    </div>
  </div>
</main>
@endsection