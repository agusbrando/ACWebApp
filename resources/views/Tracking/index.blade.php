@extends('base')

@section('main')




<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
<script type="text/javascript">
  $(function() {
    $('#datetimepicker13').datetimepicker({
      inline: true,
      sideBySide: false
    });
  });
</script>


<link href="{{ asset('css/seguimiento.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-10 col-lg-10 px-4">



  <div class="row col-12 container-fluid calendar">
    <div class="col-md-6 bg-light border-right">

      <form method="post" action="{{ route('seguimiento.store') }}">
        @csrf
        <div class="form-group">
          <label for="date_start">Fecha de firma</label>
          <input type="datetime-local" class="form-control w-50" id="date_start" name="date_start" value="">
        </div>
        <label class="center">Mañana</label>
        <div class="form-group ">
          <div class="row">
            <label for="time_start" class="w-50 center">hora inicio de jornada</label>
            <label for="time_end" class="w-50 center">hora fin de jornada</label>
          </div>
          <div class="row">
            <input type="time" class="form-control w-50" id="time_start" name="time_start">



            <input type="time" class="form-control w-50" id="time_end" name="time_end">
          </div>

        </div>
        <label class="center">Tarde</label>
        <div class="form-group ">
          <div class="row">
            <label for="time_start"class="w-50 center">hora inicio de jornada</label>
            <label for="time_end" class="w-50 center">hora fin de jornada</label>
          </div>
          <div class="row">
            <input type="time" class="form-control w-50" id="time_start" name="time_start2">



            <input type="time" class="form-control w-50" id="time_end" name="time_end2">
          </div>

        </div>
        <br>
        <div class="col-md-12">
          <label class="" for="">Firma:</label>
          <br />
          <div id="sig"></div>
          <br />
          <button id="clear" class="btn btn-danger btn-sm">Borrar Firma</button>
          <textarea id="signature64" name="firma" style="display: none"></textarea>

        </div>
        <br />
        <div class="custom-file overflow-hidden rounded-pill mb-5">
          <input id="customFile" type="file" class="custom-file-input rounded-pill" w-50>
          <label for="customFile" class="custom-file-label rounded-pill">Elige archivo</label>
        </div>
        <input type="submit" class="btn btn-success" value="firmar">
      </form>


    </div>


    <div class="row border-right-0 border-top-0 border-bottom-0 col-12 col-md-6 calendario w-100">
      <div class="col-12 p-0" style="overflow:hidden;">
        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <div id="datetimepicker13"></div>
            </div>
          </div>
        </div>

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