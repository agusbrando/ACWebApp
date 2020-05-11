@extends('base')
@section('main')
<link href="{{ asset('css/messages.css') }}" rel="stylesheet" type="text/css"/>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Nuevo Mensaje</h3>
            <form action="{{ route('messages.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="col-12">
                    <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
                    <a class="btn btn-outline-warning float-right" href="{{ route('messages.index')}}" tabindex="-1" aria-disabled="true">Cancelar</a>
                </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-12 col-md-6 col-lg-3 p-3">
                <div class="form-group h-100">
                    @if($isResponse == true)
                    <select class="selectpicker w-100 h-100" title="Selecciona correos" multiple data-actions-box="true"
                        name="users[]">
                            <option selected="selected" value="{{$user->id}}">{{$user->email}}</option>
                    </select>
                    @else
                    <select class="selectpicker w-100 h-100" title="Selecciona correos" multiple data-actions-box="true"
                        name="users[]">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->email}}</option>
                        @endforeach
                    </select>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-9 p-3">
                <div>
                    <fieldset>
                        <div class="form-group">
                            <label for="first_name">Asunto</label>
                            @if($isResponse == true)
                                <input type="text" class="form-control" value="Re: {{$message->subject}}" id="subject" name="subject">
                            @else
                                <input type="text" class="form-control" id="subject" name="subject">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="message">Mensaje</label>
                                @if($isResponse == true)
                                    <textarea class="form-control" id="message" rows="3" name="message">{{$message->message}}
                                    </textarea>
                                 @else
                                    <textarea class="form-control" id="message" rows="3" name="message"></textarea>
                                 @endif
                        </div>
                        <div class="form-group">
                            <div class="row mb-2">

                                <input type="file" name="filenames[]" class="myfrm form-control mb-3" multiple='multiple'>

                            </div>
                        </div>
                    </fieldset>
                    {{-- @error('email', 'login')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}
                </div>
            </div>
        </div>
    </div>
</main>



@endsection
