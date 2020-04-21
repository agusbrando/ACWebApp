@extends('base')

@section('main')
<main role="main" class=" col-md-10 ml-sm-auto col-lg-10">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/calendar">Calendario</a></li>
      <li class="breadcrumb-item active" aria-current="page">Detalles Evento</li>
    </ol>
  </nav>

  <div class="container-fluid">
    <img class="card-img-top" src="holder.js/100px180/" alt="">    
  </div>
    <p class="lead">
      <div class="d-flex flex-row">
        <a href="/calendar" class=" atras mt-3 mr-3"><i class="fas fa-arrow-left"></i></a>
        <h1 class="display-4 pr-3">Detalles Evento</h1>
      </div>
      <hr>
      <div class=" card col-md-12 text-center">
        <form action="{{ asset('/event/update')}}/{{ $event->id }}" method="put">
          <div class="fomr-group">
            <h4><b>Titulo</b></h4>
            {{ $event->title }}
            <br />
          </div>
          <div class="fomr-group">
            <h4><b>Descripción</b></h4>
            {{ $event->description }}
            <br />
          </div>
          <div class="fomr-group">
            <h4><b>Fecha</b></h4>
            {{ $event->date }}
            <br />
          </div>
        </form>
        <br />
        <div class="from-group">
          <button class="btn btn-primary" data-toggle="modal" data-target="#formModal" type="submit">Editar</button>
          <button class="btn btn-outline-danger" type="submit" data-toggle="modal" data-target="#deleteModal">Eliminar</button>
        </div>
      </div>
  </div>
  

  <!-- Modal Edit Form -->
  <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Evento</h5>
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

  <!-- Modal Delete -->

  <div class="modal" tabindex="-1" role="dialog" id="deleteModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>¿Esta usted seguro que quieres eliminar este evento?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Eliminar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

</main>

@endsection