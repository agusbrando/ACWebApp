  @extends('base')

  @section('main')
  <!-- Script tabla de permisos -->
  <script>
    $(document).ready(function() {
      $('#alumnos').DataTable({
        dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-4 boton'B><'col-sm-4'><'col-sm-4'p>>",
        scrollY: 500,
        scrollCollapse: true,
        buttons: [{
          extend: 'excel',
          className: 'btn-outline-success'
        }],
        language: {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando START a END de un total de TOTAL Entradas",
          "infoEmpty": "No hay informacion",
          "infoFiltered": "(Filtrado de un total de MAX entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar MENU Entradas",
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
  <!-- Comienza la tabla -->
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <link href="{{ asset('css/tabla.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/toggle.css') }}" rel="stylesheet" type="text/css" />

    <table id="alumnos" class="table table-striped" style="width:100%">

      <thead class="cabezeraTabla">
        <tr>
          <td>Nº</td>
          <td>Permiso</td>
          <td>Rol</td>
          <td>Accion</td>
        </tr>
      </thead>
      @foreach($permissions as $permission)
      <tbody>
        <tr>
          <td>{{$permission->id }}</td>
          <td>{{$permission->name }}</td>
          <td>
            <select name="role">
              <option value="1">Administrador</option>
              <option value="2">Direccion</option>
              <option value="3">Profesor</option>
              <option value="10">Gestion</option>
              <option value="11">Alumno</option>
          </td>
          <td>
            <label class="switch">
              <input type="checkbox">
              <span class="slider round"></span>
            </label>
          </td>
        </tr>
      </tbody>
      @endforeach
    </table>
    <div class="col-sm-6">
      <a href="/permissions/create" class="btn btn-success"> <span>Añadir permisos</span></a>
      <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><span>Modificar permisos</span></a>
    </div>
  </main>
  @endsection
