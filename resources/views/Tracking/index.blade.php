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







<link href="{{ asset('css/seguimiento.css') }}" rel="stylesheet" type="text/css" />

<main role="main" class="col-md-10 col-lg-10 px-4">



  <div class="row col-12 container-fluid calendar">
    <div class="row border-right-0 border-top-0 border-bottom-0 col-12 col-md-8 calendario w-100">

      <table class="table table-striped col-12" id="tabla">
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
          @if($tracking->user_id == $user->id)
          <tr>
            <td>{{$tracking->date_signature}}</td>
            <td>{{$tracking->time_start}}</td>
            <td>{{$tracking->time_end}}</td>
            <td>{{$tracking->num_hours}}</td>
            <td><img src="{{url($tracking->signature)}}" />
          </td>
          </tr>
          @endif
          @endforeach

        </tbody>

      </table>

    </div>
    <div class="col-md-4 bg-light border-left">

      <form method="post" action="{{ route('seguimiento.store') }}">
        @csrf
        <div class="form-group">
          <label for="date_start">Fecha de firma</label>
          <input type="date" class="form-control w-50" id="date_start" name="date_start" value="">
        </div>

        <div class="form-group ">
          
            <label for="time_start" class="w-50">hora inicio de jornada</label>
            <input type="time" class="form-control w-50" id="time_start" name="time_start">
            <label for="time_end" class="w-50">hora fin de jornada</label>
            <input type="time" class="form-control w-50" id="time_end" name="time_end">
            </div>
            

        

        <br>

        @if($user->signature!=null)
        <img src="{{url($user->signature)}}"><br>
        <label>Firma introducida,¿Quieres cambiar?</label>
        @endif
<input type="submit" class="btn btn-success w-50" value="firmar">

      </form>
      <div class="cosis"></div>
      <form action="{{ route('seguimiento.edit', $user->id)}}" method="get">
        @csrf

        <button class="btn btn-primary float-right" type="submit">Editar Firma</button>
      </form>

    </div>




  </div>






</main>


@endsection