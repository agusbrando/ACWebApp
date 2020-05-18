@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Comentarios</h3>
            <p>{{$comment->text}}</p>
        </div>
    </div>
</main>
@endsection