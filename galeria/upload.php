<?php session_start();
//mkdir("testing");
//copy('../index.php', 'testing/index.php');


date_default_timezone_set('America/Bogota');
include '../php_class/phpconnection.php';
$connection = new createCon();
$connection->connect();
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
		<title>Generic - Factura_1</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" href="../dist/css/lightbox.min.css">
		<script src="../js/jquery.min.js"></script>		
    <script type="text/javascript"> 

    $(document).ready(function (e) {
    $("#uploadform").on('submit',(function(e) {
    e.preventDefault();
    $("#pageMessage").empty();    
    $('#pageAnimation').show();   
   
    $.ajax({
      url: "upload_ajax.php",    
      type: "POST",             
      data:  new FormData(this),    
      contentType: false,          
          cache: false,        
      processData:false,       
      success: function(data)     
        { 
        	
		  document.getElementById("subir").disabled = true;
          $("#pageMessage").html(data);        
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
					<h1><a href="index.html">Alpha</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="../index.html">Home</a></li>
							<li>
								<a class="icon fa-angle-down">Facturas</a>
								<ul>
									<li><a href="../facturas/explorar.php?vk=WXNNY2NVRytxQ2lTNm1GYVU3dHA4QT09&page=1">Explorar</a></li>
									<li><a href="../facturas/nuevo.php">Nuevo</a></li>
								</ul>
							</li>
							<li>
								<a class="icon fa-angle-down">Galeria</a>
								<ul>
									<li><a href="index.php">Explorar</a></li>
									<li><a href="upload.php">Subir</a></li>
								</ul>
							</li>
							<li>
								<a class="icon fa-angle-down">Usuarios</a>
								<ul>
									<li><a href="../usuarios/Control_usuarios.php">Ver lista</a></li>
									<li><a href="../usuarios/Registrar.php">Registrar Usuario</a></li>
									<li><a href="../usuarios/log.php">Registro de actividad</a></li>
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
				<section id="main" class="container">
					<header>
						<h2>Subir imagenes</h2>
						<p>En esta página subira imagenes de facturas.<br>
							<?php echo date("Y-m-d  H:i:s",strtotime("+18 hours"));?></p>

					</header>
					<div class="box">
						<form id="uploadform" name ="uploadform" method="post" enctype="multipart/form-data" action="upload.php">
							<div class="row gtr-50 gtr-uniform">
								<div class="col-12">	
									<h3>Empresa</h3>
									<select name="empresa" id="empresa" onchange="document.getElementById('test_text').value=this.options[this.selectedIndex].text">										
									<?php
										foreach(glob('../uploads/*', GLOB_ONLYDIR) as $dir) {
    									$dirname = basename($dir);
    									echo "<option value='".$dirname."'>".$dirname."</option>";
										}
									?>
										
									<input type="hidden" id="test_text" name="test_text" value="ALL">
								</div>
								<div class="col-12">	
									<h3>Cargar imagenes - Maximo (3) imagenes</h3>
									 <input name="upload[]" type="file" name="galeriafiles" id="galeriafiles" multiple="multiple" accept="image/x-png,image/jpeg" />
								</div>
								<div class="col-12">
									<input type="submit" id="subir" value="Subir" style="width: 100%;" />	
								</div>
							</div>
							<hr>
							<div id="pageMessage"></div>
							<div id="pageAnimation" align="center">
								<img src ="../images/load.gif">
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
$('input#galeriafiles').change(function(){
    var files = $(this)[0].files;
    if(files.length > 3){
        alert("Maximo 3 imagenes.");
        document.getElementById("galeriafiles").value = ""
        document.getElementById("subir").disabled = true;
    }
    else{
    	document.getElementById("subir").disabled = false;
    }
});

$(document).ready(function(){
        $('#galeriafiles').change(function(){
              var fp = $("#galeriafiles");
              var lg = fp[0].files.length; // numero de archivos a cargar ex 3
              var items = fp[0].files; //ahora las items
              var fileSize = 0;         

           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   fileSize = fileSize+items[i].size; // obtiene el tamaño
               }
               if(fileSize > 5242880) { //El limite 5mb bien
                    alert('el peso de los archivos es mayor a 5MB, seleccione menos archivos.');
                    document.getElementById("Consulta").disabled = true;
               }
               else{
               		document.getElementById("Consulta").disabled = false;
               }
           }
        });
    });
			</script>

	</body>
</html>