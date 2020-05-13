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
  <div class="card shadow">
    <div class="card-header row m-0 justify-content-between">
      <a style="margin: 19px; width: 100%;" href="#" class="btn btn-outline-primary">Publicar</a>
    </div>
    </br>
    <div style="display: block; margin-left: auto; margin-right: auto; width: 70%;">
      <img style="float: left;" src="{{asset('img/foto.png')}}" alt="" width="35" height="35">
      <p style="font-weight: bold; float: left;">Adrián Pérez</p>
      <p>12/05 11:27</p>
      <h4 style="text-align: center;">¿Cómo orientar profesionalmente a tu hijo?</h4>
    </div>
    <div class="card-body row no-gutters">
      <img src="{{asset('img/dinantia1.png')}}" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 50%;">
    </div>
    <div class="card-body row no-gutters">
      <p style="text-align: justify; display: block; margin-left: auto; margin-right: auto; width: 50%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat.</p>
    </div>
    </hr>
    <div class="card-footer col-12">
      <div>
        <img style="float: left;" src="{{asset('img/corazon.png')}}" alt="" width="25" height="25">
        <p style="float: left;">0</p>
        <p style="float: right;">X Comentarios</p>
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
    <div style="display: block; margin-left: auto; margin-right: auto; width: 70%;">
      <img style="float: left;" src="{{asset('img/foto.png')}}" alt="" width="35" height="35">
      <p style="font-weight: bold; float: left;">Adrián Pérez</p>
      <p>12/05 11:43</p>
      <h4 style="text-align: center;">Ponencia ESIC</h4>
    </div>
    <div class="card-body row no-gutters">
      <img src="{{asset('img/dinantia2.png')}}" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 50%;">
    </div>
    <div class="card-body row no-gutters">
      <p style="text-align: justify; display: block; margin-left: auto; margin-right: auto; width: 50%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat.</p>
    </div>
    </hr>
    <div class="card-footer col-12">
      <div>
        <img style="float: left;" src="{{asset('img/corazon.png')}}" alt="" width="25" height="25">
        <p style="float: left;">0</p>
        <p style="float: right;">X Comentarios</p>
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
    <div style="display: block; margin-left: auto; margin-right: auto; width: 70%;">
      <img style="float: left;" src="{{asset('img/foto.png')}}" alt="" width="35" height="35">
      <p style="font-weight: bold; float: left;">Adrián Pérez</p>
      <p>12/05 13:40</p>
      <h4 style="text-align: center;">Acceso a Dinantia desde Ordenador</h4>
    </div>
    <div class="card-body row no-gutters">
      <img src="{{asset('img/dinantia3.png')}}" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 50%;">
    </div>
    <div class="card-body row no-gutters">
      <p style="text-align: justify; display: block; margin-left: auto; margin-right: auto; width: 50%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat.</p>
    </div>
    </hr>
    <div class="card-footer col-12">
      <div>
        <img style="float: left;" src="{{asset('img/corazon.png')}}" alt="" width="25" height="25">
        <p style="float: left;">0</p>
        <p style="float: right;">X Comentarios</p>
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