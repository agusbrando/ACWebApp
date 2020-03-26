@extends('base')

@section('login')
<form class="form-signin center">
    <img class="mb-4" src="{{ asset('img/Logo.png') }}" alt="" height="150">
    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
    <label for="inputEmail" class="sr-only">Dirección de Email</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Dirección de Email" required autofocus>
    <label for="inputPassword" class="sr-only">Contraseña</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Recordarme
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    <p class="mt-3 mb-3 text-muted">&copy; Aula Campus 2020</p>
</form>
@endsection

@section('main')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Muro</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Botón 1</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Botón 2</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            Selector
          </button>
        </div>
      </div>
      <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Header</th>
              <th>Header</th>
              <th>Header</th>
              <th>Header</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>dolor</td>
              <td>sit</td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>amet</td>
              <td>consectetur</td>
              <td>adipiscing</td>
              <td>elit</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>Integer</td>
              <td>nec</td>
              <td>odio</td>
              <td>Praesent</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
@endsection
