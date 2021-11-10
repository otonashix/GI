<!DOCTYPE HTML>
<?php session_start();
	//comprobar session y redireccionar
if(!isset($_SESSION["idusuario"] ) 
	|| !isset($_SESSION["nombreusuario"]) 
	|| !isset($_SESSION["nickusuario"])|| $_SESSION["idrango"]<4){
	@session_unset();
	echo"<script> window.location = '../elements.html';</script>";
}	

include '../php_class/phpconnection.php';
include 'funciones.php';
$connection = new createCon();
$connection->connect();
$query="SELECT l.nomResponsable,l.accionResponsable,l.nomUsuario,r.nombreRol FROM log_responsables l, km_roles r WHERE( l.idRol= r.idRol);";
$stmt = mysqli_prepare($connection->myconn,$query);
$stmt->execute();
$result = $stmt->get_result();
$cont=1;
?>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Historial- Alpha by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />


		<!--<script src="js/jquery.min.js"></script>
    <script type="text/javascript"> 
		$(document).ready(function (e) {
		$("#buscarusuarios").on('submit',(function(e) {
		e.preventDefault();
		$("#table_tbodyid").empty();  //elimina los registros de la tabla

		//luego se oculta en un archivo js separado  <script src="mijquery.min.js">...
		$.ajax({
        	url: "Control_buscar_usuarios.php",   	// Url to which the request is send
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

	</script>-->
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
				<section id="main" class="container ">
					<header >
						<h2>Registro de actividad</h2>
						<p>Historial de acciones realizadas</p>
					</header>
					<div id="main">
							<div class="table-wrapper" id="table_tbodyid">				
									
									<table class="alt" >
							
										<thead>
										<tr>
											<th>Nº</th>
											<th>Responsable</th>							
											<th>Accion</th>
											
														

											</tr>
										</thead>
									<tbody id="table_tbodyid">   
									<div id="pageMessage"></div>
									<?php
									$php_cantidad=0;
									while($fila = $result->fetch_assoc()){
    	
    	 							?>
							    	 <tr> 
							    	 <td><?php echo $cont++; ?></td>
									<td><?php echo $fila['nomResponsable']; ?></td>


									<?php 
									$valor=0;
									if($fila['accionResponsable']==1){
										$valor="Registro";
									}
									elseif ($fila['accionResponsable']==2) {
										$valor="Edito";
									}
									else {
										$valor="Elimino";
									}

									?>

									<td><?php accion_oto($valor,$fila['nomUsuario'],$fila["nombreRol"]);?></td>
									
									
							      	</tr>

      								<?php

      									$php_cantidad++;
  									}



									?>
						<tr > 			
						<td align="left" colspan=2>
							<a  class="button alt fit" href="Control_usuarios.php"> Control de usuarios</a></td>  
							<td align="Center" colspan=1>
							<?php echo "Fueron encontrados <b>".$php_cantidad."</b> elementos."; ?></td>	
							     </tr>
								</tbody>
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