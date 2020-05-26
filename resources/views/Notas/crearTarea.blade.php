@extends('base')

@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <div class="card shadow">
            <div class="card-header row m-0 justify-content-between">
                <h3>Crear Tarea</h3>
                <button class="btn btn-outline-primary float-right" type="submit">Guardar</button>
            </div>
            <div class="card-body row no-gutters">
                <div class="container">

                    <div class="form-group">
                        <label for="Porcentaje">Nombre Tarea</label>
                        <input type="porcentaje" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="Porcentaje">Tipos</label>
                        <select class="form-control" name="type">
                            @foreach($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="yearUnion" value={{$yearUnion->id}}>
                </div>
            </div>
            <div class=" card-footer col-12">
                <button class="btn btn-outline-warning float-right" type="submit">Cancelar</button>
            </div>
    </form>
    </div>
</main>
@endsection