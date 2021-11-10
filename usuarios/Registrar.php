<?php session_start();
include '../php_class/phpconnection.php';
include '../php_class/phpempresas.php';
$connection = new createCon();
$connection->connect();
$empresas = new phpEmpresas();
$php_empresas = $empresas->getArrayDataMonkey('km_empresas','idEmpresa','nombre',' ORDER BY nombre DESC');
	//comprobar session y redireccionar
if(!isset($_SESSION["idusuario"] ) 
	|| !isset($_SESSION["nombreusuario"]) 
	|| !isset($_SESSION["nickusuario"])|| $_SESSION["idrango"]<4){
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
		<title>Registrar - Alpha by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<script src="../js/jquery.min.js"></script>

	    <script type="text/javascript"> 

	    $(document).ready(function (e) {
	    $("#Registrar").on('submit',(function(e) {
	    e.preventDefault();
	    $("#pageMessage").empty(); 
	    $('#pageContent').hide();
	    $('#pageAnimation').show();   
	    
	    $.ajax({
	      url: "Registrar_ajax.php",    
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
	          /*document.getElementById("usu").value = "";
	          document.getElementById("nom").value = "";
	          document.getElementById("email").value = "";
	          */

	        }         
	       });
	    }));
	    });

	function numeros(e){
	    key = e.keyCode || e.which;
	    tecla = String.fromCharCode(key).toLowerCase();
	    letras = " 0123456789";
	    especiales = [8,37,39,46];
	    tecla_especial = false
	    for(var i in especiales){
	 if(key == especiales[i]){tecla_especial = true; break;} }
	 if(letras.indexOf(tecla)==-1 && !tecla_especial){return false;}}

	</script>

  </script>
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					
					<nav id="nav">
				<ul>
					<li><a href="../facturas/explorar.php?vk=WXNNY2NVRytxQ2lTNm1GYVU3dHA4QT09&page=1">Home</a></li>
					<li><a class="icon fa-angle-down">Galeria</a>
						<ul>
							<li><a href="../galeria/">Explorar</a></li>
							<!--<li><a href="../galeria/upload.php">Subir</a></li>-->
						</ul>
					</li>

					<li>
						<a class="icon fa-angle-down">Facturas</a>
						<ul>
							<li><a href="../facturas/explorar.php?vk=WXNNY2NVRytxQ2lTNm1GYVU3dHA4QT09&page=1">Explorar</a></li>
							<li><a href="../remisiones/">Registrar remisiones</a></li>
							<li><a href="../facturas/indexf.php">Crear Facturas</a></li>
							

						</ul>
					</li>
					<!--<li>
						<a class="icon fa-angle-down">Remisiones</a>
						<ul>
							<li><a href="../Remisiones/">Explorar</a></li>
							<li><a href="../Remisiones/upload_remisiones.php">Subir</a></li>

						</ul>
					</li>-->
					<li>
						<a class="icon fa-angle-down">Clientes</a>
						<ul>
							
							<li><a href="../clientes/Control_clientes.php">Explorar</a></li>
							<li><a href="../clientes/Registrar_clientes.php">Registrar cliente</a></li>
							<li><a href="../obras/">Registrar obras</a></li>

						</ul>
					</li>

					<li>
						<a class="icon fa-angle-down">Usuarios</a>
						<ul>
							<li><a href="Control_usuarios.php">Explorar</a></li>
							<li><a href="Registrar.php">Registrar Usuario</a></li>
							<li><a href="log.php">Registro de actividad</a></li>
						</ul>
					</li>

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
				<section id="main" class="container medium">
					<header>
						<h2>Registro</h2>
						<p>Complete el formulario</p>
					</header>
					<div class="box">
						<form id="Registrar" name ="Registrar" action="" method="post">
							<div id="pageMessage"></div>
							<div id="pageAnimation" align="center">
								<img src ="../images/load.gif">
							</div>
							<div id="pageContent" align="center">

							<div class="row gtr-50 gtr-uniform">
								
								<div align="center" class="col-6 col-12-mobilep">
									<h3>Nombre*</h3>
									<input type="text" name="nom" id="nom" value="" placeholder="Nombre" required="" autocomplete="off" />
								</div>

								<div align="center"  class="col-6 col-12-mobilep">
									<h3>Usuario*</h3>
									<input type="text" name="usu" id="usu" value="" placeholder="Usuario" required="" autocomplete="off" />
								</div>


								<div align="center"  class="col-6 col-12-mobilep">
									<h3>Email*</h3>
									<input type="email" name="email" id="email" value="" placeholder="Email" required="" autocomplete="off" />
								</div>
								<div align="center"  class="col-6 col-12-mobilep">
									<h3>Empresa*</h3>
									<select name="empresa" id="empresa" required><?php $empresas->setOptionAndSelectecMonkey($php_empresas,1);?></select>
								</div>

								
								<div align="center" class="col-6 col-12-mobilep">
										<input type="submit"  value="Ingresar" style="width: 100%"/> 
								</div>

								<div align="center" class="col-6 col-12-mobilep">
										<input type="reset"  value="Limpiar" style="width: 100%"/>
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
			<script type="text/javascript">
				$('#pageAnimation').hide();
	   		</script>


	</body>
</html>