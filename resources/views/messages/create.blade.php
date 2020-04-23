@extends('base')
@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-4 mb-0">Mensajes</h1>


            <form method="post" action="{{route('messages.store')}}">
                @csrf

                <div class="form-group">
                <label for="Porcentaje">Evaluaciones</label>
                <select class="selectpicker w-100" title="Selecciona correos" multiple data-actions-box="true" name="users[]">
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->email}}</option>
                    @endforeach
                </select>
            </div>

                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="text">Texto</label>
                    <textarea class="form-control" id="text" rows="3" name="text"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            <a href="{{ route('messages.index')}}" class="btn btn-primary mt-3">Volver</a>




        </div>
    </div>
</main>
@endsection