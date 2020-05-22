@extends('base')

@section('main')
<!-- DatePicker -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <div class="col-12">
                <div class="d-flex flex-row">
                    <a href="/faltas/{{$user->id}}" class="my-auto mx-1 h5"><i class="fas fa-arrow-left"></i></a>
                    <h1>Añadir Falta</h1>
                    <form action="{{ route('faltas.store')}}" method="POST">
                        @method('POST')
                        <div class="col-12">
                            <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
                            @csrf
                            <a class="btn btn-outline-warning float-right" href="/faltas/{{$user->id}}" tabindex="-1" aria-disabled="true">Cancelar</a>
                        </div>

                </div>
                <hr>
                <div class="col-4">
                <input type="hidden" name="user_id" value="{{$user->id}}"/>
                    <h5>Fecha:</h5>
                    <!-- <form action="{{ url('asistencia/filter') }}" disable value="{{$user->id}}"> -->
                    <div class="contenedor">
                        <input type="text" id="datepicker" placeholder="- Seleccionar fecha -" class="form-control col-6 mb-2" name="date">
                    </div>
                    <h5>Tipo:</h5>
                    <div class="form-group">
                        <select class="form-control col-6" id="types" name="type_id">
                            <option value="11">Falta Leve</option>
                            <option value="12">Falta Grave</option>
                            <option value="13">Falta Muy Grave</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="textarea mt-2" for="exampleFormControlTextarea1">
                            <h5>Descripción:</h5>
                        </label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    <!-- </form> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
<script>
    $('#datepicker').daterangepicker({
        "singleDatePicker": true,
        "timePicker": true,
        "timePicker24Hour": true,
        "language": 'auto',
        "locale": {
            "format": "DD/MM/YYYY",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "fromLabel": "hasta",
            "toLabel": "De",
            "customRangeLabel": "Custom",
            "weekLabel": "S",
            "daysOfWeek": [
                "D",
                "L",
                "M",
                "X",
                "J",
                "V",
                "S"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
        }
    }, function(start, end, label) {
        console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
    });
</script>
@endsection