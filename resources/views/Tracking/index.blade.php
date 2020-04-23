@extends('base')

@section('main')


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>



<link href="{{ asset('css/seguimiento.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 col-lg-10 px-4">

  <div class="container-fluid calendar ">
    <header>
      <h4 class="display-4 mb-4 text-center">November 2017</h4>


    </header>
    <div class="row">
      <div class="col-md-3 bg-light border-right">
        <div id="espacio" class="bg-primary"></div>
        <form method="post" action="{{ route('seguimiento.store') }}">
          @csrf
          <div class="form-group">
            <label for="date_start">Fecha de firma</label>
            <input type="datetime-local" class="form-control" id="date_start" name="date_start">
          </div>
          <label>Mañana</label>
          <div class="form-group">
            <label for="time_start">hora inicio de jornada</label>
            <input type="number" class="form-control" id="time_start" name="time_start">


            <label for="time_end">hora fin de jornada</label>
            <input type="number" class="form-control" id="time_end" name="time_end">
          </div>
          <br>
          <div class="col-md-12">
            <label class="" for="">Firma:</label>
            <br />
            <div id="sig"></div>
            <br />
            <button id="clear" class="btn btn-danger btn-sm">Borrar Firma</button>
            <textarea id="signature64" name="signed" style="display: none"></textarea>
            
          </div>
          <br />
          <div class="custom-file overflow-hidden rounded-pill mb-5">
            <input id="customFile" name="firma"type="file" class="custom-file-input rounded-pill">
            <label for="customFile" class="custom-file-label rounded-pill">Elige archivo</label>
          </div>
          <input type="submit" class="btn btn-success" value="firmar">
        </form>


      </div>


      <div class="row border-right-0 border-top-0 border-bottom-0 col-12 col-md-9 w-100">
        <div class="w-100"></div>
        <div id="header" class="row d-none d-sm-flex p-1 bg-primary text-white w-100">

          <h5 class="col-sm p-1 text-center text-truncate">Sunday</h5>
          <h5 class="col-sm p-1 text-center text-truncate">Monday</h5>
          <h5 class="col-sm p-1 text-center text-truncate">Tuesday</h5>
          <h5 class="col-sm p-1 text-center text-truncate">Wednesday</h5>
          <h5 class="col-sm p-1 text-center text-truncate">Thursday</h5>
          <h5 class="col-sm p-1 text-center text-truncate">Friday</h5>
          <h5 class="col-sm p-1 text-center text-truncate">Saturday</h5>
        </div>

        <div class="w-100"></div>
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
        <div class="day col-sm p-2 border border-right-0 border-top-0 text-truncate ">
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
        <div class="day col-sm p-2 border border-right-0 border-top-0 text-truncate ">
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
        <div class="day col-sm p-2 border border-right-0 border-top-0 text-truncate ">
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
        <div class="day col-sm p-2 border border-right-0 border-top-0 text-truncate ">
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
        <div class="day col-sm p-2 border border-right-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
          <h5 class="row align-items-center">
            <span class="date col-1">2</span>
            <small class="col d-sm-none text-center text-muted">Saturday</small>
            <span class="col-1"></span>
          </h5>
          <p class="d-sm-none">No events</p>
        </div>
        <div class="w-100"></div>

      </div>

    </div>

  </div>




</main>
<script type="text/javascript">
  var sig = $('#sig').signature({
    syncField: '#signature64',
    syncFormat: 'PNG'
  });
  $('#clear').click(function(e) {
    e.preventDefault();
    sig.signature('clear');
    $("#signature64").val('');
  });
</script>
@endsection