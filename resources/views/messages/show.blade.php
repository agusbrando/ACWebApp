@extends('base')
@section('main')
<link href="{{ asset('css/messages.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <h5 class="card-header">{{$message->subject}}</h5>
                <div class="card-body">
                    <h5 class="card-title">{{$message->user->first_name}} {{$message->user->last_name}}</h5>
                    <p class="card-text">{{$message->message}}</p>
                <div class="containerAttachment ">
                    @foreach($message->attachments as $attachment)

                    <div class="card m-2" style="width: 6rem;">
                        <img class="card-img-top" src="/img/iconfiles.png" alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">
                            <a href="{{ url('download_attachment_message',array($message->id,$attachment->name))}}">
                            {{$attachment->name}}
                        </a>
                    </p>
                        </div>
                      </div>

                @endforeach
            </div>
                </div>
            </div>
        </div>
    </div>
    @if ($sitio == 0)
    <a href="{{ url('messages')}}" class="btn btn-primary m-3">Volver</a>
    @else
    <a href="{{ url('messages_send')}}" class="btn btn-primary m-3">Volver</a>
    @endif
</main>
@endsection
