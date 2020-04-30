@extends('base')

@section('main')

<!-- Tonggle -->
<link href="{{ asset('css/toggle.css') }}" rel="stylesheet" type="text/css" />
<!-- Jquery -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Tabla 1-->
<script>
  $(document).ready(function() {
    $('#alumnos').DataTable({
      dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row mt-3'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
      scrollY: 500,
      scrollCollapse: true,
      buttons: [{
        label: 'Create',
        text: 'Asistencia',
        action: function(nButton, oConfig, oFlash) {

          window.location = "http://127.0.0.1:8000/asistencia"

        },
        className: 'btn btn-outline-primary mr-1'
      }, {
        extend: 'excel',
        className: 'btn-outline-success'
      }, ],
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
<!-- Tabla 2 -->
<script>
  $(document).ready(function() {
    $('#alumnos1').DataTable({
      dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row mt-3'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
      scrollY: 500,
      scrollCollapse: true,
      buttons: [{
        label: 'Create',
        text: 'Asistencia',
        action: function(nButton, oConfig, oFlash) {

          window.location = "http://127.0.0.1:8000/asistencia"

        },
        className: 'btn btn-outline-primary mr-1'
      }, {
        extend: 'excel',
        className: 'btn-outline-success'
      }, ],
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
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


  <h1>{{$user->first_name}} {{$user->last_name}}</h1>
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
        <table id="alumnos" class="table table-striped" style="width:100%">
          <thead class="cabezeraTabla">
            <tr>
              @foreach($lista as $subject)
              <td>{{$subject['asignatura']}}</td>
              @endforeach
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach($lista as $subject)
              <td>{{$subject['faltas']}}/{{$subject['max']}}</td>
              @endforeach
            </tr>
          </tbody>
        </table>
      </div>

      <div id="accordion" class="accordion mt-5">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Collapsible Group Item #1
              </button>
            </h5>
          </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha/Hora</th>
                    <th scope="col">Descripción</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($lista as $misbehavior)
                  <tr>
                    <th>1</th>
                    <td>{{$misbehavior->date}}</td>
                    <td>Mark</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Collapsible Group Item #2
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Collapsible Group Item #3
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="nav-eval2" role="tabpanel" aria-labelledby="nav-eval2-tab" style="width:100%">
        <table id="alumnos1" class="table table-striped evaluation">
          <thead class="cabezeraTabla">
            <tr>
              <td>Nº</td>
              <td>Falta Grave</td>
              <td>Action</td>
              <td>Nº</td>
              <td>Falta Leve</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>id</td>
              <td>22/04/2020</td>
              <td>
                <a type="button" class="btn btn-danger" href="/faltas/{{$user->id}}">Más Info.</a>
              </td>
              <td>id</td>
              <td>22/04/2020</td>
              <td>
                <a type="button" class="btn btn-warning" href="/faltas/{{$user->id}}">Más Info.</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
@endsection