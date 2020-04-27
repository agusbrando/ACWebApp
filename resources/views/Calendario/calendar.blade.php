@extends('base')

@section('main')
<link href="{{ asset('css/calendar.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class=" col-md-10 ml-sm-auto col-lg-10">

  <div class="space"></div>
  <p class="lead">
  <h1 class="display-4 pr-3">Calendario</h1>
  <br>
  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#formModal">
    Crear un evento
  </button>
  <hr>
  <br>
  <div class="calendar">
      <div class="row d-flex justify-content-center">
        
      <form>
        <div class="row border-right-0 border-top-0 border-bottom-0 col-12 col-md-4 w-100">
          <div class="col-12 p-0" style="overflow:hidden;">
            <div class="form-group">
              <div class="row">
                <div class="col-12">
                  <input class="form-control" type="date" value="2020-04-270" id="date" name="date">
                  <!-- <div id="datetimepicker13"></div> -->
                </div>
              </div>
            </div>
            <!-- <script type="text/javascript">
              $(function() {
                $('#datetimepicker13').datetimepicker({
                  inline: true,
                  sideBySide: false
                });
              });
            </script> -->
          </div>
        </div>
            
        <div class="col-md-2 bg-light border-right p-0 border-primary">
          <div id="espacio" class="bg-primary w-100"></div>
          <h3>Eventos</h3>
          <div id="buttons">
            @foreach($types as $type)
            <a href="/calendarTime/{{ $type->id }}" class="btn btn-primary btn-block">{{ $type->name }}</a>
            @endforeach
          </div>
        </div>

      </form>

        <div class="col-md-2 bg-light border-left p-0 border-primary">
          <div id="espacio" class="bg-primary w-100"></div>
          <h3>Horas</h3>
          <div id="buttons">
           @foreach($sessions as $session)
            <button type="button" class="btn btn-primary btn-block">{{ $session->time_start }}</button>
            @endforeach
          </div>
        </div>
      </div>
  </div> <!-- /container -->


  <!-- Modal Form -->
  <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir Evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <div class="modal-body">
          <div class="container">
            <p class="lead">
              @if (count($errors) > 0)
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
              </div>
              @endif


              <div class="col-md-12">
                <form action="{{ asset('/event/store') }}" method="post">
                  @csrf
                  <div class="fomr-group">
                    <label>Titulo</label>
                    <input type="text" class="form-control" name="titulo">
                  </div>
                  <div class="fomr-group">
                    <label>Descripcion del Evento</label>
                    <input type="text" class="form-control" name="descripcion">
                  </div>
                  <div class="fomr-group">
                    <label>Fecha</label>
                    <input type="date" class="form-control" name="fecha">
                  </div>
                  <br>
                  <input type="submit" class="btn btn-info" value="Guardar">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>
@endsection