<?php
session_start();
include '../php_class/phpconnection.php';
include 'funciones.php';
$connection = new createCon();
$connection->connect();



$php_id = $connection->monkeyCrypt(htmlspecialchars($_GET['id']),2);
$explodewords = explode("(*)", $php_id);

$query="DELETE  FROM km_usuarios WHERE idUsuario= ?";

$funcion_eliminar=log_oto($_SESSION["idusuario"],$_SESSION["nombreusuario"],3,$explodewords[1]);

    $stmt = mysqli_prepare($connection->myconn,$query);
    $stmt->bind_param("i",$explodewords[0]);
   if($stmt->execute()){
    
  
		echo "<script type='text/javascript'> 
		window.location = 'Control_usuarios.php';</script>";
   	
		
     
	}else{

		echo "<script type='text/javascript'>alert('ocurrio un error, intente nuevamente'); 
		window.location = 'Control_usuarios.php';</script>";
		
	}


		
?>