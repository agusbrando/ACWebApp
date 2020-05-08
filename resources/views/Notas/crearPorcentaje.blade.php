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
    <form action="{{ route('porcentajes.store') }}" method="post">
        @csrf
        <div class="card shadow">
            <div class="card-header row m-0 justify-content-between">
                <h3>Crear Porcentaje para {{$subject->name}}</h3>
                <button class="btn btn-outline-primary float-right" type="submit">Guardar</button>
            </div>
            <div class="card-body row no-gutters">
                <div class="container">
                    <div class="form-group">
                        <label for="Porcentaje">Porcentaje</label>
                        <input type="porcentaje" class="form-control" name="porcentaje" aria-describedby="porcentaje" placeholder="%">
                    </div>
                    <div class="form-group">
                        <label for="Porcentaje">Evaluaciones</label>
                        <select class="selectpicker w-100 mt-n1" title="Selecciona Evaluacion" multiple data-actions-box="true" name="evaluaciones[]">
                            @foreach($evaluaciones as $eval)
                            <option value="{{$eval->id}}">{{$eval->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Porcentaje">Tipos</label>
                        <select class="form-control" name="type">
                            @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nota_min">Nota Minima</label>
                        <input type="porcentaje" class="form-control" name="nota_min" aria-describedby="porcentaje">
                    </div>
                    <div class="form-group">
                        <label for="nota_med">Nota Media</label>
                        <input type="porcentaje" class="form-control" name="nota_media" aria-describedby="porcentaje">
                    </div>
                    <input type="hidden" name="subject" value={{$subject->id}}>
                </div>
            </div>
            <div class=" card-footer col-12">
                <a class="btn btn-outline-warning float-right mr-2" href="asignaturas/{{$subject->id}}">Cancelar</a>
            </div>
    </form>
    </div>
</main>
@endsection