@extends('base')

@section('main')
<!-- DatePicker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        $('#datepicker').datepicker({
            language: 'es'
        });
    });
</script>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <div class="col-12">
                <div class="d-flex flex-row">
                    <a href="/faltas/{{$user->id}}" class="my-auto mx-1 h5"><i class="fas fa-arrow-left"></i></a>
                    <h1>Añadir Falta</h1>
                </div>
                <hr>
                <div class="col-4">
                    <form action="{{ route('faltas.crear', $user->id) }}" method="POST">
                        @csrf
                        <h5>Fecha:</h5>
                        <form action="{{ url('asistencia/filter') }}" disable value="{{$user->id}}">
                            <div class="contenedor">
                                <input type="text" id="datepicker" placeholder="- Seleccionar fecha -" class="form-control col-6 mb-2" name="date">
                            </div>

                            <h5>Tipo:</h5>
                            <div class="form-group">
                                <select class="form-control col-6" id="types" name="type">
                                    <option value="2">Falta Leve</option>
                                    <option value="3">Falta Grave</option>
                                    <option value="4">Falta Muy Grave</option>
                                </select>
                            </div>
                </div>
                <div class="form-group col-6">
                    <label class="textarea mt-2" for="exampleFormControlTextarea1">
                        <h5>Descripción:</h5>
                    </label>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                </div>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
                </form>

            </div>
        </div>
    </div>

</main>
@endsection