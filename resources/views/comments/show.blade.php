@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Comentarios</h1>
            <p>{{$comment->text}}</p>
        </div>
    </div>
</main>