@extends('base')

@section('main')
<script>
    $(document).ready(function() {
        $('#mytable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
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
        } );
    } );
    
</script>
<link href="{{ asset('css/seguimiento.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="container">
  <div class="space" style="height:50px"></div>
  <p class="lead">
    <h2>Calendario de seguimiento</h2>
    <br>

    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#formModal">
      Realizar firma
    </button>
    <hr>

    <div class="row header-calendar" style="width: 85%; position: relative; left: 95px;">

      <div class="col" style="display: flex; justify-content: space-between; padding: 10px;">
        <a href="{{ asset('/Calendar') }}/<?= $data ?? ''['last']; ?>" style="margin:10px;">
          <i class="fas fa-chevron-circle-left" style="font-size:30px;color:white;"></i>
        </a>
        <h2 style="font-weight:bold;margin:10px;"><?= $mespanish; ?> <small><?= $data ?? ''['year']; ?></small></h2>
        <a href="{{ asset('/Calendar') }}/<?= $data ?? ''['next']; ?>" style="margin:10px;">
          <i class="fas fa-chevron-circle-right" style="font-size:30px;color:white;"></i>
        </a>
      </div>

    </div>

    <div class="row" style="width: 85%; position: relative; left: 95px;">
      <div class="col header-col">Lunes</div>
      <div class="col header-col">Martes</div>
      <div class="col header-col">Miercoles</div>
      <div class="col header-col">Jueves</div>
      <div class="col header-col">Viernes</div>
      <div class="col header-col">Sabado</div>
      <div class="col header-col">Domingo</div>
    </div>
    <!-- inicio de semana -->
    @foreach ($data ['calendar'] as $weekdata)
    <div class="row" style="width: 85%; position: relative; left: 95px;">
      <!-- ciclo de dia por semana -->
      @foreach ($weekdata['datos'] as $dayweek)

      @if ($dayweek['mes']==$mes)
      <div class="col box-day" style="height: 100px;">
        {{ $dayweek['dia']  }}
        <!-- evento -->
        @foreach ($dayweek['evento'] as $event)
        <a class="badge badge-primary" data-toggle="modal" data-target="#eventModelLong" href="{{ asset('/event/details') }}/{{ $event->id }}">
          {{ $event->title }}
        </a>
        @endforeach
      </div>
      @else
      <div class="col box-dayoff" style="height: 100px;">
      </div>
      @endif


      @endforeach
    </div>
    @endforeach

</div> <!-- /container -->
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


            <div class="col-md-6">
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
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
</main>
@endsection
