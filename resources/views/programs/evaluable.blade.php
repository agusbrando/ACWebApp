@extends('base')

@section('main')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />




<link href="{{ asset('css/units.css') }}" rel="stylesheet" type="text/css" />




<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
   
    <form method="post" action="{{ route('programs.storeAspecto', $program->id) }}">
            @csrf
            <div class="card shadow">
                    <div class="card-header row m-0 justify-content-between">
                        
                        <h3 class="display-5 text-left">{{$program->name}} - Nueva aspecto evaluado</h3>
                        <div class="float-right">
                            <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
                            <a class="btn btn-outline-warning float-right" href="/programs/{{$program->id}}" tabindex="-1" aria-disabled="true">Cancelar</a>
                        </div>
                    </div>
                    <div class="card-body row no-gutters">
                            
                        <div class="row justify-content-center col-12 p-3">  
                            <fieldset class="col-md-12">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Aspecto evaluado</span>
                                    </div>
                                    <select class="form-control custom-select" id="exampleFormControlSelect1" name="name" data-toggle="tooltip" data-placement="top" title="Aspectos evaluables restantes">
                                    @foreach($listaEvaluables as $evaluable)
                                        <option class="form-control anchuraselect" value="{{$evaluable->name}}">{{$evaluable->name}}</option>
                                    @endforeach
                                    </select>
                                    <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="Crear nuevo aspecto evaluable">
                                            <a class="input-group-text form-control btn btn-sm btn-outline-primary"  id="Boton2" href="#" data-toggle="modal" data-target="#crearAspecto"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Descripcion</span>
                                    </div>
                                    <textarea name="description" rows="3" class="form-control"></textarea>
                                </div>
                                   
                            </fieldset> 
                            
                        </div>
                    </div>
            </div>  
        </form> 
    
        
            
  
    
        
</main>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
 <!-- Modal form nuevo Aspecto Evaluable -->
<div class="modal fade" id="crearAspecto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo aspecto evaluable</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
            <form method="post" action="{{ route('programs.storeAspecto', $program->id) }}">
            @csrf
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Aspecto Evaluable</span>
                            </div>
                            <textarea row="3" name="name" type="text" class="form-control"></textarea>
                        </div>
                        

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Añadir</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>  
@endsection

