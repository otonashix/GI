<?php session_start();
	//Con esta sacamos a los sin usuario y sin rango
	if(!isset($_SESSION["idusuario"]) 
		|| !isset($_SESSION["nombreusuario"]) 
		|| !isset($_SESSION["nickusuario"])){
		echo"<script> window.location = 'index.php';</script>";	
	}	
	else{
		 @session_unset();
		 echo"<script> window.location = 'index.php';</script>";
	}		
?>
<html lang="es" dir="ltr">
	<head>
		<title>Concretol - Cerrar sesion </title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	</head>
	
</html>