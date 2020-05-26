@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <h3>Nueva Asignatura</h3>
            <form action="{{ route('subjects.store')}}" method="POST">
                @method('POST')
                <div class="col-12">
                    <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
                        @csrf
                    <a class="btn btn-outline-warning float-right" href="{{ route('subjects.index')}}" tabindex="-1" aria-disabled="true">Cancelar</a>
                </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-12 col-md-4 col-lg-2 p-3">
                <img src="{{asset('img/default_subject.jpg')}}" class="img-thumbnail" alt="...">
            </div>
            <div class="col-12 col-md-8 col-lg-10 p-3">
                <div>
                    <fieldset>
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input value="" name="name" id="name" type="text" class="@error('name') is-invalid @enderror form-control">
                        </div>   
                        <div class="form-group">
                            <label for="hours">Horas</label>
                            <input value="" name="hours" id="hours" type="text" class="@error('hours') is-invalid @enderror form-control">
                        </div>
                        <div class="form-group">
                            <label for="abbreviation">Siglas</label>
                            <input value="" name="abbreviation" id="abbreviation" type="text" class="@error('abbreviation') is-invalid @enderror form-control">
                        </div>                           
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