@extends('base')

@section('main')
<script>
    $('.my-select').selectpicker();
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link href="{{ asset('css/notas.css') }}" rel="stylesheet" type="text/css" />

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
                        <label for="Porcentaje">Evaluaciones</label>
                        <select class="selectpicker w-100 mt-n1" title="Selecciona Evaluacion" multiple data-actions-box="true" name="evaluaciones[]">
                            @foreach($evaluaciones as $eval)
                            <option value="{{$eval->evaluation->id}}">{{$eval->evaluation->name}}</option>
                            @endforeach
                        </select>
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