  @extends('base')

  @section('main')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <link href="{{ asset('css/toggle.css') }}" rel="stylesheet" type="text/css" />

    <div class="card shadow">
      <div class="card-header row m-0 justify-content-between">
        <h3>Roles</h3>
        <div>
          <a class="btn btn-outline-success" href="/roles/create" class="btn btn-success">Añadir</a>
        </div>
      </div>
      <div class="card-body row no-gutters table-responsive">
        <table class="table col-12 ">
          <thead id="developers" class="thead-dark col-12 col-md-8 col-lg-10 p-3">
            <tr>
              <th scope="col">Roles</th>
              <th scope="col">Habilitar</th>
              <th scope="col">Ver</th>
            </tr>
          </thead>
          @foreach($roles as $role)
          <tbody>
            <tr>
              <td>{{$role->name }}</td>
              <td>
                <label class="switch">
                  <input type="checkbox">
                  <span class="slider round"></span>
                </label>
              </td>
              
              <td class="botones">
                <a class="btn btn-outline-primary" href="{{ route('roles.show',$role->id)}}">Ver</a>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>

      <div class=" card-footer col-12">
        <input class="btn btn-outline-success float-right ml-1" type='submit' value="Guardar">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <input type="hidden" value="{{$roles}}">
                </ul>
            </nav>
      </div>
    </div>
  </main>
  @endsection