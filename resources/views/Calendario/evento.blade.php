@extends('base')

@section('main')
<main role="main" class="inicio col-md-9 ml-sm-auto col-lg-10 px-4">

<div class="container">
      <div class="first"></div>
      <p class="lead">
      <h3>Evento</h3>
      <p>Detalles de evento</p>
      <a class="btn btn-default"  href="{{ asset('/calendar') }}">Atras</a>
      <hr>



      <div class="col-md-6">
        <form action="{{ asset('/create/') }}" method="post">
          <div class="fomr-group">
            <h4>Titulo</h4>
            {{ $event->title }}
          </div>
          <div class="fomr-group">
            <h4>Descripcion del Evento</h4>
            {{ $event->description }}
          </div>
          <div class="fomr-group">
            <h4>Fecha</h4>
            {{ $event->date }}
          </div>
          <br>
          <input type="submit" class="btn btn-info" value="Guardar">
        </form>
      </div>


      <!-- inicio de semana -->


    </div> <!-- /container -->

</main>

@endsection
