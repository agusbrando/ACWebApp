@extends('base')

@section('main')
<script>
    $('.my-select').selectpicker();
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-5">
    <div class="container">
        <h1 class="display-4 pr-5">Crear Porcentaje</h1>
        <hr>
        <form action="" method="post">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="Porcentaje">Porcentaje</label>
                <select class="form-control" name="porcentaje" value={{ $porcentaje->percentage }}>
                    <option value="0">0%</option>
                    <option value="10">10%</option>
                    <option value="20">20%</option>
                    <option value="30">30%</option>
                    <option value="40">40%</option>
                    <option value="50">50%</option>
                    <option value="60">60%</option>
                    <option value="70">70%</option>
                    <option value="80">80%</option>
                    <option value="90">90%</option>
                    <option value="100">100%</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Porcentaje">Evaluaciones</label>
                <select class="selectpicker w-100" title="Selecciona Evaluacion" multiple data-actions-box="true" name="evaluaciones[]">
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
                <select class="form-control" name="nota_min">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nota_med">Nota Media</label>
                <select class="form-control" name="nota_med">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</main>
@endsection