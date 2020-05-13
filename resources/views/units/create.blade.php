@extends('base')

@section('main')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />




<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />




<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
   
        <form method="post" action="{{ route('programs.storeUnit', $program->id) }}">
            @csrf
            <div class="card shadow">
                    <div class="card-header row m-0 justify-content-between">
                
                        <h3 class="display-5 text-left">{{$program->name}} - Nueva unidad</h3>
                        <div class="float-right">
                            <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
                            <a class="btn btn-outline-warning float-right" href="{{ route('programs.index')}}" tabindex="-1" aria-disabled="true">Cancelar</a>
                        </div>
                    </div>
                    <div class="card-body row no-gutters">
                            
                        <div class="row justify-content-center col-12 p-3">  
                            <fieldset class="col-md-8">
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
                                    <!-- <div class="input-group mb-3">
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
                                    </div> -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Evaluacion Prevista</span>
                                        </div>
                                        <select class="form-control custom-select" name="expected_eval">
                                            <option value="1EVAL">1EVAL</option>
                                            <option value="2EVAL">2EVAL</option>
                                            <option value="3EVAL">3EVAL</option>
                                        </select>
                                    </div>
                                   
                            </fieldset> 
                            
                        </div>
                    </div>
            </div>  
        </form> 
    
        
            
  
    
        
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

