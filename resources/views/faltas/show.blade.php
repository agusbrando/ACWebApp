@extends('base')
@section('login')
@include('auth.login')
@endsection
@section('main')

<!-- Tonggle -->
<link href="{{ asset('css/toggle.css') }}" rel="stylesheet" type="text/css" />
<!-- Jquery -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="card shadow">
    <div class="card-header row m-0 justify-content-between">
      <div class="col-12">
        <div class="d-flex flex-row">
          <a href="/asistencia" class="my-auto mx-1 h5"><i class="fas fa-arrow-left"></i></a>
          <h1>{{$user->first_name}} {{$user->last_name}}</h1>
        </div>
        <hr>
        <!-- Tabla -->
        <div class="col mt-4">
          <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-eval1-tab" data-toggle="tab" href="#nav-eval1" role="tab" aria-controls="nav-eval1" aria-selected="true">Asistencia</a>
              <a class="nav-item nav-link" id="nav-eval2-tab" data-toggle="tab" href="#nav-eval2" role="tab" aria-controls="nav-eval2" aria-selected="false">Comportamiento</a>

            </div>
          </nav>
          <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-eval1" role="tabpanel" aria-labelledby="nav-eval1-tab">

              <div id="accordion2">
                @foreach($lista as $i=>$falta)

                <div class="card">
                  <div class="card-header" id="heading{{$i}}" style="background-color: #EAEAEA">
                    <h5 class="mb-0">
                      <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}">
                        <h7 style="color:grey;font-size:large">{{$falta['asignatura']}}</h7>
                      </button>
                      <div style="float: right; color: grey;">
                        {{$falta['faltas']}}/{{$falta['max']}}
                      </div>
                    </h5>
                  </div>

                  <div id="collapse{{$i}}" class="collapse " aria-labelledby="heading{{$i}}" data-parent="#accordion2">
                    <div class="card-body">
                      <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Fecha/Hora</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($falta['listaFaltas'] as $misbehavior)
                          <tr>
                            <td>{{$misbehavior->date}}</td>
                            <td>{{$misbehavior->description}}</td>
                            <td>
                              <form action="{{ route('faltas.destroy1', ['user_id'=>$user->id ,'id'=>$misbehavior->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger float-right mr-2" type="submit">Delete</button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>

            <div class="tab-pane fade" id="nav-eval2" role="tabpanel" aria-labelledby="nav-eval2-tab" style="width:100%">
              <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne" style="background-color: #EAEAEA" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link">
                        <h7 style="color:grey;font-size:large">Faltas Leves</h7>
                      </button>
                      <div style="float: right; color: grey;">
                        {{count($listaFaltaLeve)}}
                      </div>
                    </h5>
                  </div>

                  <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                      <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Fecha/Hora</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($listaFaltaLeve as $misbehavior)
                          <tr>
                            <td>{{$misbehavior->date}}</td>
                            <td>{{$misbehavior->description}}</td>
                            <td>
                              <form action="{{ route('faltas.destroy1', ['user_id'=>$user->id ,'id'=>$misbehavior->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger float-right mr-2" type="submit">Delete</button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo" style="background-color: #EAEAEA">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h7 style="color:grey;font-size:large">Faltas Graves</h7>
                      </button>
                      <div style="float: right; color: grey;">
                        {{count($listaFaltaGrave)}}
                      </div>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Fecha/Hora</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($listaFaltaGrave as $misbehavior)
                          <tr>
                            <td>{{$misbehavior->date}}</td>
                            <td>{{$misbehavior->description}}</td>
                            <td>
                              <form action="{{ route('faltas.destroy1', ['user_id'=>$user->id ,'id'=>$misbehavior->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger float-right mr-2" type="submit">Delete</button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree" style="background-color: #EAEAEA">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <h7 style="color:grey;font-size:large">Faltas muy Graves</h7>
                      </button>
                      <div style="float: right; color: grey;">
                        {{count($listaFaltaMuyGrave)}}
                      </div>
                    </h5>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                      <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Fecha/Hora</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($listaFaltaMuyGrave as $misbehavior)
                          <tr>
                            <td>{{$misbehavior->date}}</td>
                            <td>{{$misbehavior->description}}</td>
                            <td>
                              <form action="{{ route('faltas.destroy1', ['user_id'=>$user->id ,'id'=>$misbehavior->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger float-right mr-2" type="submit">Delete</button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <a href="{{ url('faltas/create', $user->id) }}" class="btn btn-outline-success mb-3 mt-4">Añadir</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>
@endsection