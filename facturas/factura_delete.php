<?php session_start();
include '../php_class/phpconnection.php';
$connection = new createCon();
$connection->connect();

if(isset($_POST['vk'])
  && isset($_POST['razons'])){


	$php_vk = $connection->monkeyCrypt(htmlspecialchars($_POST['vk']),2);
	$php_tipo = "factura";
	$php_razon = htmlspecialchars($_POST['razons']);
	$php_datetime = htmlspecialchars(date("Y-m-d  H:i:s",strtotime("+12 hours")));

	$explodewords = explode("[K]", $php_vk);
	//Para el array
	$php_values = array();
	//Para el $values con "[-]"
	$php_content = "";
	//Traer datos de lo que intentan borrar
	$query = "SELECT * FROM km_facturas WHERE idFactura = ?;";
	$stmt = mysqli_prepare($connection->myconn,$query);
	$stmt->bind_param("i",$explodewords[0]);
	if($stmt->execute()){
		$result = $stmt->get_result();
		while($fila = $result->fetch_assoc()){
		 	$php_values = $fila;
		}
		foreach ($php_values as $key => $val) {
   			$php_content.=$val."[-]";
   		}
   		//Hasta tengo los datos que intentan borrar	
   		//Ahora los guardare
   		$query ="INSERT INTO km_log (tipoLog,razonLog,contenidoLog,idUsuario,fecha) VALUES (?,?,?,?,?);"; 
   		$stmt = mysqli_prepare($connection->myconn,$query);
   		$stmt->bind_param('sssis',$php_tipo,$php_razon,$php_content,$_SESSION["idusuario"],$php_datetime);
   		//Guarda el log
   		if($stmt->execute()){

   			$query = "DELETE FROM km_facturas WHERE idFactura = ?;";
   			$stmt = mysqli_prepare($connection->myconn,$query);
			$stmt->bind_param("i",$explodewords[0]);
			//ya se elimino, la llevo el putas :v
			if($stmt->execute()){
				echo "ok";
			}
			else{
				echo "Error, no se elimino la factura";
			}
   		}
   		else{
			echo "Error, no se pudo lograr el log";
		}
	}
	else{
		echo "Error, no se pudo consultar la factura";
	}
}

?>