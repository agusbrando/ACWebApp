@extends('base')

@section('main')

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
<link href="{{ asset('css/seguimiento.css') }}" rel="stylesheet" type="text/css" />
<main role="main" class="col-md-10 col-lg-10 px-4">
    <div class="row col-12 container-fluid calendar">
        <form method="post" action="{{ route('seguimiento.update',$user->id) }}">
            @method('patch')
            @csrf
            

        @if($user->signature!=null)
        <label>Firma introducida,¿Quieres cambiar?</label>
        @endif
      
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
</main>

<script type="text/javascript">
    var sig = $('#sig').signature({
        syncField: '#signature64',
        syncFormat: 'PNG',

    });
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>
@endsection