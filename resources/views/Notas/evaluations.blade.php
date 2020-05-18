@extends('base')

@section('main')
<link href="{{ asset('css/notas.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="card shadow">
        <div class="card-header row m-0 justify-content-between">
            <div class="d-flex flex-row">
                <a href="/asignaturas" class="my-auto mx-2 h5"><i class="fas fa-arrow-left"></i></a>
                <h3 class="m-auto">{{$course->name}} - {{$subject->name}}</h3>
            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#nav-base" role="tab" aria-controls="nav-base" aria-selected="true">Base</a>
                        @foreach($yearUnions as $yearUnion)
                        <a class="nav-item nav-link" data-toggle="tab" href="#a{{$yearUnion->evaluation->name}}" role="tab" aria-controls="a{{$yearUnion->evaluation->name}}" aria-selected="false">{{$yearUnion->evaluation->name}}</a>
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active table-responsive" id="nav-base" role="tabpanel" aria-labelledby="nav-base-tab">
                        @if(session()->get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{ session()->get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <form action="{{ route('porcentajes.update') }}" method="post">
                            @csrf
                            @foreach($yearUnions as $yearUnion)
                            <table class="table col-12">
                                <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                                    <tr>
                                        <th>{{$yearUnion->evaluation->name}}</th>
                                        <th>Porcentaje%</th>
                                        <th>Nota Minima Tarea</th>
                                        <th>Nota Media Tarea</th>
                                        <th>Nota Media Minima</th>
                                    </tr>
                                </thead>
                                @foreach($yearUnion->percentages as $porcentaje)
                                <tbody>
                                    <tr>
                                        <td>{{$porcentaje->name}}</td>
                                        @if($porcentaje->name == 'Recuperacion')
                                        <td><input name="porcentajes[{{$yearUnion->evaluation->id}}][{{$porcentaje->id}}][porcentaje]" type="text" class="form-control w-75" value="{{$porcentaje->pivot->percentage}}" disabled></td>
                                        @else
                                        <td><input name="porcentajes[{{$yearUnion->evaluation->id}}][{{$porcentaje->id}}][porcentaje]" type="text" class="form-control w-75" value="{{$porcentaje->pivot->percentage}}"></td>
                                        @endif
                                        <td><input name="porcentajes[{{$yearUnion->evaluation->id}}][{{$porcentaje->id}}][nota_min_tarea]" type="text" class="form-control w-75" value="{{$porcentaje->pivot->min_grade_task}}"></td>
                                        <td><input name="porcentajes[{{$yearUnion->evaluation->id}}][{{$porcentaje->id}}][nota_media_tarea]" type="text" class="form-control w-75" value="{{$porcentaje->pivot->average_grade_task}}"></td>
                                        <td><input name="porcentajes[{{$yearUnion->evaluation->id}}][{{$porcentaje->id}}][nota_media_minima]" type="text" class="form-control w-75" value="{{$porcentaje->pivot->min_average_grade_task}}"></td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            @endforeach
                            <input type="hidden" name="subject" value={{$subject->id}}>
                            <button class="btn btn-primary mt-3 float-right" type="submit">Guardar</button>
                        </form>
                    </div>
                    @foreach($yearUnions as $yearUnion)
                    <div class="tab-pane fade table-responsive centro" id="a{{$yearUnion->evaluation->name}}" role="tabpanel">
                        <table class="table col-12">
                            <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                                <tr>
                                    <th>Apellidos, Nombre</th>
                                    @foreach($yearUnion->tareas as $tarea)
                                    <th>{{$tarea->name}}</th>
                                    @endforeach
                                    <th>NOTA FINAL</th>
                                    <th>BOLETIN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($yearUnion->users as $user)
                                <tr>
                                    <td>{{$user->last_name}} {{$user->first_name}}</td>
                                    @foreach($user->tareas as $key => $tarea)
                                    @if($user->suspendido[$key])
                                    <td class="text-danger">{{$tarea}}</td>
                                    @else
                                    <td>{{$tarea}}</td>
                                    @endif
                                    @endforeach
                                    <td>{{$user->nota_final}}</td>
                                    <td>{{$user->nota_final}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <form action="{{ route('subject.desglose',  ['subject' => $subject->id, 'year' => $yearUnion->year_id, 'course' => $yearUnion->course_id, 'evaluation'=> ($yearUnion->evaluation->id)]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary mr-2 float-right">Desglose</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</main>



@endsection