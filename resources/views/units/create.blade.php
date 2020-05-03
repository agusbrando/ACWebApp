@extends('base')

@section('main')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />




<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />




<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
    <div class="col-sm-12">
        <h1 class="display-4">Programación didáctica </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Principal</a></li>
                <li class="breadcrumb-item"><a href="/programs">Programaciones</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('programs.show',$program->id)}}">{{$program->id}} - {{$program->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nueva Unidad</li>
            </ol>
        </nav>
        
        
        <div class="row justify-content-center">
        <div class="col-10">
        <div class="card text-center">
                <div class="card-header">
               
                <h1 class="display-5 text-center">Nueva unidad</h1>
               
                </div>
                <div class="card-body">
                        
                    <div class="row justify-content-center">
                    
                        <!-- <form method="post" action="{{ route('programs.storeUnit', $program->id) }}" class="col-6"> -->
                        <form method="get" action="{{ route('prueba') }}" class="col-6">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Contenido</span>
                                    </div>
                                    <input class="form-control" type="text" name="name" value="Unidad">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Fecha Inicio/Fin Previstas</span>
                                    </div>
                                    <input id="daterangepicker" class="form-control" type="text" name="expected_date">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Fecha Inicio Prevista</span>
                                    </div>
                                    <input class="form-control" type="date" name="expected_date_start">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Fecha Fin Prevista</span>
                                    </div>
                                    <input class="form-control" type="date" name="expected_date_end">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Evaluacion Prevista</span>
                                    </div>
                                    <select class="form-control" name="expected_eval">
                                        <option value="1EVAL">1EVAL</option>
                                        <option value="2EVAL">2EVAL</option>
                                        <option value="3EVAL">3EVAL</option>
                                    </select>
                                </div>
                                <div class="row justify-content-center">
                                        <a type="button" class="btn btn-outline-secondary" href="/programs/{{$program->id}}">Descartar</a>
                                        <div class="espacio"></div>
                                        <button type="submit" class="btn btn-outline-primary pl-10">Añadir</button>
                                </div>
                        </form>
                    
                    </div>
            </div>
        </div>   
        </div>
        
            
  
    
        
</main>


<script>
    $('#daterangepicker').daterangepicker({
        "showDropdowns": true,
        "autoApply": true,
        "language":'auto',
        "startDate": false,
        "endDate": false,
        "opens": "center",
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
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

