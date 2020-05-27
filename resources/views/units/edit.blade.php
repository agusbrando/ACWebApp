@extends('base')

@section('main')
<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    
        
        
        <div class="row justify-content-center">
        <form method="POST" action="{{ route('programs.updateUnit', ['program_id'=>$unidad->program->id, 'id'=>$unidad->id]) }}">

            <div class="col-12">
                @method('PATCH')  
                @csrf
                <div class="card text-center">
                        <div class="card-header">
                            <div class="d-flex flex-row d-flex justify-content-between">
                                <div class="d-flex flex-row d-flex justify-content-between">
                                    
                                    <a href="{{ route('units.show',  ['program_id'=> ($program->id), 'id'=> ($unidad->id)]) }}" class="my-auto mx-1 h5 mr-1"><i class="fas fa-arrow-left" ></i></a>
                                    <h3 class="text-left ml-2 mt-2">{{$unidad->name}}</h3>
                                    
                                </div>
                                <div class="mt-2">
                                    <div class="row justify-content-end">
                                        <a type="button" class="btn btn-sm btn-outline-danger" href="{{ route('units.show',  ['program_id'=> ($program->id), 'id'=> ($unidad->id)]) }}"><i class="fas fa-times"></i></i></a>
                                        <div class="espacio"></div>
                                        
                                        <button class="btn btn-sm btn-outline-success" type="submit"><i class="fas fa-save"></i></button>
                                        
                                        <div class="espacio"></div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body col-12">
                                
                                <div class="row justify-content-center col-12">
                                
                                    
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Contenido</span>
                                            </div>
                                            <input class="form-control" type="text" name="name" value="{{$unidad->name}}">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Fechas Inicio/Fin Previstas</span>
                                            </div>
                                            <input id="daterangepicker" class="form-control" type="text" name="expected_date" value="{{$unidad->expected_date_start}} - {{$unidad->expected_date_end}}">
                                        </div>
                                        
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Evaluacion Prevista</span>
                                            </div>
                                            <select class="form-control custom-select" name="expected_eval">
                                                @for($i=1;$i<=3;$i++)
                                                <option value="{{$i}}EVAL" {{$unidad->expected_eval == $i.'EVAL' ? 'selected' : ''}}>{{$i}}EVAL</option>
                     
                                                @endfor
                                            </select>
                                        </div>
                                
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Fecha Inicio</span>
                                            </div>
                                            <input class="form-control" type="date" name="date_start" value="{{$unidad->date_start}}">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Fecha Fin</span>
                                            </div>
                                            <input class="form-control" type="date" name="date_end" value="{{$unidad->date_end}}">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Evaluacion</span>
                                            </div>
                                            <select class="form-control custom-select" name="eval">
                                                @for($i=1;$i<=3;$i++)
                                                <option value="{{$i}}EVAL" {{$unidad->eval == $i.'EVAL' ? 'selected' : ''}}>{{$i}}EVAL</option>
                
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Observaciones</span>
                                            </div>
                                            <textarea name="notes" rows="3" class="form-control">{{$unidad->notes}}</textarea>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Acciones de mejora</span>
                                            </div>
                                            <textarea name="improvements" rows="3" class="form-control">{{$unidad->improvements}}</textarea>
                                        </div>
                                        
                                   
                            
                                </div>
                        </div>
                </div>
            </form>   
        </div>
        
            
  
    
        
</main>
<script>
    $('#daterangepicker').daterangepicker({
        "showDropdowns": true,
        "autoApply": true,
        "language":'auto',
        "startDate": '{{date('d/m/Y',strtotime($unidad->expected_date_start))}}',
        "endDate": '{{date('d/m/Y',strtotime($unidad->expected_date_end))}}',
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

