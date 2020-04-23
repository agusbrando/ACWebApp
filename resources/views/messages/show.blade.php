@extends('base')
@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <h5 class="card-header">{{$message->title}}</h5>
                <div class="card-body">
                    <h5 class="card-title">{{$message->user_id}}</h5>
                    <p class="card-text">{{$message->text}}</p>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('messages.index')}}" class="btn btn-primary m-3">Volver</a>
</main>
@endsection