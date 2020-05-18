@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <br>
    <form action="{{ route('events.update',$event->id)}}" method="POST">
        @method('PATCH')
        @csrf
        <div class="card shadow">
            <div class="card-header bg-dark text-light row m-0 justify-content-between">
                <div class="row">
                    <a href="{{ route('events.show',$event->id)}}" class="my-auto mx-1 h5"><i class="fas fa-arrow-left ml-1"></i></a>
                    <h3 class="mt-1">Detalles Evento</h3>
                </div>


                <div>
                    <div class="col-12">
                        <input class="btn btn-outline-success float-right ml-1 mt-1" type='submit' value="Guardar">
                        <a class="btn btn-outline-warning float-right mt-1 mr-1" href="{{ route('events.show',$event->id)}}" tabindex="-1" aria-disabled="true">Cancelar</a>
                    </div>
                </div>

            </div>
            <div class="card-body row no-gutters">
                <div class="col-12 col-md-4 col-lg-2 p-3">
                    <img src="{{asset('img/default_event.jpg')}}" class="img-thumbnail" alt="...">
                </div>
                <div class="col-12 col-md-8 col-lg-10 p-3">
                    <div>
                        <fieldset>
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input value="{{$event->title}}" name="titulo" id="titulo" type="text" class="@error('titulo') is-invalid @enderror form-control">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea id="descripcion" name="descripcion" type="text" rows="3" maxlength="30" style="resize:none;" class="@error('descripcion') is-invalid @enderror form-control">{{$event->description }}</textarea>
                            </div>
                        </fieldset>
                        @error('email', 'login')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
@endsection