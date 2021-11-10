<?php session_start();
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
	<title>Usuarios - Alpha by HTML5 UP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="../assets/css/main.css" />


	<script src="../js/jquery.min.js"></script>
	<script type="text/javascript"> 
		$(document).ready(function (e) {
			$("#buscarusuarios").on('submit',(function(e) {
				e.preventDefault();
		$("#table_tbodyid").empty();  //elimina los registros de la tabla

		//luego se oculta en un archivo js separado  <script src="mijquery.min.js">...
		$.ajax({
        	url: "Control_buscar_clientes.php",   	// Url to which the request is send
			type: "POST",      				// Type of request to be send, called as method
			data:  new FormData(this), 		// Data sent to server, a set of key/value pairs representing form fields and values 
			contentType: false,       		// The content type used when sending data to the server. Default is: "application/x-www-form-urlencoded"
    	    cache: false,					// To unable request pages to be cached
			processData:false,  			// To send DOMDocument or non processed data file it is set to false (i.e. data should not be in the form of string)
			success: function(data)  		// A function to be called if request succeeds
			{			
			//$("#message").html(data);
			$("#table_tbodyid").html(data);	
			
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
							
							<li><a href="Control_clientes.php">Explorar</a></li>
							<li><a href="Registrar_clientes.php">Registrar cliente</a></li>
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
		
		
		<div id="main" class="container">

			


			<form id="buscarusuarios" name ="buscarusuarios" action="" method="post">
				
				<div class="row gtr-uniform">
					
					<div class="col-6 col-12-xsmall">	

						<label for="name">Categoria</label>						
						<select name="buscadorcategoria" id="buscadorcategoria" onchange="myFunction(event)">	
							<option value="1">Nit</option>
							<option value="2">Por Nombre del cliente</option>
							<option value="3">Por Telefono del cliente</option>
							<option value="4">Por Email del cliente</option>
							<option value="5">Todos</option>
						</select>
						<script type="text/javascript">
    									//Es facil, si selecciona todos,de lo contrario lo activa
    									function myFunction(e) {
    										var buscadorCategoria = document.getElementById("buscadorcategoria");
    										var form_tipo = buscadorCategoria.options[buscadorCategoria.selectedIndex].value;
    										if(form_tipo==5){
    											document.getElementById("buscadornombre").value ="TODO";
    											
    										}
    										else {
    											document.getElementById("buscadornombre").value ="";
    											
    										}
    										
    									}
    								</script>
    							</div>

    							<div class="col-6 col-12-xsmall">
    								<label for="name">¿Que desea buscar?</label>
    								<input name="buscadornombre" id="buscadornombre" placeholder="Buscar..." type="text" required>
    							</div>
    							
    							<div class="col-6 col-12-xsmall">
    							</div>
							<!--	<div class="col-6 col-12-xsmall">
									<label for="name">Fecha inicial / Fecha final</label>

								       
		<input type="date" name="effective-date" minlength="1" maxlength="64" placeholder=" " autocomplete="nope" required="required"></input>
        <input type="date" name="effective-date" minlength="1" maxlength="64" placeholder=" " autocomplete="nope" required="required"></input>      
    
								</div>
							-->
							<div class="col-12">
								<input type="submit" name="Buscar" value="Buscar" id="Consulta" class="button primary fit" >			
							</div>
							
							
						</div>
					</form>


					<div class="table-wrapper" id="table_tbodyid">				
						
						<table class="alt" >
							
							<thead>
								<tr>											
									<th>Nº</th>	
									<th>Cedula/Nit</th>
									<th>Nombre/Razon Social</th>
									<th>Telefono</th>
									<th>Email</th>
									<th>Opcion Nº1</th>
									<th>Opcion Nº2</th>
								</tr>
							</thead>	
							
						</table>	
						
					</div>
					<!-- PAGINACION -->
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