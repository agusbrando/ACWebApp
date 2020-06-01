@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Nuevo Comentario</h3>
            <form action="{{ route('comments.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="col-12">
                    <a href="/posts" class="my-auto mx-2 h5"><i class="fas fa-arrow-left"></i></a>
                    @if(in_array('Crear_comment', Session::get('user_permissions')))
                    <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
                    <a class="btn btn-outline-warning float-right" href="{{ route('comments.index')}}" tabindex="-1" aria-disabled="true">Cancelar</a>
                    @endif
                </div>
            </form>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-12 col-md-4 col-lg-2 p-3">
                <img src="{{asset('img/default_post.jpg')}}" class="img-thumbnail" alt="...">
            </div>
            <div class="col-12 col-md-8 col-lg-10 p-3">
                <div>
                    <fieldset>
                        <div class="form-group">
                            <label for="text">Texto</label>
                            <input value="" name="text" id="text" type="text" class="@error('text') is-invalid @enderror form-control">
                        </div>
                        <!--</br>
                        <div class="input-group hdtuto control-group lst increment">
                            <input type="file" name="name[]" class="myfrm form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Añadir</button>
                            </div>
                        </div>-->
                    </fieldset>
                    @error('email', 'login')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</main>
@endsection