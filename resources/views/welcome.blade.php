
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
			<div>
			<img src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.educadigital.es%2Fwp-content%2Fuploads%2F2015%2F05%2FLogo.png&f=1&nofb=1" class="imagen-auca" />
			</div>
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
					<p class="head">Registrate</a></p>
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
@endsection
