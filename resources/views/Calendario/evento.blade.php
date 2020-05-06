@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

  <!-- <div class="container-fluid">
    <img class="card-img-top" src="holder.js/100px180/" alt="">
  </div>
  <p class="lead">
    <div class="d-flex flex-row">
      <a href="/calendar" class=" atras mt-3 mr-3"><i class="fas fa-arrow-left"></i></a>
      <h1 class="display-4 pr-3">Detalles Evento</h1>
    </div>
    <hr>
    <div class="text-center">
      <div class="calendar">
        <div class="col-md-12">
          <div class="row border-right-0 border-top-0 border-bottom-0 col-12 w-100">

            <div class="col-md-4 bg-light border-left border-right p-0">
              <div id="espacio" class="bg-dark w-100">
                <h3>Título</h3>
              </div>
              <br>
              <div id="buttons">
                {{ $event->title }}
              </div>
              <br>
            </div>

            <div class="col-md-4 bg-light border-left border-right p-0 ">
              <div id="espacio" class="bg-dark w-100">
                <h3>Descripción</h3>
              </div>
              <br>
              <div id="buttons">
                {{ $event->description }}
              </div>
            </div>

            <div class="col-md-4 bg-light border-left border-right p-0 ">
              <div id="espacio" class="bg-dark w-100">
                <h3>Fecha</h3>
              </div>
              <br>
              <div id="buttons">
                {{ $event->date }}
              </div>
            </div>
             <div class="col-md-3 bg-light border-left border-right p-0 ">
              <div id="espacio" class="bg-dark w-100">
                <h3>Opciones</h3>
              </div>
              <br>
              <div id="buttons">
                
              </div>
            </div>

          </div>
        </div>
        <br />
       
      </div>
      </div>
      <div class="from-group text-center">
        <form action="{{ asset('/event/update')}}/{{ $event->id }}" method="put"  class="text-center">
            <button id="edit" class="btn btn-primary" data-toggle="modal" data-target="#formModal" type="submit">Editar</button>
        </form>
          <button id="delete" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Eliminar</button>
      </div>
    </div>
    <div class="from-group text-center">
      <a id="edit" href="/editarEvento/{{ $event->id }}" class="btn btn-primary" type="submit">Editar</a>
      <button id="delete" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Eliminar</button>
    </div>

    </div> -->

    


      <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
          <h3>Detalles Evento</h3>
          <div>

            <a class="btn btn-outline-info" href="{{ route('events.showedit',$event->id)}}">Editar</a>
            <form class="float-right" action="{{ route('events.destroy',$event->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-danger ml-1">Eliminar</button>
            </form>

          </div>
        </div>
        <div class="card-body row no-gutters">
          <div class="col-12 col-md-4 col-lg-2 p-3">
            <img src="{{asset('img/default_event.jpg')}}" class="img-thumbnail" alt="...">
          </div>
          <div class="col-12 col-md-8 col-lg-10 p-3">
            @if(!$edit)
            <div>
              <h5 class="card-title">{{($event->title)}}</h5>
              <p class="card-text">{{($event->date)}}</p>
              <p class="card-text">{{($event->description)}}</p>
            </div>
            @else
            <div>
              <form action="{{ route('events.update',$event->id)}}" method="POST">
                @method('PATCH')
                <fieldset>
                  <div class="form-group">
                    <label for="title">Título</label>
                    <input value="{{$event->title}}" name="title" id="title" type="text" class="@error('first_name') is-invalid @enderror form-control">
                  </div>
                  <div class="form-group">
                    <label for="date">Fecha</label>
                    <input value="{{$event->date}}" name="date" id="date" type="text" class="@error('last_name') is-invalid @enderror form-control">
                  </div>
                  <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea value="{{$event->description}}" id="description" type="text" rows="3" maxlength="30" style="resize:none;" class="@error('email') is-invalid @enderror form-control" name="description"></textarea>
                  </div>
                </fieldset>
                @error('email', 'login')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
          </div>
        </div>
        <div class=" card-footer col-12">
          <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
          <a class="btn btn-outline-warning float-right" href="{{ route('events.show',$event->id)}}" tabindex="-1" aria-disabled="true">Cancelar</a>

        </div>
        </form>
        @endif
      </div>

    </main>

    <!-- Modal Delete -->

    <!--     <div class="modal" tabindex="-1" role="dialog" id="deleteModal">
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
            <form action="{{ url('/detallesEvento/delete/'.$event->id) }}" method="get">
              <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
 -->


@endsection