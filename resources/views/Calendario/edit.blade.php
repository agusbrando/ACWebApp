@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <br>
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Detalles Evento</h3>
            <form action="{{ route('events.update',$event->id)}}" method="POST">
                @method('PATCH')
                <div>
                    <div class="col-12">
                        <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
                        {{ csrf_field() }}
                        <a class="btn btn-outline-warning float-right" href="{{ route('events.show',$event->id)}}" tabindex="-1" aria-disabled="true">Cancelar</a>
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
                            <label for="title">Título</label>
                            <input value="{{$titulo}}" name="title" id="title" type="text" class="@error('first_name') is-invalid @enderror form-control">
                        </div>
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input value="{{$event->date}}" name="date" id="date" type="text" class="@error('last_name') is-invalid @enderror form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea id="description" type="text" rows="3" maxlength="30" style="resize:none;" class="@error('description') is-invalid @enderror form-control" name="description">{{ $descripcion }}</textarea>
                        </div>
                    </fieldset>
                    @error('email', 'login')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        </form>
    </div>
</main>
@endsection