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
      @foreach($permissions ?? '' as $permission)
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

  <!-- <head>
<link href="{{ asset('css/permissions.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/toggle.css') }}" rel="stylesheet" type="text/css" />
</head>
<main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
<div class="container">
  <div class="table-wrapper">
    <div class="table-title">
      <div class="row">
        <div class="col-sm-6">
          <h2>Manage <b>Permissions</b></h2>
        </div>
        <div class="col-sm-6">
          <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"> <span>Añadir permisos</span></a>
          <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><span>Modificar permisos</span></a>
        </div>
      </div>
    </div>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>
            <span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
          </th>
          <th>ID Rol</th>
          <th>Nombre Rol</th>
          <th>ID Permiso</th>
          <th>Nombre Permiso</th>
          <th>Accion</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
          </td>
          <td>0001</td>
          <td>Administracion</td>
          <td>0015</td>
          <td>Administrador</td>
          <td>
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
            </label>
          </td>
        </tr>
        <tr>
          <td>
            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox2" name="options[]" value="1">
								<label for="checkbox2"></label>
							</span>
          </td>
          <td>0001</td>
          <td>Administracion</td>
          <td>0015</td>
          <td>Administrador</td>
          <td>
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
            </label>
          </td>
        </tr>
        <tr>
          <td>
            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox3" name="options[]" value="1">
								<label for="checkbox3"></label>
							</span>
          </td>
          <td>0001</td>
          <td>Administracion</td>
          <td>0015</td>
          <td>Administrador</td>
          <td>
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
            </label>
          </td>
        </tr>
        <tr>
          <td>
            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox4" name="options[]" value="1">
								<label for="checkbox4"></label>
							</span>
          </td>
          <td>0001</td>
          <td>Administracion</td>
          <td>0015</td>
          <td>Administrador</td>
          <td>
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
            </label>
          </td>
        </tr>
        <tr>
          <td>
            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox5" name="options[]" value="1">
								<label for="checkbox5"></label>
							</span>
          </td>
          <td>0001</td>
          <td>Administracion</td>
          <td>0015</td>
          <td>Administrador</td>
          <td>
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
            </label>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="clearfix">
      <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
      <ul class="pagination">
        <li class="page-item disabled"><a href="#">Previous</a></li>
        <li class="page-item"><a href="#" class="page-link">1</a></li>
        <li class="page-item"><a href="#" class="page-link">2</a></li>
        <li class="page-item active"><a href="#" class="page-link">3</a></li>
        <li class="page-item"><a href="#" class="page-link">4</a></li>
        <li class="page-item"><a href="#" class="page-link">5</a></li>
        <li class="page-item"><a href="#" class="page-link">Next</a></li>
      </ul>
    </div>
  </div>
</div>

</main> -->