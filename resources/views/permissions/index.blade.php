  @extends('base')

  @section('main')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <link href="{{ asset('css/toggle.css') }}" rel="stylesheet" type="text/css" />

    <div class="card shadow">
      <div class="card-header row m-0 justify-content-between">
        <h3>Permisos</h3>
        <div>
          <a class="btn btn-outline-success" href="/permissions/create" class="btn btn-success">Añadir</a>
        </div>
      </div>
      <div class="card-body row no-gutters table-responsive">
        <table class="table col-12 ">
          <thead id="developers" class="thead-dark col-12 col-md-8 col-lg-10 p-3">
            <tr>
              <th scope="col">Nº</th>
              <th scope="col">Permiso</th>
              <th scope="col">Rol</th>
              <th scope="col">Accion</th>
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
        {!! $data->links() !!}

        <div class="col-sm-6">
          <a href="/permissions/create" class="btn btn-success"> <span>Añadir permisos</span></a>
          <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><span>Modificar permisos</span></a>
        </div>

      </div>

      <div class=" card-footer col-12">
        <nav class="col-5" aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </main>
  @endsection