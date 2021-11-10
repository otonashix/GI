<?php session_start();

include 'php_class/phpconnection.php';
$connection = new createCon();
$connection->connect();

	//comprobar session y redireccionar
	if(isset($_SESSION["idusuario"]) 
		|| isset($_SESSION["nombreusuario"]) 
		|| isset($_SESSION["nickusuario"])){
		echo"<script> window.location = 'redireccion.php';</script>";	
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

		<title>Iniciar sesión</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script src="js/jquery.min.js"></script>
    <script type="text/javascript"> 

    $(document).ready(function (e) {
    $("#Login").on('submit',(function(e) {
    e.preventDefault();
    $("#pageMessage").empty(); 
    $('#pageContent').hide();
    $('#pageAnimation').show();   
    
    $.ajax({
      url: "index_ajax.php",    
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
					
					<nav id="nav">
						<ul>
							<li><a href="index.html">Home</a></li>			
							<li><a href="index.html">Otro</a></li>		
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container medium">
					<header>
						<h2>Iniciar sesión</h2>
						<p>Ingrese su usuario y contraseña.</p>
					</header>
					<div class="box">
						<form id="Login" name ="Login" action="" method="post">
							<div id="pageMessage"></div>
							<div id="pageAnimation" align="center">
								<img src ="images/load.gif">
							</div>
							<div id="pageContent" align="center">
							<div class="row gtr-50 gtr-uniform">							

								<div class="col-12">
									<h3>Usuario</h3>
									<input type="text" name="usuario" id="usuario" value="" placeholder="usuario" autocomplete="off"/>
								</div>
								<div class="col-12">
									<h3>Contraseña</h3>
									<input type="password" name="contrasenia" id="contrasenia" value="" placeholder="***" autocomplete="off"/>
								</div>
								<div class="col-12">									
									<input type="submit" value="Ingresar" style="width: 100%"/>
								</div>
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
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script type="text/javascript">
				$('#pageAnimation').hide();
	   		</script>

	</body>
</html>