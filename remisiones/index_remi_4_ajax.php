<?php
include '../php_class/phpconnection.php';
$connection = new createCon();
$connection->connect();



$query = " SELECT * from km_obras where cliId=?";
$stmt = mysqli_prepare($connection->myconn,$query);
$php_val = $_POST['ajax_placa'];
$stmt->bind_param('i',$php_val);

$stmt->execute();
$result = $stmt->get_result();
while ($fila = $result->fetch_assoc()) {
	echo "<option data-value='".htmlspecialchars($fila['codigoObra']."-".$fila['nombreObra'])."' value='".$fila['idObra']."'>".htmlspecialchars($fila['codigoObra']."-".$fila['nombreObra'])."</option>";
}




?>