@extends('base')
@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Actualizar Comentario</h1>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br/>
            @endif
            <form method="post" action="{{ route('comments.update', $comment->id) }}">
                @method('PATCH')
                    @csrf
                        <div class="form-group">
                            <label for="user_id">Id Usuario</label>
                            <input type="number" class="form-control" name="user_id" value="{{ $comment->user_id }}"/>
                        </div>
                        <div class="form-group">
                            <label for="post_id">Id Post</label>
                            <input type="number" class="form-control" name="post_id" value="{{ $comment->post_id }}"/>
                        </div>
                        <div class="form-group">
                            <label for="text">Texto</label>
                            <input type="text" class="form-control" name="text" value="{{ $comment->text }}"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
</main>
@endsection