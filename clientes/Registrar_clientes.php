
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
	<title>Registrar - Alpha by HTML5 UP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="../assets/css/main.css" />
	<script src="../js/jquery.min.js"></script>
	<script type="text/javascript"> 

		$(document).ready(function (e) {
			$("#RegistrarCliente").on('submit',(function(e) {
				e.preventDefault();
				$("#pageMessage").empty(); 
				$('#pageContent').hide();
				$('#pageAnimation').show();   
				
				$.ajax({
					url: "Registrar_clientes_ajax.php",    
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
		

		
		
		
		<div class="box"  >
			<form id="RegistrarCliente" name ="Registrar" action="" method="post">
				
				<div id="pageAnimation" align="center">
					<img src ="../images/load.gif">
				</div>
				<div id="pageContent" class="container">

					<div class="row gtr-uniform gtr-50">


						<div  class="col-6"><!--Columna Nº1-->

							<center>
								<input type="radio" id="priority-normal" onclick="openOpcion('pnat')" name="priority" required="" checked="">
								<label for="priority-normal" >Persona Natural</label>
								<input type="radio" id="priority-high"  onclick="openOpcion('pjur')" name="priority" required="" >
								<label for="priority-high">Persona Juridica</label>

							</center>
							

							
							<div class="col-6 col-12-mobilep" style=" padding: 5px 10px;
							border: PowderBlue 2px solid;
							border-radius: 20px;">
							
							<p align="center">Los campos que contengan (*) son requeridos.</p>
							<h3>Identificacion</h3>
							
							
							<div id="general" class="tabcontent">
								
								
								
								<div class="col-6 col-12-mobilep">

									<input type="text" name="cednat" id="cednat" value="" onkeypress="return numeros(event)" minlength="10" maxlength="10"  placeholder="Cedula*" required="" autocomplete="off"/>
								</div>
								
								
								<br>

								
								<div class="col-6 col-12-mobilep">
									<input type="text" name="nm1" id=nm1 value="" placeholder="Nombre Completo*" required="" autocomplete="off">
								</div>
								
								
								<br>
								<div  class="col-6 col-12-mobilep">
									
									<input type="text" name="nmbcial" id="nmbcial" value="" placeholder="Nombre del C/cial*" required="" autocomplete="off" />
								</div>
								
							</div>
							<input type="hidden" id="cualusa" name="cualusa" value="pnat">

							
							<br>
							
						</div>
						<br>

						<div class="col-6 col-12-mobilep" style=" padding: 5px 10px;
						border: PowderBlue 2px solid;
						border-radius: 20px;">
						<br>
						<h3>Datos Basicos*</h3>
						
						<div  class="col-6 col-12-mobilep">
							<input type="text" name="dr1" id="dr1" value="" placeholder="Direccion Nº1*" required="" autocomplete="off" />
							<br>
						</div>
						<div  class="col-6 col-12-mobilep">
							
							<input type="text" name="dr2" id="dr2" value="" placeholder="Direccion Nº2"  autocomplete="off" />
							<br>
						</div>

						<div  class="col-6 col-12-mobilep">
							
							<input type="text" name="tel" id="tel" value="" placeholder="Telefono Nº1*" required="" autocomplete="off" />
							<br>
						</div>

						<div  class="col-6 col-12-mobilep">
							
							<input type="text" name="tel2" id="tel2" value="" placeholder="Telefono Nº2" autocomplete="off" />
						</div>
						<div class="col-6 col-12-mobilep">
							<br>
							<input type="email" name="email" id="email" value="" placeholder="Email*" required="" autocomplete="off"/>
						</div>

						
						
						<div class="col-6 col-12-mobilep">
							<br>
							<div class="row gtr-uniform gtr-50">
								
								<div class="col-6 col-12-mobilep">
									<input type="text" name="cod" id="cod" value="" placeholder="Codigo municipio*" required="" autocomplete="off"/>
								</div>
								<div class="col-6 col-12-mobilep">
									<select name="muni" id="muni" required>
										<option value="0">Ibague</option>
										<option value="1">Bogota</option>
									</select>
								</div>
								
							</div>
							<br>
							<div class="row gtr-uniform gtr-50">
								
								<div class="col-6 col-12-mobilep">
									<input type="text" name="codpais" id="codpais" value="" placeholder="Codigo pais*" required="" autocomplete="off"/>
								</div>
								<div class="col-6 col-12-mobilep">
									<select name="pais" id="pais" required>
										<option value="0">Colombia</option>
										<option value="1">Venezuela</option>
									</select>
								</div>
								
							</div>

							<div class="col-6 col-12-mobilep">
								<br>
								<input type="text" name="encr" id="encr" value="" placeholder="Encargado*" required="" autocomplete="off"/>
							</div>
							<div class="col-6 col-12-mobilep">
								<br>
								<textarea name="obs" id="obs" placeholder="Observaciones..." rows="3" required=""></textarea>
							</div>
							<br>
						</div>
					</div>
					<br>
					

				</div><!--Fin Nº1-->
				
				

				<div  class="col-6"><!--Columna Nº3-->
					<div id="pageMessage"></div>
					<div class="col-6 col-12-mobilep" style=" padding: 5px 10px;
					border: PowderBlue 2px solid;
					border-radius: 20px;">
					<br>
					<h3>Clasificacion</h3>
					

					
					<div class="col-6 col-12-mobilep">
						<select name="clas" id="clas" required>
							<option value="0">Cliente</option>
							<option value="1">Provedor</option>
						</select>
					</div>
					<div class="col-1 col-12-narrower">
					</div>
					
					
					
					<br>
				</div>
			</br>
			<div class="col-6 col-12-mobilep" style=" padding: 5px 10px;
			border: PowderBlue 2px solid;
			border-radius: 20px;">
			<br>
			<h3>Informacion</h3>

			<div  class="col-6 col-12-mobilep">
				<select name="zn" id="zn" required>
					<option value="0">Urbana</option>
					<option value="1">Rural</option>
				</select>
			</div>
			<div  class="col-6 col-12-mobilep">
				<br>
				<input type="text" name="vend" id="vend" value="" placeholder="Vendedor*" required="" autocomplete="off" />
			</div>
			<div  class="col-6 col-12-mobilep">
				<br>
				<input type="text" name="agcial" id="agcial" value="" placeholder="Agende cial*" required="" autocomplete="off" />
			</div>
			<div  class="col-6 col-12-mobilep">
				<br>
				<input type="text" name="trasp" id="trasp" value="" placeholder="Transporta*" required="" autocomplete="off" />
			</div>
			<div  class="col-6 col-12-mobilep">
				<br>
				<input type="text" name="listpre" id="listpre" value="" placeholder="List Prec*" required="" autocomplete="off" />
			</div>
			<div  class="col-6 col-12-mobilep">
				<br>
				<input type="text" name="ccart" id="ccart" value="" placeholder="Cupo Cartera*" required="" autocomplete="off" />
			</div>
			<div  class="col-6 col-12-mobilep">
				<br>
				<input type="text" name="calf" id="calf" value="" placeholder="Clasificacion*" required="" autocomplete="off" />
			</div>
			<br>
		</div>
		
		
		<br>
		<div class="col-6 col-12-mobilep" style=" padding: 5px 10px;
		border: PowderBlue 2px solid;
		border-radius: 20px;">
		<br>
		<h3>Guardar datos</h3>
		<div class="col-6 col-12-mobilep">
			<input  type="submit" name="enviar" value="Finalizar" style="width: 100%">

		</div>
		<br>

	</div>
	<br>
	
	

	
</div>
</div>
</div>
</form>
</div>
</div>






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

	function openOpcion(varName) {
  // Declare all variables

  document.getElementById("cualusa").value =varName;
  document.getElementById("general").innerHTML="";

  if(varName=='pnat'){
  	document.getElementById("general").innerHTML = "<div class='col-6 col-12-mobilep'><input type='text' onkeypress='return numeros(event)'    name='cednat' id='cendat' value='' placeholder='Cedula*' required='' autocomplete='off'/><br><div class='col-6 col-12-mobilep'><input type='text' name='nm1' id=nm1 value='' placeholder='Nombre Completo*' required='' autocomplete='off'></div><br><div  class='col-6 col-12-mobilep'><input type='text' name='nmbcial' id='nmbcial' value='' placeholder='Nombre del C/cial*' required='' autocomplete='off' /></div>";
  } 
  if(varName=='pjur'){
  	document.getElementById("general").innerHTML = "<div class='col-6 col-12-mobilep'><input type='text' onkeypress='return numeros(event)' name='cedjur' id='cedjur' value='' placeholder='Nit*' required='' autocomplete='off'/></div><br><div  class='col-6 col-12-mobilep'><input type='text' name='rs' id='rs' value='' placeholder='Razon social' required='' autocomplete='off'></div>"
  }

} 



</script>


</body>
</html>