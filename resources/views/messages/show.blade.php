@extends('base')
@section('main')
<link href="{{ asset('css/messages.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            @if ($sitio == 0)
                <h3>Mensaje recibido</h3>
            @else
                <h3>Mensaje enviado</h3>
            @endif
            <div>
                @if ($sitio == 0)
                    <a class="btn btn-outline-success" href="/response/{{$message->id}}">Responder</a>
                @endif

                    <a class="btn btn-outline-info" href="{{ url()->previous() }}">Volver</a>


                <form class="float-right"action="{{ route('messages.destroy',$message->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    @if(in_array('Eliminar_message', Session::get('user_permissions')))
                    <button type="submit" class="btn btn-outline-danger ml-1">Eliminar</button>
                    @endif
                </form>
            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-12 col-md-5 col-lg-3 p-3">
                <div>
                    <h5 class="card-title">{{$message->subject}}</h5>
                    <p class="card-text">FROM: {{$message->user->first_name}} {{$message->user->last_name}}</p>
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-9 p-3" style="border: 1px solid gray">
                <p>{{$message->message}}</p>
            </div>
    </div>

@if ($message->attachments->count() != 0)
<div class=" card-footer col-12">
    <div class="m-4">
        <h3>Adjuntos</h3>
        @foreach($message->attachments as $attachment)
        <div class="row">
            <div class="col-12 col-md-3 col-lg-1 p-2">
                {{-- <img class="img-thumbnail img-size" src="/img/iconfiles.png" alt=""> --}}
                @if ($attachment->extension == 'jpg' or $attachment->extension == 'png')
                <i class="fas fa-file-image icon-size"></i>
                @endif
                @if ($attachment->extension == 'pdf')
                <i class="fas fa-file-pdf icon-size"></i>
                @endif
                @if ($attachment->extension == 'zip' or $attachment->extension == 'rar')
                <i class="fas fa-file-archive icon-size"></i>
                @endif
            </div>
            <div class="col-12 col-md-8 col-lg-10 p-3">
                <div>
                 <a class="" href="{{url('download_attachment_message',array($message->id,$attachment->name))}}"><h5 class="card-title">{{$attachment->name}}</h5></a>
                 </div>
             </div>
            </div>
        @endforeach
    </div>
</div>
@endif
</div>
</main>
@endsection
