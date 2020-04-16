
@extends('base')

@section('login')
<script src="https://maps.googleapis.com/maps/api/js"></script>

<script src="https://code.jquery.com/jquery-2.2.0.min.js" integrity="sha256-ihAoc6M/JPfrIiIeayPE9xjin4UWjsx2mjW/rtmxLM4=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/ui/1.12.0-rc.2/jquery-ui.js" integrity="sha256-6HSLgn6Ao3PKc5ci8rwZfb//5QUu3ge2/Sw9KfLuvr8=" crossorigin="anonymous"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<body>
		<div class="main-wrapper">
			<a href="#" class="okati">
				<span class="s3">Ya tienes cuenta...?</span>
				<span class="s4">Inicia sesión</span>
			</a>
			<a href="#" class="rendu">
				<span class="s3">Nuevo usuario...?</span>
				<span class="s4">Registrate</span>
			</a>
		</div>
		<div class="veen">
			<div class="tada">
				<p class="head">Iniciar Sesión</p>
				<div class="uid">
					<label>Nombre</label><input type="text"></input>
					</br>
				</div>
				<div class="pwd">
					<label>Contraseña</label><input type="password"></input>
					<span class="show-pass"></span>
				</div>
				<div class="remw">
					<p class="rem">Recordarme</p>
					<div class="dum">
						<input type="checkbox" id="for"></input><label for="for"></label>
					</div>
				</div>
				<a href="#" class="log">ACCEDER
			</a>
				<a href="#" class="close-x">X
			</a>
			</div>
		</div>
		<div class="veen-2">
			<div class="check"><span class="p1"></span> <span class="p2"></span> <span class="p3"></span> <span class="p4"></span> <span class="p5"></span></div>
			<div class="tada">
				<form action="">
					<p class="head"><a href="{{ route('user.create') }}">Registrate</a></p>
					<div class="name">
						<label>Nombre</label><input type="text" name="name"></input>
					</div>
					<div class="name">
						<label>Apellidos</label><input type="text" name="name"></input>
					</div>
					<div class="name">
						<label>Fecha de nacimiento</label><input type="text" name="name"></input>
					</div>
					<div class="mail">
						<label>Email</label><input type="mail" name="mail"></input>
					</div>
					<div class="uid">
						<label>Curso</label><input type="text" name="uid"></input>
						</br>
					</div>
					<div class="pwd">
						<label>Contraseña</label><input type="text" name="pwd"></input>
					</div>
					
					<a href="#" class="log" type="submit">ACCEDER
				</a>
					<a href="#" class="close-x-2">X
				</a>
				</form>
			</div>
		</div>
	</body>
	<style type="text/css">
		.site-link{
      padding: 5px 15px;
			position: fixed;
			z-index: 99999;
			background: #303030;
			box-shadow: 0 0 4px rgba(0,0,0,.14), 0 4px 8px rgba(0,0,0,.28);
			right: 30px;
			bottom: 30px;
			border-radius: 10px;
		}
    .site-link a{
      text-decoration: none;
      color: #0af !important;
    display: inline-block;
    }
		.site-link img{
      
			width: 30px;
			height: 30px;
		}
	</style>
    
    
<!--Inspiration from: http://ertekinn.com/loginsignup/-->
<!-- <form class="form-signin center">
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
</form> -->
@endsection

<!-- @section('main')
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
@endsection -->