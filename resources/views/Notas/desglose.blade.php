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
                <a href="{{ url('/evaluaciones/desglose/crearTarea', ['subject' => $subject->id, 'evaluation' => $evaluation->id]) }}" class="btn btn-outline-info">Crear Tarea</a>
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
                    @foreach($yearUnions as $yearUnion)
                    <div class="tab-pane fade show active table-responsive" id="a$yearUnion->id" role="tabpanel" aria-labelledby="nav-eval1-tab">
                        <form action="{{ route('desglose.updateNotes') }}" method="post">
                            @csrf
                            <table class="table col-12 centro">
                                <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                                    <tr id='columna'>
                                        <th>Apellidos, Nombre</th>
                                        @foreach($yearUnion->evaluation->parciales as $parcial)
                                        <th>{{$parcial->name}}</th>
                                        @endforeach
                                        <th>Media Examenes</th>
                                    </tr>
                                </thead>
                                <tbody id="fila">
                                    @foreach($yearUnion->evaluation->users as $user)
                                    <tr>
                                        <td class="text-left">{{$user->last_name}} {{$user->first_name}}</td>
                                        @foreach($yearUnion->evaluation->parciales as $parcial)
                                        <td>
                                            <div class="input-group col-10">
                                                @if($yearUnion->evaluation->notaParciales != null)
                                                @if($yearUnion->evaluation->notaParciales[$user->id][$parcial->id] < 4) <input name="examenes[{{$user->id}}][{{$parcial->id}}]" type="text" class="form-control w text-danger" value="{{$evaluation->notaParciales[$user->id][$parcial->id]}}">
                                                    @else
                                                    <input name="examenes[{{$user->id}}][{{$parcial->id}}]" type="text" class="form-control w" value="{{$evaluation->notaParciales[$user->id][$parcial->id]}}">
                                                    @endif
                                                    @else
                                                    <input name="examenes[{{$user->id}}][{{$parcial->id}}]" type="text" class="form-control w">
                                                    @endif
                                            </div>
                                        </td>
                                        @endforeach
                                        @if($yearUnion->evaluation->mediaParciales != null)
                                        <td>{{$yearUnion->evaluation->mediaParciales[$user->id]}}</td>
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
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</main>

@endsection