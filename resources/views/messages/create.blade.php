@extends('base')
@section('main')
<link href="{{ asset('css/messages.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-4 mb-0">Mensajes</h1>


            <form method="post" action="{{route('messages.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="Porcentaje">Enviar a</label>
                    <select class="selectpicker w-100" title="Selecciona correos" multiple data-actions-box="true"
                        name="users[]">
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->email}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="subject">Asunto</label>
                    <input type="text" class="form-control" id="subject" name="subject">
                </div>
                <div class="form-group">
                    <label for="message">Mensaje</label>
                    <textarea class="form-control" id="message" rows="3" name="message"></textarea>
                </div>

                <div class="row mb-2">










                    <input type="file" name="filenames[]" class="myfrm form-control" multiple='multiple'>





                    <div class="col-md-6">
                        <button type="submit" class="file btn btn-lg btn-primary">Enviar</button>
                    </div>

                </div>
            </form>
            <a href="{{ route('messages.index')}}" class="btn btn-primary mt-3">Volver</a>




        </div>
    </div>
</main>
@endsection
