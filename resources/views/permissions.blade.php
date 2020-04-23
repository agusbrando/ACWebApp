  @extends('base')

@section('main')
<head>
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

</main>
@endsection
