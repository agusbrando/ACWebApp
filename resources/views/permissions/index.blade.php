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
              <th scope="col">Permiso</th>
              @foreach($roles as $role)
              <th scope="col">
                {{$role->name}}
              </th>
              @endforeach
              <th scope="col">Ver</th>
            </tr>
          </thead>
          @foreach($permissions as $permission)
          <tbody>
            <tr>
              <td>{{$permission->name }}</td>
              @foreach($roles as $role)
              <td>
                <label class="switch">
                  <input type="checkbox">
                  <span class="slider round"></span>
                </label>
              </td>
              @endforeach
              <td class="botones">
                <a class="btn btn-outline-primary" href="{{ route('permissions.show',$permission->id)}}">Ver</a>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>

      <div class=" card-footer col-12">
        <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">

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