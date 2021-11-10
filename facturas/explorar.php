<?php session_start();
date_default_timezone_set('America/Bogota');
include '../php_class/phpconnection.php';
include '../php_class/phpempresas.php';

$connection = new createCon();
$empresas = new phpEmpresas();
$connection->connect();

$php_empresas = $empresas->getArrayDataMonkey('km_empresas','idEmpresa','nombre',' ORDER BY nombre DESC');

	//comprobar session y redireccionar
if(!isset($_SESSION["idusuario"] ) 
	|| !isset($_SESSION["nombreusuario"]) 
	|| !isset($_SESSION["nickusuario"])|| $_SESSION["idrango"]<3){
	@session_unset();
	echo"<script> window.location = '../elements.html';</script>";
}	

?>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<!DOCTYPE HTML>
<html>
<head>
	<title>Concretol - Nuevo</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="../assets/css/main.css" />
	<script src="../js/jquery.min.js"></script>
	<link rel="stylesheet" href="../dist/css/lightbox.min.css">
	<style>
	.accordion {

		background-color: #666;
		border-radius: 6px;
		border: 0;
		color: #ffffff;
		cursor: pointer;
		display: inline-block;
		font-weight: 400;
		height: 3em;
		line-height: 3em;
		padding: 0 1em;	
		text-decoration: none;
		white-space: nowrap;
		width: 100%;

	}

	.accordion:after {
		color: #777;
		font-weight: bold;
		float: right;
		margin-left: 5px;
		height:48px; 
	}



	.panel {
		padding: 0 18px;
		background-color: white;
		max-height: 0;
		overflow: hidden;
		transition: max-height 0.2s ease-out;
	}
</style>
</head>
<body class="is-preload">
	<div id="page-wrapper">

		<!-- Header -->
		<header id="header">

			<nav id="nav">
				<ul>
					<li><a href="explorar.php?vk=WXNNY2NVRytxQ2lTNm1GYVU3dHA4QT09&page=1">Home</a></li>


				
					<li><a class="icon fa-angle-down">Galeria</a>
						<ul>
							<li><a href="../galeria/">Explorar</a></li>
							<!--<li><a href="../galeria/upload.php">Subir</a></li>-->
						</ul>
					</li>

					

					<li>
						<a class="icon fa-angle-down">Facturas</a>
						<ul>
							<li><a href="explorar.php?vk=WXNNY2NVRytxQ2lTNm1GYVU3dHA4QT09&page=1">Explorar</a></li>
							<li><a href="../remisiones/">Registrar remisiones</a></li>
							<li><a href="indexf.php">Crear Facturas</a></li>
							

						</ul>
					</li>
					

					
					<li>
						<a class="icon fa-angle-down">Clientes</a>
						<ul>
							
							<li><a href="../clientes/Control_clientes.php">Explorar</a></li>
							<li><a href="../clientes/Registrar_clientes.php">Registrar cliente</a></li>
							<li><a href="../obras/">Registrar obras</a></li>

						</ul>
					</li>
					



					<?php if($_SESSION["idrango"]==4){ ?>
	


					<li>
						<a class="icon fa-angle-down">Usuarios</a>
						<ul>
							<li><a href="../usuarios/Control_usuarios.php">Explorar</a></li>
							<li><a href="../usuarios/Registrar.php">Registrar Usuario</a></li>
							<li><a href="../usuarios/log.php">Registro de actividad</a></li>
						</ul>
					</li>
				<?php }	?>

					<li>

						<a class="icon fa-angle-down"><?php echo strtoupper($_SESSION["nombreusuario"]);?></a>
						<ul>
							<li><a href="">Cambiar contraseña</a></li>
							<li><a href="../cerrar.php">Salir</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</header>

		<!-- Main -->
		<section id="main" class="container">
			<header>
				<h2>Registrar</h2>
				<p>Elige una opcion para empezar</p>
				<div class="row gtr-50 gtr-uniform">

					<div aign="center" class="col-6 col-12-mobilep">

						<a  class="button special fit " href="indexf.php">Factura de venta</a>
					</div>
					<div aign="center" class="col-6 col-12-mobilep">
						<a  class="button special fit  " href="../Remisiones/index.php">Remisiones</a>
					</div>
				</div>
			</header>
			<div class="box">
				<span class="image featured"><img src="../images/pico01.jpg" alt="" /></span>
				<hr>
				<h3>Buscador</h3>						
				<a class="accordion"> ¿No encuentra una factura?</a>
				<div class="panel">
					<form id="Nuevo" name ="Nuevo" action="" method="post">
						<div class="row gtr-50 gtr-uniform">
							<div class="col-6 col-12-mobilep">
								<h3>Fecha de inicio</h3>								
								<input type="date" name="fechainicio" id="fechainicio" required/>
							</div>	
							<div class="col-6 col-12-mobilep">
								<h3>Fecha final</h3>								
								<input type="date" name="fechafinal" id="fechafinal" required/>
							</div>							
							<div class="col-6 col-12-mobilep">
								<h3>Filtro</h3>
								<select name="categoria" id="categoria" onchange="myFunction(event)">	
									<option value="1">Titulo</option>
									<option value="2">Valor</option>
									<option value="3">Notas</option>
									<option value="4">Todo</option>
								</select>
							</div>
							<div class="col-6 col-12-mobilep">
								<h3>Contenido a buscar</h3>
								<input type="text" name="contenido" id="contenido" required/>
							</div>
							<div class="col-6 col-12-mobilep">
								<h3>Empresa</h3>
								<select name="empresa" id="empresa" onchange="document.getElementById('test_text').value=this.options[this.selectedIndex].text"><option value="0">TODAS</option><?php $empresas->setOptionAndSelectecMonkey($php_empresas,1);?></select>
								<input type="hidden" name="test_text" id="test_text" value="TODAS" />
							</div>
							<div class="col-6 col-12-mobilep">
								<h3>Acciones</h3>
								<input type="submit" value="Buscar" style="width: 100%;" />
							</div>
						</div>
					</form>
				</div>
				<hr>

				<div class="table-wrapper">
					<table class="alt">
						<?php include 'explorar_load.php';?>					
					</table>

				</div>
			</div>
		</section>

		<!-- Footer -->
		<footer id="footer">
			<ul class="icons">
				<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
				<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
				<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
				<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
			</ul>
			<ul class="copyright">
				<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
			</ul>
		</footer>

	</div>

	<!-- Scripts -->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/jquery.dropotron.min.js"></script>
	<script src="../assets/js/jquery.scrollex.min.js"></script>
	<script src="../assets/js/browser.min.js"></script>
	<script src="../assets/js/breakpoints.min.js"></script>
	<script src="../assets/js/util.js"></script>
	<script src="../assets/js/main.js"></script>
	<script>

		function myFunction(e) {
			var buscadorCategoria = document.getElementById("categoria");
			var form_tipo = buscadorCategoria.options[buscadorCategoria.selectedIndex].value;
			if(form_tipo==4){
				document.getElementById("contenido").value ="todo";
				document.getElementById("contenido").readOnly = true;
			}
			else{
				document.getElementById("contenido").value ="";
				document.getElementById("contenido").readOnly = false;
			}
		}

		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
			acc[i].addEventListener("click", function() {
				this.classList.toggle("active");
				var panel = this.nextElementSibling;
				if (panel.style.maxHeight){
					panel.style.maxHeight = null;
				} else {
					panel.style.maxHeight = panel.scrollHeight + "px";
				} 
			});
		}
	</script>

</body>
</html>