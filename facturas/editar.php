<?php session_start();
include '../php_class/phpconnection.php';
include '../php_class/phpempresas.php';
$connection = new createCon();
$empresas = new phpEmpresas();

$connection->connect();

date_default_timezone_set('America/Bogota');
	//comprobar session y redireccionar
if(!isset($_SESSION["idusuario"] ) 
	|| !isset($_SESSION["nombreusuario"]) 
	|| !isset($_SESSION["nickusuario"])|| $_SESSION["idrango"]<3){
	@session_unset();
echo"<script> window.location = '../elements.html';</script>";
}	

if(!isset($_GET['vk'])){
	echo"<script> window.location = '../index.php';</script>";	
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
	<title>Concretol - Editar</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="../assets/css/main.css" />
	<script src="../js/jquery.min.js"></script>
	<link rel="stylesheet" href="../dist/css/lightbox.min.css">
	<script type="text/javascript"> 

		$(document).ready(function (e) {
			$("#Nuevo").on('submit',(function(e) {
				e.preventDefault();
				$("#pageMessage").empty(); 
				$('#pageContent').hide();
				$('#pageAnimation').show();   

				$.ajax({
					url: "editar_ajax.php",    
					type: "POST",             
					data:  new FormData(this),    
					contentType: false,          
					cache: false,        
					processData:false,       
					success: function(data)     
					{     
						$("#pageMessage").html(data);
						$('#pageContent').show();
						$('#pageAnimation').hide();  
					}         
				});
			}));
		});

	</script>
</head>
<body class="is-preload">
	<div id="page-wrapper">

		<!-- Header -->
		<header id="header">
			<h1><a href="../index.html">Alpha</a></h1>
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
				<h2>Nueva factura</h2>
				<p>En esta página creara nuevas facturas.<br><?php echo date("Y-m-d  H:i:s",strtotime("+18 hours"));?></p>

			</header>
			<div class="box">
				<form id="Nuevo" name ="Nuevo" action="" method="post">

					<div id="pageMessage"></div>
					<div id="pageAnimation" align="center">
						<img src ="../images/load.gif">
					</div>			
					<div id="pageContent">
						<div class="row gtr-50 gtr-uniform">

							<?php include 'editar_load.php'; ?>
						</div>
					</div>
				</form>				
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
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script src="../dist/js/lightbox-plus-jquery.min.js"></script>

	<script type="text/javascript">
		$('#pageAnimation').hide();

		function format(input){
			var num = input.value.replace(/\./g,'');
			if(!isNaN(num)){
				num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
				num = num.split('').reverse().join('').replace(/^[\.]/,'');
				input.value = num;
				document.getElementById("h2valor").innerHTML  = "$ "+num;
			}

			else{ 	
				input.value = input.value.replace(/[^\d\.]*/g,'');
			}
		}

	</script>
	<script type="text/javascript">
		function showImage(varInput,varImage,varEnlace){	
			var nameimage = document.getElementById(varInput).value;
			document.getElementById(varImage).src=""+nameimage;
			document.getElementById(varEnlace).href=""+nameimage;
		}
	</script>
</body>
</html>