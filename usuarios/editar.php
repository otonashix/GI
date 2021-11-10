<?php session_start();
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
    $("#ActualizarForm").on('submit',(function(e) {
    e.preventDefault();
    $("#pageMessage").empty(); 
    $('#pageContent').hide();
    $('#pageAnimation').show();   
    
    $.ajax({
      url: "Editar_ajax.php",    
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

  </script>

	</head>


<?php




	include '../php_class/phpconnection.php';
	$connection = new createCon();
	$connection->connect();

	$Id = $connection->monkeyCrypt(htmlspecialchars($_GET['id']),2);

	$query = "SELECT * FROM km_usuarios WHERE idUsuario= ?";
    $stmt = mysqli_prepare($connection->myconn,$query);
    //("ss") son doble string usuarios="juan" password ="cola"
    //("si") string e integer, "juan",10
    $stmt->bind_param("i",$Id);
    $stmt->execute();

    $result = $stmt->get_result();

?>
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
						<h2>Editar Registro</h2>
						<p>Actualizacion</p>
					</header>
					<div class="box">
						<form id="ActualizarForm" name ="ActualizarForm" action="" method="post">
							<div id="pageMessage"></div>
							<div id="pageAnimation" align="center">
								<img src ="../images/load.gif">
							</div>
							<div id="pageContent" align="center">

							<?php  while($fila = $result->fetch_assoc()){?> 

							<div class="row gtr-50 gtr-uniform">
								
															
									<input readonly="readonly" type="hidden" style="text-align:center;" name="id" id="id" value="<?php echo $_GET['id']; ?>" placeholder="Nombre" required="" autocomplete="off" />
								

								<div align="center" class="col-12">
									<h3>Nombre*</h3>
									<input type="text" style="text-align:center;"  name="nom" id="nom" value="<?php echo $fila['nombreUsuario'];?>"  required="" autocomplete="off" />
								</div>

								<div align="center"   class="col-6 col-12-mobilep">
									<h3>Usuario*</h3>
									<input type="text" name="usu" style="text-align:center;"  id="usu" value="<?php echo $fila['nickUsuario'];?>"  required="" autocomplete="off" />
								</div>

								<div align="center"  class="col-6 col-12-mobilep">
									<h3>Contraseña*</h3>
									<input type="password"  style="text-align:center;" name="pass" id="pass" value="<?php echo $fila['contraUsuario'];?>"  required="" autocomplete="off" />
								</div>

								<div align="center"  class="col-12">
									<h3>Email*</h3>
									<input type="email" style="text-align:center;"  name="email" id="email" value="<?php echo $fila['emailUsuario'];?>"  required="" autocomplete="off" />
								</div>
								
								<div align="center" class="col-6 col-12-mobilep">								
									<input type="submit" id="Actualizar" value="Actualizar" style="width: 100%"/>
								</div>
								<div align="center" class="col-6 col-12-mobilep">								
									<a href="Control_usuarios.php"><input 
									type="button" id="volver" value="Volver" style="width: 100%"/></a>
								</div>
								</div>

							<?php } ?>
						
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