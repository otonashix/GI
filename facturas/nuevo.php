<?php session_start();
include '../php_class/phpconnection.php';
include '../php_class/phpempresas.php';
$connection = new createCon();
$empresas = new phpEmpresas();

$connection->connect();

if(!isset($_SESSION["idusuario"] ) 
	|| !isset($_SESSION["nombreusuario"]) 
	|| !isset($_SESSION["nickusuario"])|| $_SESSION["idrango"]<3){
	@session_unset();
echo"<script> window.location = '../elements.html';</script>";
}	

$id_cliente= $_GET['cli'];
$id_obra= $_GET['obra'];


$query = "SELECT cl.cliNombre,o.nombreObra FROM km_clientes cl, km_obras o  WHERE cl.cliId=? AND o.idObra=?";

$stmt = mysqli_prepare($connection->myconn,$query);
$stmt->bind_param("ii",$id_cliente,$id_obra);

$stmt->execute();
$result = $stmt->get_result();


$php_empresas = $empresas->getArrayDataMonkey('km_empresas','idEmpresa','nombre',' ORDER BY nombre DESC');

date_default_timezone_set('America/Bogota');
	//comprobar session y redireccionar

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
	<script type="text/javascript"> 

		$(document).ready(function (e) {
			$("#Nuevo").on('submit',(function(e) {
				e.preventDefault();
				$("#pageMessage").empty(); 
				$('#pageContent').hide();
				$('#pageAnimation').show();   

				$.ajax({
					url: "nuevo_ajax2.php",    
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
							<li><a href="../remisiones/index.php">Registrar remisiones</a></li>
							<li><a href="indexf.php">Crear Facturas</a></li>
							

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
							<li><a href="../obras/index.php">Registrar obras</a></li>
							



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
		<section id="main" class="container" >
			<header>
				<h2>Nueva factura</h2>
				<p>En esta página creara nuevas facturas.<br>
					<?php echo date("Y-m-d  H:i:s",strtotime("+18 hours"));?></p>

				</header>
				<div class="box">
					<form id="Nuevo" name ="Nuevo" action="" method="post">

						
						<div id="pageAnimation" align="center">
							<img src ="../images/load.gif">
						</div>			
						<div id="pageContent">
							<div class="row gtr-50 gtr-uniform"  style=" padding: 5px 10px;
							border: PowderBlue 2px solid;
							border-radius: 20px;">
							<div id="pageMessage"></div>
							<div class="col-12">	
								<h3>Titulo</h3>
								<input type="text" name="titulo" id="titulo" value="" placeholder="TITULO*" required />

							</div>


							<?php while($fila = $result->fetch_assoc()){ ?>

								<div class="col-6 col-12-mobilep">	
									<h3>Nombre/Razon social:</h3>

									<label><?php echo strtoupper($fila['cliNombre']);?></label>
									<input type="hidden" name="clid" id="clid" value="<?php echo $id_cliente; ?>" />
								</div>

								<div class="col-6 col-12-mobilep">
									<h3>Obra:</h3>

									<label><?php echo strtoupper($fila['nombreObra']);?></label>
									<input type="hidden" name="ido" id="ido" value="<?php echo $id_obra ?>" />

								</div>

							<?php } ?>

							<div class="col-6 col-12-mobilep">
								<h3>Fecha de emision</h3>
								<input  type="date" name="fechaemi" id="fechaemi" required />

							</div>

							<div class="col-6 col-12-mobilep">
								<h3>Fecha de vencimiento</h3>
								<input  type="date" name="fechaven" id="fechaven" required />

							</div>


							<div class="col-6 col-12-mobilep">
								<h3>Valor</h3>
								<input type="text" name="valor" id="valor" value="" placeholder="1.000.000" onkeyup="format(this)" required/>

							</div>

							<div class="col-6 col-12-mobilep" style="word-wrap: break-word;">				
								<h2 style="font-size:7vw;text-align: center;" id="h2valor" >$</h2>
							</div>
							<div class="col-12">
								<h3>Anexar Imagen</h3>

								<input  type="file" name="imgfactura" id="imgfactura" accept="image/x-png,image/jpeg" />
							</div>
							
							<div class="col-12">
								<h3>Remisiones</h3>
								<input type="button" name="mostrar" id="mostrar" value="Mostrar tabla" onclick="oninputmostrar()" style="width: 100%" >
							</div>
							<div id="pageMessage2" class="col-12">
							</div>

							
							<div class="col-12">
								<hr>
								<h3>Notas</h3>
								<textarea id="notas" name="notas">...</textarea>
							</div>
							<div class="col-6 col-12-mobilep">
								<input type="submit" value="Guardar" onclick="onclack()" style="width: 100%;" />
							</div>
							<div class="col-6 col-12-mobilep">
								<input type="reset" value="Limpiar" style="width: 100%;" />
							</div>

						</div>							
					</form>
				</div>
			</div>

		</section>s

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

		function oninputmostrar(){
			var idcli=<?php echo $id_cliente; ?>;
			var obraid=<?php echo $id_obra; ?>;

			$.ajax({
				url: "index_remi_2_ajax.php",    
				type: "POST",             
				data: {
					ajax_idcli:idcli,
					ajax_idobra:obraid
				}, 

				success: function(data)     
				{     
					$("#pageMessage2").html(data);



				}         
			});
			

		}
		function onclack(){
			$('html, body').animate({ scrollTop: $('#pageAnimation').offset().top }, 'slow');

	}

	</script>
</body>
</html>