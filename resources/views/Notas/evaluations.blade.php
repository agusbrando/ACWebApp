@extends('base')

@section('main')
<link href="{{ asset('css/notas.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <section id="tabs">
        <div class="container-fluid">
            <div class="d-flex flex-row">
                <a href="/asignaturas" class=" atras mt-3 mr-3"><i class="fas fa-arrow-left"></i></a>
                <h1 class="display-4 pr-3">{{$subject->course->name}} - {{$subject->name}}</h1>
            </div>
            <div class="row">
                <div class="col mt-4">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-base" role="tab" aria-controls="nav-base" aria-selected="true">Base</a>
                            @foreach($evaluaciones as $eval)
                            <a class="nav-item nav-link" data-toggle="tab" href="#a{{$eval->name}}" role="tab" aria-controls="a{{$eval->name}}" aria-selected="false">{{$eval->name}}</a>
                            @endforeach
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-base" role="tabpanel" aria-labelledby="nav-base-tab">
                            @foreach($evaluaciones as $eval)
                            <table class="table table-striped mt-5">
                                <thead class="cabezeraTabla">
                                    <tr>
                                        <td>{{$eval->name}}</td>
                                        <td>Porcentaje</td>
                                        <td>Nota Minima</td>
                                        <td>Nota Media</td>
                                        <td>Actions</td>
                                    </tr>
                                </thead>
                                @if($eval->name == '1Eval')
                                @foreach($eval1 as $porcentaje)
                                <tbody>
                                    <tr>
                                        <td>{{$porcentaje->type}}</td>
                                        <td>{{$porcentaje->porcentaje}}%</td>
                                        <td>{{$porcentaje->nota_min}}</td>
                                        <td>{{$porcentaje->nota_media}}</td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <a href="{{url('porcentajes/edit',  ['subject_id'=> ($subject->id) ,'evaluation_id'=> ($porcentaje->evaluacion_id), 'type_id'=> ($porcentaje->type_id)])}}" class="mr-3 icon"><i class="fas fa-edit"></i></a>
                                                <a href="{{url('porcentajes/destroy',  ['subject_id'=> ($subject->id) ,'evaluation_id'=> ($porcentaje->evaluacion_id), 'type_id'=> ($porcentaje->type_id)])}}" class="icon"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                @elseif($eval->name == '2Eval')
                                @foreach($eval2 as $porcentaje)
                                <tbody>
                                    <tr>
                                        <td>{{$porcentaje->type}}</td>
                                        <td>{{$porcentaje->porcentaje}}%</td>
                                        <td>{{$porcentaje->nota_min}}</td>
                                        <td>{{$porcentaje->nota_media}}</td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <a href="{{url('porcentajes/edit',  ['subject_id'=> ($subject->id) ,'evaluation_id'=> ($porcentaje->evaluacion_id), 'type_id'=> ($porcentaje->type_id)])}}" class="mr-3 icon"><i class="fas fa-edit"></i></a>
                                                <a href="{{url('porcentajes/destroy',  ['subject_id'=> ($subject->id) ,'evaluation_id'=> ($porcentaje->evaluacion_id), 'type_id'=> ($porcentaje->type_id)])}}" class="icon"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                @elseif($eval->name == '3Eval')
                                @foreach($eval3 as $porcentaje)
                                <tbody>
                                    <tr>
                                        <td>{{$porcentaje->type}}</td>
                                        <td>{{$porcentaje->porcentaje}}%</td>
                                        <td>{{$porcentaje->nota_min}}</td>
                                        <td>{{$porcentaje->nota_media}}</td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <a href="{{url('porcentajes/edit',  ['subject_id'=> ($subject->id) ,'evaluation_id'=> ($porcentaje->evaluacion_id), 'type_id'=> ($porcentaje->type_id)])}}" class="mr-3 icon"><i class="fas fa-edit"></i></a>
                                                <a href="{{url('porcentajes/destroy',  ['subject_id'=> ($subject->id) ,'evaluation_id'=> ($porcentaje->evaluacion_id), 'type_id'=> ($porcentaje->type_id)])}}" class="icon"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                @endif
                            </table>
                            @endforeach
                            <a class="btn btn-outline-primary" href="{{ url('/porcentajes/create', $subject->id) }}">Añadir</a>
                        </div>
                        @foreach($evaluaciones as $eval)
                        <div class="tab-pane fade" id="a{{$eval->name}}" role="tabpanel">
                            <table class="table table-striped" style="width:100%">
                                <thead class="cabezeraTabla">
                                    <tr>
                                        <td>Nº</td>
                                        <td>Apellidos, Nombre</td>
                                        <td>%Trabajos</td>
                                        <td>%Examen</td>
                                        <td>%Actitud</td>
                                        <td>NOTA FINAL</td>
                                        <td>%Recuperacion</td>
                                        <td>BOLETIN</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($eval->users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->last_name}} {{$user->first_name}}</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{ url('evaluaciones/desglose', ['subject_id'=> ($subject->id), 'evaluation_id'=> ($eval->id)]) }}" class="btn btn-secondary mt-2">Desglose</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection