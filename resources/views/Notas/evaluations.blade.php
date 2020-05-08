@extends('base')

@section('main')
<link href="{{ asset('css/notas.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <div class="d-flex flex-row">
                <a href="/asignaturas" class="my-auto mx-2 h5"><i class="fas fa-arrow-left"></i></a>
                <h3 class="m-auto">{{$subject->course->name}} - {{$subject->name}}</h3>
            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#nav-base" role="tab" aria-controls="nav-base" aria-selected="true">Base</a>
                        @foreach($evaluaciones as $eval)
                        <a class="nav-item nav-link" data-toggle="tab" href="#a{{$eval->name}}" role="tab" aria-controls="a{{$eval->name}}" aria-selected="false">{{$eval->name}}</a>
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active table-responsive" id="nav-base" role="tabpanel" aria-labelledby="nav-base-tab">
                        @foreach($evaluaciones as $eval)
                        <table class="table col-12">
                            <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                                <tr>
                                    <th>{{$eval->name}}</th>
                                    <th>Porcentaje</th>
                                    <th>Nota Minima</th>
                                    <th>Nota Media</th>
                                    <th>Actions</th>
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
                        <a class="btn btn-outline-primary float-right" href="{{ url('/porcentajes/create', $subject->id) }}">Añadir</a>
                    </div>
                    @foreach($evaluaciones as $eval)
                    <div class="tab-pane fade table-responsive" id="a{{$eval->name}}" role="tabpanel">
                        <table class="table col-12">
                            <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                                <tr>
                                    <th>Nº</th>
                                    <th>Apellidos, Nombre</th>
                                    <th>%Trabajos</th>
                                    <th>%Examen</th>
                                    <th>%Actitud</th>
                                    <th>NOTA FINAL</th>
                                    <th>%Recuperacion</th>
                                    <th>BOLETIN</th>
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
                        <a href="{{ url('evaluaciones/desglose', ['subject_id'=> ($subject->id), 'evaluation_id'=> ($eval->id)]) }}" class="btn btn-outline-primary float-right">Desglose</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>

@endsection