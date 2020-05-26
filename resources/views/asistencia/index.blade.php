@extends('base')

@section('main')

<!-- Tonggle -->
<link href="{{ asset('css/toggle.css') }}" rel="stylesheet" type="text/css" />
<!-- Jquery -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- DatePicker -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <div class="col-12">
                <h1>Pasar Lista</h1>
                <hr>
                <!-- DatePicker -->
                <h5>Fecha:</h5>

                <form action="{{ route('asistencia.filter') }}" method="post">
                    @csrf
                    <div class="contenedor col-4">
                        <input type="text" id="datepicker" placeholder="- Seleccionar fecha -" class="form-control col-6" name="date">
                        <div class="espacio"> </div>
                        <div class="form-group select-iz">
                            <select class="form-control pl-1" id="horarios" name="horario">
                                <option>8:35 - 9:25 1ºHora</option>
                                <option>9:25 - 10:20 2ºHora</option>
                                <option>10:20 - 11:35 3ºHora</option>
                                <option>11:35 - 12:25 4ºHora</option>
                                <option>12:25 - 13:15 5ºHora</option>
                                <option>13:15 - 14:15 6ºHora</option>
                            </select>
                        </div>
                    </div>
                    <!-- Grupo -->
                    <div style="display: flex ">
                        <div>
                            <h5>Grupo:</h5>
                            <div class="form-group pl-3">
                                <select class="form-control pr-4" id="cursos" name="grupo">
                                    @foreach ($courses as $course)
                                    <option value="{{$course->id}}">{{$course ->level}}{{$course ->abbreviation}} - {{$course ->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="espacio"> </div>
                        <!-- Asignatura -->
                        @if($filtradoCurso)
                        <div>
                            <h5>Asignatura:</h5>
                            <div class="form-group">
                                <select class="form-control" id="asignaturas" name="asignatura">
                                    @foreach ($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject ->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div>
                        <button type="submit" class="btn btn-outline-primary ml-3">Filtrar</button>
                    </div>
                </form>
            </div>
            <!-- Tabla -->
            @if($filtradoCurso)
            <table id="alumnos" class="table mt-3" style="width:100%;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Apellidos, Nombre</th>
                        <th scope="col">Presente</th>
                        <th scope="col">Faltas de Comportamiento</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user ->first_name}}, {{$user ->last_name}}</td>
                        <td><label class="">
                                <input type="checkbox" checked data-toggle="toggle">
                                <!-- <span class="slider round"></span> -->
                            </label></td>
                        <td>
                            <i class="fas fa-exclamation-triangle"></i>
                        </td>
                        <td> <a type="button" class="btn btn-primary mr-2 float-right" href="/faltas/{{$user->id}}">Más Info.</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <button type="button" class="btn btn-outline-info">Guardar</button>
            </div>
            @endif
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