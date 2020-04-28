@extends('base')

@section('main')
<script>
    $(document).ready(function() {
        $('#tabla').DataTable({
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
            buttons: [{
                    extend: 'excel',
                    className: 'btn-outline-success mr-2'
                },
                {
                    extend: 'pdf',
                    className: 'btn-outline-danger mr-2'
                }
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de un total de _TOTAL_ Entradas",
                "infoEmpty": "No hay informacion",
                "infoFiltered": "(Filtrado de un total de _MAX_ entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se han encontrado resultados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
</script>



<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>



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
      
            <table class="table table-striped" id="tabla">
                        <thead class="cabezeraTabla">
                            <tr>
                                <td>Fecha Firma</td>
                                <td>Hora Inicio</td>
                                <td>Hora Final</td>
                                <td>Suma Horas</td>
                                <td>Firma</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($trackings as $tracking)
                            <tr>
                                <td>{{$tracking->datetime_start}}</td>
                                <td>8:30</td>
                                <td>14:30</td>
                                <td>{{$tracking->num_hours}}</td>
                                <td>{{$tracking->signature}}</td>
                            </tr>
                            @endforeach
                            
                        </tbody>

                    </table>
                                              
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