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
                <a href="{{ url('/evaluaciones/desglose', $subject->id) }}" class="btn btn-primary ">Crear Tarea</a>
                <a href="{{ url('tareas', $subject->id) }}" class="btn btn-primary ">Eliminar Tarea</a>
            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col mt-4">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-eval1-tab" data-toggle="tab" href="#nav-eval1" role="tab" aria-controls="nav-eval1" aria-selected="true">Examenes</a>
                        <a class="nav-item nav-link" id="nav-eval2-tab" data-toggle="tab" href="#nav-eval2" role="tab" aria-controls="nav-eval2" aria-selected="false">Trabajos</a>
                        <a class="nav-item nav-link" id="nav-eval3-tab" data-toggle="tab" href="#nav-eval3" role="tab" aria-controls="nav-eval3" aria-selected="false">Actitud</a>
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-eval1" role="tabpanel" aria-labelledby="nav-eval1-tab">

                        @if ($notaParciales != null)
                        <form action="{{ route('desglose.updateNotes') }}" method="post">
                            @else
                            <form action="{{ route('desglose.storeNotes') }}" method="post">
                                @endif
                                @csrf
                                <div class="table-responsive">
                                    <table id="examenes" class="table table-striped examenes" style="width:100%">
                                        <thead class="cabezeraTabla">
                                            <tr id='columna'>
                                                <td>Apellidos, Nombre</td>
                                                @foreach($parciales as $parcial)
                                                <td>{{$parcial->name}}</td>
                                                @endforeach
                                                <td>Media Examenes</td>
                                            </tr>
                                        </thead>
                                        <tbody id="fila">
                                            @foreach($users as $user)
                                            <tr>
                                                <td class="text-left">{{$user->last_name}} {{$user->first_name}}</td>
                                                @foreach($parciales as $parcial)
                                                <td>
                                                    <div class="input-group col-10">
                                                        @if ($notaParciales != null)
                                                        <input name="examenes[{{$user->id}}][{{$parcial->id}}]" type="text" class="form-control w" value="{{$notaParciales[$user->id][$parcial->id]}}">
                                                        @else
                                                        <input name="examenes[{{$user->id}}][{{$parcial->id}}]" type="text" class="form-control w">
                                                        @endif
                                                    </div>
                                                </td>
                                                @endforeach
                                                @if ($mediaParciales != null)
                                                <td>{{$mediaParciales[$user->id]}}</td>
                                                @else
                                                <td>0</td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <input type="hidden" name="subject" value={{$subject->id}}>
                                <input type="hidden" name="evaluacion" value={{$evaluation->id}}>
                                <button class="btn btn-primary mt-3 float-right" type="submit">Guardar</button>
                            </form>
                    </div>
                    <div class="tab-pane fade" id="nav-eval2" role="tabpanel" aria-labelledby="nav-eval2-tab" style="width:100%">
                        @if ($notaTrabajos != null)
                        <form action="{{ route('desglose.updateTrabajos') }}" method="post">
                            @else
                            <form action="{{ route('desglose.storeTrabajos') }}" method="post">
                                @endif
                                @csrf
                                <div class="table-responsive">
                                    <table id="trabajos" class="table table-striped examenes" style="width:100%">
                                        <thead class="cabezeraTabla">
                                            <tr id='columna'>
                                                <td>Apellidos, Nombre</td>
                                                @foreach($trabajos as $trabajo)
                                                <td>{{$trabajo->name}}</td>
                                                @endforeach
                                                <td>Media Trabajos</td>
                                            </tr>
                                        </thead>
                                        <tbody id="fila">
                                            @foreach($users as $user)
                                            <tr>
                                                <td class="text-left">{{$user->last_name}} {{$user->first_name}}</td>
                                                @foreach($trabajos as $trabajo)
                                                <td>
                                                    <div class="input-group col-10">
                                                        @if ($notaTrabajos != null)
                                                        <input name="trabajos[{{$user->id}}][{{$trabajo->id}}]" type="text" class="form-control w" value="{{$notaTrabajos[$user->id][$trabajo->id]}}">
                                                        @else
                                                        <input name="trabajos[{{$user->id}}][{{$trabajo->id}}]" type="text" class="form-control w">
                                                        @endif
                                                    </div>
                                                </td>
                                                @endforeach
                                                @if ($mediaTrabajos != null)
                                                <td>{{$mediaTrabajos[$user->id]}}</td>
                                                @else
                                                <td>0</td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <input type="hidden" name="subject" value={{$subject->id}}>
                                <input type="hidden" name="evaluacion" value={{$evaluation->id}}>
                                <button class="btn btn-primary mt-3 float-right" type="submit">Guardar</button>
                            </form>
                    </div>
                    <div class="tab-pane fade" id="nav-eval3" role="tabpanel" aria-labelledby="nav-eval3-tab">
                        @if ($notaActitud != null)
                        <form action="{{ route('desglose.updateActitud') }}" method="post">
                            @else
                            <form action="{{ route('desglose.storeActitud') }}" method="post">
                                @endif
                                @csrf
                                <div class="table-responsive">
                                    <table id="actitud" class="table table-striped examenes" style="width:100%">
                                        <thead class="cabezeraTabla">
                                            <tr>
                                                <td>Apellidos, Nombre</td>
                                                @foreach($actitud as $act)
                                                <td>{{$act->name}}</td>
                                                @endforeach
                                                <td>Media Actitud</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td class="text-left">{{$user->last_name}} {{$user->first_name}}</td>
                                                @foreach($actitud as $act)
                                                <td>
                                                    <div class="input-group col-10">
                                                        @if ($notaActitud != null)
                                                        <input name="actitud[{{$user->id}}][{{$act->id}}]" type="text" class="form-control w" value="{{$notaActitud[$user->id][$act->id]}}">
                                                        @else
                                                        <input name="actitud[{{$user->id}}][{{$act->id}}]" type="text" class="form-control w">
                                                        @endif
                                                    </div>
                                                </td>
                                                @endforeach
                                                @if ($mediaActitud != null)
                                                <td>{{$mediaActitud[$user->id]}}</td>
                                                @else
                                                <td>0</td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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