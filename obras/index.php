<?php session_start();
	//comprobar session y redireccionar
if(!isset($_SESSION["idusuario"] ) 
	|| !isset($_SESSION["nombreusuario"]) 
	|| !isset($_SESSION["nickusuario"])|| $_SESSION["idrango"]<3){
	@session_unset();
echo"<script> window.location = '../elements.html';</script>";
}	


//comprobar session
include '../php_class/phpconnection.php';
$connection = new createCon();
$connection->connect();	
?>

<html lang="es" dir="ltr">
<head>
	<title>Registrar - Alpha by HTML5 UP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="../assets/css/main.css" />
	<script src="../js/jquery.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function (e) {
			$("#Login").on('submit',(function(e) {
				e.preventDefault();
				$("#pageMessage").empty();
				


				
				$.ajax({
					url: "index_2_ajax.php",    
					type: "POST",             
					data:  new FormData(this),    
					contentType: false,          
					cache: false,        
					processData:false,       
					success: function(data)     
					{     
						$("#pageMessage").html(data);
						


					}         
				});
			}));

			$("#Login2").on('submit',(function(e) {
				e.preventDefault();
				$("#pageMessage2").empty();
				


				
				$.ajax({
					url: "index_3_ajax.php",    
					type: "POST",             
					data:  new FormData(this),    
					contentType: false,          
					cache: false,        
					processData:false,       
					success: function(data)     
					{     
						$("#pageMessage2").html(data);
						


					}         
				});
			}));

		});


	</script>
	<style type="text/css">

	#suggestions {
		box-shadow: 2px 2px 8px 0 rgba(0,0,0,.2);

		height: auto;
	}

	#suggestions .suggest-element {
		text-align: left;
		background-color: #EEEEEE;
		border-top: 1px solid #d6d4d4;
		cursor: pointer;

		width: 100%;
		float: left;
		padding: 2px 10px 2px 25px;
	}
</style>

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
							<li><a href="../obras">Registrar obras</a></li>

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
		
		<div class="box" >


			

			<div id="pageAnimation" align="center">
				<img src ="../images/load.gif">
			</div>

			<div id="pageContent" class="container">
				<form id="Login" name ="Login" action="" method="post">

					<div class="row gtr-50 gtr-uniform " >






						<div class="col-6 col-12-mobilep" style=" padding: 5px 10px;
						border: PowderBlue 2px solid;
						border-radius: 20px;">
						<h4>Paso 1. Elija un cliente.</h4>
						<input type="text" id="selected" list="browsers" name="browser" oninput='onInput()' style="width: 100%" autocomplete="off">
						<input type="hidden" id="indexselected" name="indexselected">

						<datalist id="browsers">
							<?php $connection->km_log($connection); ?>


						</datalist>

					</div>
					<div class="col-6 col-12-mobilep">
						<div align="center" id="verificado" style='padding: 5px 10px;border: PowderBlue 2px solid; border-radius: 20px;'><h3>Instrucciones</h3><h4>Seleccione un cliente de la lista desplegable</h4>
						</div>
					</div>


				</div>
			</form>

			<div  class="row gtr-50 gtr-uniform" >

				<div class='col-6 col-12-mobilep' style=' padding: 2px 10px;
				border: PowderBlue 2px solid;
				border-radius: 20px;'>

				<h4>Paso 2. Registrar Obra</h4>
				

				<form id="Login2" name ="Login2" action="" method="post">
					<div class='col-6 col-12-mobilep'>

						

						<input type="text" name="cod" placeholder="Codigo*" autocomplete="off" required="">
					</div>
					<br>
					<div class='col-6 col-12-mobilep'>
						<input type="text" name="desc" placeholder="Descripcion*" autocomplete="off" required="">
					</div>
					<br>
					<div class='col-6 col-12-mobilep'>
						<input type="text" name="dir" placeholder="Direccion*" autocomplete="off" required="">
					</div>

					<br>
					<input type="hidden" id="indexselected2" name="indexselected2">

					<input type="submit" name="realizar" id="realizar"  value="Registrar" onclick='onclack()' style="width: 100%">
					
				</form>
			</div>
			<div class='col-6 col-12-mobilep'>

				
				<div id="general">
					
				</div>
				
			</div>
			
		</div>	

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

	var data = {}; 
	$("#browsers option").each(function(i,el) {
		data[$(el).val()] = $(el).data("value");
	});
        //console.log(data, $("#browsers option").val());
        function onInput() {
        	$('#indexselected').val('');
        	$('#verificado').html("<h3 style='color: red'>Validacion Incorrecta</h3><h4 style='color:red'>*El cliente  no existe en la base de datos <br></h4>");

        	document.getElementById("realizar").disabled = false;

        	$.each(data, function(value, index) {
        //alert(index + " - " +value);
        if (value ===  $('#selected').val() || index ===  $('#selected').val()) {
        	$('#verificado').html("<h3>Validacion Correcta</h3><h4 >El cliente  fue seleccionado</h4><div class='col-6 col-12-mobilep'><input type='submit' name='ejecutar' id='ejecutar' value='Mostrar Tabla' style='width:100%' onclick='onclock()'></div>");
        	$('#selected').val(index);
        	$('#indexselected').val(value);
        	$('#indexselected2').val(value);
        }
    });

        }
        function onclock(){
        	document.getElementById("general").innerHTML = "<div id='pageMessage'></div>";

        }
        function onclack(){
        	document.getElementById("general").innerHTML = "<div id='pageMessage2'></div>";

        }

        document.getElementById("realizar").disabled = true;

    </script>


</body>
</html>