@extends('base')

@section('main')
<link href="{{ asset('css/notas.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <div class="d-flex flex-row">
                <a href="{{ url('asignaturas', $subject->id) }}" class="my-auto mx-2 h5"><i class="fas fa-arrow-left"></i></a>
                <h3 class="m-auto">Desglose {{$subject->name}} {{$evaluation->name}}</h3>
            </div>
            <div>
                <a href="{{ url('/evaluaciones/desglose', $subject->id) }}" class="btn btn-outline-info">Crear Tarea</a>
                <a href="{{ url('tareas', $subject->id) }}" class="btn btn-outline-danger ">Eliminar Tarea</a>
            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col mt-4">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-eval1-tab" data-toggle="tab" href="#nav-parciales" role="tab" aria-controls="nav-parciales" aria-selected="true">Examenes</a>
                        <a class="nav-item nav-link" id="nav-eval2-tab" data-toggle="tab" href="#nav-trabajos" role="tab" aria-controls="nav-trabajos" aria-selected="false">Trabajos</a>
                        <a class="nav-item nav-link" id="nav-eval3-tab" data-toggle="tab" href="#nav-actitud" role="tab" aria-controls="nav-actitud" aria-selected="false">Actitud</a>
                        <a class="nav-item nav-link" id="nav-eval3-tab" data-toggle="tab" href="#nav-recuperacion" role="tab" aria-controls="nav-recuperacion" aria-selected="false">Recuperacion</a>
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active table-responsive" id="nav-parciales" role="tabpanel" aria-labelledby="nav-eval1-tab">
                        <form action="{{ route('desglose.updateNotes') }}" method="post">
                            @csrf
                            <table class="table col-12 centro">
                                <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                                    <tr id='columna'>
                                        <th>Apellidos, Nombre</th>
                                        @foreach($parciales as $parcial)
                                        <th>{{$parcial->name}}</th>
                                        @endforeach
                                        <th>Media Examenes</th>
                                    </tr>
                                </thead>
                                <tbody id="fila">
                                    @foreach($users as $user)
                                    <tr>
                                        <td class="text-left">{{$user->last_name}} {{$user->first_name}}</td>
                                        @foreach($parciales as $parcial)
                                        <td>
                                            <div class="input-group col-10">
                                                @if($notaParciales != null)
                                                @if($notaParciales[$user->id][$parcial->id] < 4)
                                                <input name="examenes[{{$user->id}}][{{$parcial->id}}]" type="text" class="form-control w text-danger" value="{{$notaParciales[$user->id][$parcial->id]}}">
                                                @else
                                                <input name="examenes[{{$user->id}}][{{$parcial->id}}]" type="text" class="form-control w" value="{{$notaParciales[$user->id][$parcial->id]}}">
                                                @endif
                                                @else
                                                <input name="examenes[{{$user->id}}][{{$parcial->id}}]" type="text" class="form-control w">
                                                @endif
                                            </div>
                                        </td>
                                        @endforeach
                                        @if($mediaParciales != null)
                                        <td>{{$mediaParciales[$user->id]}}</td>
                                        @else
                                        <td>0</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <input type="hidden" name="subject" value={{$subject->id}}>
                            <input type="hidden" name="evaluacion" value={{$evaluation->id}}>
                            <button class="btn btn-primary mt-3 float-right" type="submit">Guardar</button>
                        </form>
                    </div>
                    <div class="tab-pane fade table-responsive" id="nav-trabajos" role="tabpanel" aria-labelledby="nav-eval2-tab" style="width:100%">
                        <form action="{{ route('desglose.updateTrabajos') }}" method="post">
                            @csrf
                            <table class="table col-12 centro">
                                <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                                    <tr id='columna'>
                                        <th>Apellidos, Nombre</th>
                                        @foreach($trabajos as $trabajo)
                                        <th>{{$trabajo->name}}</th>
                                        @endforeach
                                        <th>Media Trabajos</th>
                                    </tr>
                                </thead>
                                <tbody id="fila">
                                    @foreach($users as $user)
                                    <tr>
                                        <td class="text-left">{{$user->last_name}} {{$user->first_name}}</td>
                                        @foreach($trabajos as $trabajo)
                                        <td>
                                            <div class="input-group col-10">
                                                @if($notaTrabajos != null)
                                                @if($notaTrabajos[$user->id][$trabajo->id] < 4)
                                                <input name="trabajos[{{$user->id}}][{{$trabajo->id}}]" type="text" class="form-control w text-danger" value="{{$notaTrabajos[$user->id][$trabajo->id]}}">
                                                @else
                                                <input name="trabajos[{{$user->id}}][{{$trabajo->id}}]" type="text" class="form-control w" value="{{$notaTrabajos[$user->id][$trabajo->id]}}">
                                                @endif
                                                @else
                                                <input name="trabajos[{{$user->id}}][{{$parcial->id}}]" type="text" class="form-control w">
                                                @endif
                                            </div>
                                        </td>
                                        @endforeach
                                        @if($mediaTrabajos != null)
                                        <td>{{$mediaTrabajos[$user->id]}}</td>
                                        @else
                                        <td>0</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <input type="hidden" name="subject" value={{$subject->id}}>
                            <input type="hidden" name="evaluacion" value={{$evaluation->id}}>
                            <button class="btn btn-primary mt-3 float-right" type="submit">Guardar</button>
                        </form>
                    </div>
                    <div class="tab-pane fade table-responsive" id="nav-actitud" role="tabpanel" aria-labelledby="nav-eval3-tab">
                        <form action="{{ route('desglose.updateActitud') }}" method="post">
                            @csrf
                            <table class="table col-12 centro">
                                <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                                    <tr>
                                        <th>Apellidos, Nombre</th>
                                        @foreach($actitud as $act)
                                        <th>{{$act->name}}</th>
                                        @endforeach
                                        <th>Media Actitud</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td class="text-left">{{$user->last_name}} {{$user->first_name}}</td>
                                        @foreach($actitud as $act)
                                        <td>
                                            <div class="input-group col-10">
                                                @if($notaActitud != null)
                                                @if($notaActitud[$user->id][$act->id] < 4)
                                                <input name="actitud[{{$user->id}}][{{$act->id}}]" type="text" class="form-control w text-danger" value="{{$notaActitud[$user->id][$act->id]}}">
                                                @else
                                                <input name="actitud[{{$user->id}}][{{$act->id}}]" type="text" class="form-control w" value="{{$notaActitud[$user->id][$act->id]}}">
                                                @endif
                                                @else
                                                <input name="actitud[{{$user->id}}][{{$parcial->id}}]" type="text" class="form-control w">
                                                @endif
                                            </div>
                                        </td>
                                        @endforeach
                                        @if($mediaActitud != null)
                                        <td>{{$mediaActitud[$user->id]}}</td>
                                        @else
                                        <td>0</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <input type="hidden" name="subject" value={{$subject->id}}>
                            <input type="hidden" name="evaluacion" value={{$evaluation->id}}>
                            <button class="btn btn-primary mt-3 float-right" type="submit">Guardar</button>
                        </form>
                    </div>
                    <div class="tab-pane fade table-responsive" id="nav-recuperacion" role="tabpanel" aria-labelledby="nav-eval3-tab">
                        <form action="{{ route('desglose.updateRecuperacion') }}" method="post">
                            @csrf
                            <table class="table col-12 centro">
                                <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                                    <tr>
                                        <th>Apellidos, Nombre</th>
                                        @foreach($recuperacion as $rec)
                                        <th>{{$rec->name}}</th>
                                        @endforeach
                                        <th>Media Recuperacion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td class="text-left">{{$user->last_name}} {{$user->first_name}}</td>
                                        @foreach($recuperacion as $rec)
                                        <td>
                                            <div class="input-group col-10">
                                                @if($notaRecuperacion != null)
                                                @if($notaRecuperacion[$user->id][$rec->id] < 4)
                                                <input name="recuperacion[{{$user->id}}][{{$rec->id}}]" type="text" class="form-control w text-danger" value="{{$notaRecuperacion[$user->id][$rec->id]}}">
                                                @else
                                                <input name="recuperacion[{{$user->id}}][{{$rec->id}}]" type="text" class="form-control w" value="{{$notaRecuperacion[$user->id][$rec->id]}}">
                                                @endif
                                                @else
                                                <input name="recuperacion[{{$user->id}}][{{$rec->id}}]" type="text" class="form-control w">
                                                @endif
                                            </div>
                                        </td>
                                        @endforeach
                                        @if($mediaRecuperacion != null)
                                        <td>{{$mediaRecuperacion[$user->id]}}</td>
                                        @else
                                        <td>0</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <input type="hidden" name="subject" value={{$subject->id}}>
                            <input type="hidden" name="evaluacion" value={{$evaluation->id}}>
                            <button class="btn btn-primary mt-3 float-right" type="submit">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection