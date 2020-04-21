@extends('base')

@section('main')
<main role="main" class=" col-md-10 ml-sm-auto col-lg-10">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/calendar">Calendario</a></li>
    </ol>
  </nav>

  <div class="container-fluid">
    <div class="space"></div>
    <p class="lead">
      <h1 class="display-4 pr-3">Calendario</h1>
      <br>

      <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#formModal">
        Crear un evento
      </button>
      <hr>

      <div class="calendario">
       <div class="col-2">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">EVENTOS</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">
                  <button type="button" class="btn btn-outline-primary">
                    TUTORIAS
                  </button>
                </th>
              </tr>
              <tr>
                <th scope="row">
                  <button type="button" class="btn btn-outline-primary">
                    CLAUSTRO
                  </button>
                </th>
              </tr>
              <tr>
                <th scope="row">
                  <button type="button" class="btn btn-outline-primary">
                    EXÁMENES
                  </button>
                </th>
              </tr>
              <tr>
                <th scope="row">
                  <button type="button" class="btn btn-outline-primary">
                    EXCURSIÓN
                  </button>
                </th>
              </tr>
            </tbody>
          </table>
        </div>
       <div class="col-8">
          <div class="container-fluid">
            <header>
              <h4 class="display-4 mb-4 text-center">November 2017</h4>
              <div class="row d-none d-sm-flex p-1 bg-dark text-white">
                <h5 class="col-sm p-1 text-center">Sunday</h5>
                <h5 class="col-sm p-1 text-center">Monday</h5>
                <h5 class="col-sm p-1 text-center">Tuesday</h5>
                <h5 class="col-sm p-1 text-center">Wednesday</h5>
                <h5 class="col-sm p-1 text-center">Thursday</h5>
                <h5 class="col-sm p-1 text-center">Friday</h5>
                <h5 class="col-sm p-1 text-center">Saturday</h5>
              </div>
            </header>
            <div class="row border border-right-0 border-bottom-0">
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                <h5 class="row align-items-center">
                  <span class="date col-1">29</span>
                  <small class="col d-sm-none text-center text-muted">Sunday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                <h5 class="row align-items-center">
                  <span class="date col-1">30</span>
                  <small class="col d-sm-none text-center text-muted">Monday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                <h5 class="row align-items-center">
                  <span class="date col-1">31</span>
                  <small class="col d-sm-none text-center text-muted">Tuesday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">1</span>
                  <small class="col d-sm-none text-center text-muted">Wednesday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">2</span>
                  <small class="col d-sm-none text-center text-muted">Thursday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">3</span>
                  <small class="col d-sm-none text-center text-muted">Friday</small>
                  <span class="col-1"></span>
                </h5>
                <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small bg-info text-white" title="Test Event 1">Test Event 1</a>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">4</span>
                  <small class="col d-sm-none text-center text-muted">Saturday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="w-100"></div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">5</span>
                  <small class="col d-sm-none text-center text-muted">Sunday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">6</span>
                  <small class="col d-sm-none text-center text-muted">Monday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">7</span>
                  <small class="col d-sm-none text-center text-muted">Tuesday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">8</span>
                  <small class="col d-sm-none text-center text-muted">Wednesday</small>
                  <span class="col-1"></span>
                </h5>
                <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small bg-success text-white" title="Test Event 2">Test Event 2</a>
                <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small bg-danger text-white" title="Test Event 3">Test Event 3</a>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">9</span>
                  <small class="col d-sm-none text-center text-muted">Thursday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">10</span>
                  <small class="col d-sm-none text-center text-muted">Friday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">11</span>
                  <small class="col d-sm-none text-center text-muted">Saturday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="w-100"></div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">12</span>
                  <small class="col d-sm-none text-center text-muted">Sunday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">13</span>
                  <small class="col d-sm-none text-center text-muted">Monday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">14</span>
                  <small class="col d-sm-none text-center text-muted">Tuesday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">15</span>
                  <small class="col d-sm-none text-center text-muted">Wednesday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">16</span>
                  <small class="col d-sm-none text-center text-muted">Thursday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">17</span>
                  <small class="col d-sm-none text-center text-muted">Friday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">18</span>
                  <small class="col d-sm-none text-center text-muted">Saturday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="w-100"></div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">19</span>
                  <small class="col d-sm-none text-center text-muted">Sunday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">20</span>
                  <small class="col d-sm-none text-center text-muted">Monday</small>
                  <span class="col-1"></span>
                </h5>
                <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small bg-primary text-white" title="Test Event with Super Duper Really Long Title">Test Event with Super Duper Really Long Title</a>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">21</span>
                  <small class="col d-sm-none text-center text-muted">Tuesday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">22</span>
                  <small class="col d-sm-none text-center text-muted">Wednesday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">23</span>
                  <small class="col d-sm-none text-center text-muted">Thursday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">24</span>
                  <small class="col d-sm-none text-center text-muted">Friday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">25</span>
                  <small class="col d-sm-none text-center text-muted">Saturday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="w-100"></div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">26</span>
                  <small class="col d-sm-none text-center text-muted">Sunday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">27</span>
                  <small class="col d-sm-none text-center text-muted">Monday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">28</span>
                  <small class="col d-sm-none text-center text-muted">Tuesday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">29</span>
                  <small class="col d-sm-none text-center text-muted">Wednesday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
                <h5 class="row align-items-center">
                  <span class="date col-1">30</span>
                  <small class="col d-sm-none text-center text-muted">Thursday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                <h5 class="row align-items-center">
                  <span class="date col-1">1</span>
                  <small class="col d-sm-none text-center text-muted">Friday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                <h5 class="row align-items-center">
                  <span class="date col-1">2</span>
                  <small class="col d-sm-none text-center text-muted">Saturday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="w-100"></div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                <h5 class="row align-items-center">
                  <span class="date col-1">3</span>
                  <small class="col d-sm-none text-center text-muted">Sunday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                <h5 class="row align-items-center">
                  <span class="date col-1">4</span>
                  <small class="col d-sm-none text-center text-muted">Monday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                <h5 class="row align-items-center">
                  <span class="date col-1">5</span>
                  <small class="col d-sm-none text-center text-muted">Tuesday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                <h5 class="row align-items-center">
                  <span class="date col-1">6</span>
                  <small class="col d-sm-none text-center text-muted">Wednesday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                <h5 class="row align-items-center">
                  <span class="date col-1">7</span>
                  <small class="col d-sm-none text-center text-muted">Thursday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                <h5 class="row align-items-center">
                  <span class="date col-1">8</span>
                  <small class="col d-sm-none text-center text-muted">Friday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
              <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
                <h5 class="row align-items-center">
                  <span class="date col-1">9</span>
                  <small class="col d-sm-none text-center text-muted">Saturday</small>
                  <span class="col-1"></span>
                </h5>
                <p class="d-sm-none">No events</p>
              </div>
            </div>
          </div>

        </div> 
        <div class="col-2">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">HORAS DISPONIBLES</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">
                  <button type="button" class="btn btn-outline-success">
                    9:00 H
                  </button>
                </th>
              </tr>
              <tr>
                <th scope="row">
                  <button type="button" class="btn  btn-outline-success">
                  9:30 H
                  </button>
                </th>
              </tr>
              <tr>
                <th scope="row">
                  <button type="button" class="btn btn-outline-success">
                  10:15 H
                  </button>
                </th>
              </tr>
              <tr>
                <th scope="row">
                  <button type="button" class="btn btn-outline-success">
                  11:30 H
                  </button>
                </th>
              </tr>
            </tbody>
          </table>
        </div>         
      </div> 
  </div>


  </div> <!-- /container -->


  <!-- Modal Form -->
  <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir Evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <div class="modal-body">
          <div class="container">
            <p class="lead">
              @if (count($errors) > 0)
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
              </div>
              @endif


              <div class="col-md-12">
                <form action="{{ asset('/event/store') }}" method="post">
                  @csrf
                  <div class="fomr-group">
                    <label>Titulo</label>
                    <input type="text" class="form-control" name="titulo">
                  </div>
                  <div class="fomr-group">
                    <label>Descripcion del Evento</label>
                    <input type="text" class="form-control" name="descripcion">
                  </div>
                  <div class="fomr-group">
                    <label>Fecha</label>
                    <input type="date" class="form-control" name="fecha">
                  </div>
                  <br>
                  <input type="submit" class="btn btn-info" value="Guardar">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>
@endsection