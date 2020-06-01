@extends('base')

@section('login')
@include('auth.login')
@endsection
@section('main')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <link href="{{ asset('css/courses.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/scrollbar.css') }}" rel="stylesheet" type="text/css" />
    <div class="card shadow">

        <div class="card-header row m-0 justify-content-between">
            <div class="d-flex flex-row">
                <a href="{{ url()->previous() }}" class="my-auto mx-1 h5"><i class="fas fa-arrow-left"></i></a>

                <h3>{{$yearUnionsPrueba->first()->course->level}}º {{$yearUnionsPrueba->first()->course->abbreviation}} - {{$yearUnionsPrueba->first()->classroom->name}}</h3>

            </div>
            <div class="d-flex flex-row-reverse">
            @if(in_array('Eliminar_course', Session::get('user_permissions')))
                <form method="post" action="{{ route('courses.eliminarYearUnion', array($courseId, $yearId))}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger ml-2" type="submit">Eliminar</button>
                </form>
            @endif
            @if(in_array('Modificar_course', Session::get('user_permissions')))
                <form method="get" action="{{ route('courses.edit', array($courseId, $yearId))}}">
                    @csrf
                    @method('GET')
                    <button class="btn btn-outline-primary ml-2" type="submit">Editar Curso</button>
                </form>
            @endif

            </div>
        </div>
        <div class="card-body row no-gutters">
            <div class="col-sm-12">

                <div class=" bd-highlight mb-3">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">General</a>
                            <a class="nav-item nav-link" id="nav-asignaturas-tab" data-toggle="tab" href="#nav-asignaturas" role="tab" aria-controls="nav-asignaturas" aria-selected="false">Asignaturas</a>
                            <a class="nav-item nav-link" id="nav-items-tab" data-toggle="tab" href="#nav-items" role="tab" aria-controls="nav-items" aria-selected="false">Responsables</a>
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active  table-responsive" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
                            Aquí irá la programacion del curso
                        </div>

                        <div class="tab-pane fade" id="nav-asignaturas" role="tabpanel" aria-labelledby="nav-asignaturas-tab">
                            <div class="card-body row no-gutters table-responsive">
                                <table class="table col-12 ">
                                    <thead class="thead-dark col-12 col-md-8 col-lg-10 p-3">
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach($subjects as $subject)
                                    <tbody>
                                        <tr>
                                            <td>{{$subject->name }}</td>
                                            <td class="botones">
                                                <div class="d-flex flex-row ">
                                                    <a class="btn btn-outline-primary mr-2" href="{{ route('subjects.show',$subject->id)}}">Ver</a>
                                                    <a class="btn btn-outline-primary mr-2" href="{{route('subjects.evaluations', $subject->id)}}">Evaluaciones</a>
                                                    @if($yearUnionPrograms->where('subject_id',$subject->id)->first()->program == null)
                                                    <a class="btn btn-outline-primary mr-2" href="{{route('programs.asignarProgramacion', array($yearId, $courseId, $subject->id))}}">Asignar Programacion</a>
                                                    @else
                                                    <a href="/programs/{{$yearUnionPrograms->where('subject_id',$subject->id)->first()->program->id}}" class="btn btn-outline-primary">Programacion</a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="nav-items" role="tabpanel" aria-labelledby="nav-items-tab">

                            <div class="divShowCoursesContent" id="accordion">
                                @foreach($yearUnionsPrueba as $yearUnion)

                                <div class="card">
                                    <div class="card-header list-group-item d-flex justify-content-between align-items-center m-0" id="heading{{$yearUnion->evaluation->name}}" data-toggle="collapse" data-target="#collapse{{$yearUnion->evaluation->name}}" aria-expanded="true" aria-controls="collapse{{$yearUnion->evaluation->name}}">
                                        <h5 class="mb-0">
                                            <button class="btn collapsed">
                                                {{$yearUnion->evaluation->name}}
                                            </button>
                                        </h5>
                                        <span class="badge badge-primary badge-pill"> {{$yearUnion->users->count()}}</span>
                                    </div>

                                    <div id="collapse{{$yearUnion->evaluation->name}}" class="collapse  " aria-labelledby="heading{{$yearUnion->evaluation->name}}" data-parent="#accordion">
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <div class="w-100 scrollbar scrollbar-primary">
                                                    <div class="card row no-gutters table-responsive force-overflow ">

                                                
                                                        <table id='mytable' class="table w-100 ">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th>Nombre</th>
                                                                    <th>Apellido</th>
                                                                    <th>Items</th>
                                                                    <th>Responsabilizar Item</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach($yearUnion->users as $user)


                                                                <tr>
                                                                
                                                                    <td>{{$user->first_name}}</td>
                                                                    <td>{{$user->last_name}}</td>

                                                                    <td class="botones d-flex flex-wrap border border-bottom-0 border-left-0 border-right-0 ">
                                                                        @foreach($user->pivot->items as $item)
                                                                        @if($item != null || $item != "")
                                                                        <a class="btn btn-outline-primary m-1 " href="{{ route('courses.showItem', $item->id)}}" type="button ">{{"Nº ".$item->number." - ".$item->name}}</a>

                                                                        @else
                                                                        <p>Sin Items<p>
                                                                                @endif
                                                                                @endforeach
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group ">
                                                                            <form class="botones d-flex flex-wrap" method="post" action="{{ route('courses.responsabilizarItem', array($user->id, $courseId, $yearId))}}">
                                                                                @csrf
                                                                                @method('POST')

                                                                                <select multiple class="form-control " id="itemIds" name="itemIds[]">
                                                                                    <option disabled selected>Selecciona un Item</option>
                                                                                    <!--Hace la funcion de un placeholder-->
                                                                                    @foreach($items as $item)
                                                                                    <option selected value="{{$item->id}}">{{$item->name}}</option>


                                                                                    @endforeach
                                                                                </select>


                                                                                <button class="btn btn-outline-info mt-2" role="button">Asignar Item</button>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="card-footer col-12">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <!-- Boton para imprimir PDF-->
                                        <form class="float-right" action="{{ route('courses.print', array($courseId, $yearId))}}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <!-- @foreach($yearUnionsPrueba as $yearUnion)
                                            <input type="hidden" value={{$yearUnion}} name="yearUnions[]">
                                            @endforeach -->
                                            <button type="submit" class="btn btn-outline-danger ml-1 float-right"> Descargar PDF </button>
                                        </form>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        </form>
    </div>
</main>

@endsection