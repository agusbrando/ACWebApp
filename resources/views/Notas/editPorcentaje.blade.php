@extends('base')

@section('main')
<script>
    $('.my-select').selectpicker();
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link href="{{ asset('css/notas.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-5">
    <div class="container">
        <h1 class="display-4 pr-5">Editar Porcentaje para {{$subject->name}}</h1>
        <hr>
        <form method="post" action="{{ url('porcentajes/update') }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="Porcentaje">Porcentaje</label>
                <input type="porcentaje" class="form-control" name="porcentaje" aria-describedby="porcentaje" value={{$porcentaje->percentage}}>
            </div>
            <div class="form-group">
                <label for="Porcentaje">Evaluacion</label>
                <input type="porcentaje" disabled class="form-control" name="porcentaje" aria-describedby="porcentaje" value={{$evaluaciones[$porcentaje->evaluation_id-1]->name}}>
            </div>
            <div class="form-group">
                <label for="Porcentaje">Tipos</label>
                <input type="porcentaje" disabled class="form-control" name="porcentaje" aria-describedby="porcentaje" value={{$types[$porcentaje->type_id-1]->name}}>
            </div>
            <div class="form-group">
                <label for="nota_min">Nota Minima</label>
                <input type="porcentaje" class="form-control" name="nota_min" aria-describedby="porcentaje" value={{$porcentaje->nota_min}}>
            </div>
            <div class="form-group">
                <label for="nota_med">Nota Media</label>
                <input type="porcentaje" class="form-control" name="nota_media" aria-describedby="porcentaje" value={{$porcentaje->nota_media}}>
            </div>

            <input type="hidden" name="subject" value={{$subject->id}}>
            <input type="hidden" name="evaluation_id" value={{$porcentaje->evaluation_id}}>
            <input type="hidden" name="type_id" value={{$porcentaje->type_id}}>
            <button class="btn btn-primary text-white" type="submit">Guardar</button>

        </form>
    </div>
</main>
@endsection