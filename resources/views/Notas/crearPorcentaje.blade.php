@extends('base')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-5">
    <div class="container">
        <h1 class="display-4 pr-5">Crear Porcentaje</h1>
        <hr>
        <form action="">
            @csrf
            @method('CREATE')
            <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="Porcentaje">Porcentaje</label>
                <select class="form-control" name="porcentaje">
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
                <label for="nota_min">Nota Minima</label>
                <select multiple class="form-control" name="nota_min">
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
            <div class="form-group">
                <label for="nota_med">Nota Media</label>
                <select multiple class="form-control" name="nota_med">
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