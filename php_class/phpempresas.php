<?php

class phpEmpresas{

function getArrayDataMonkey($php_table,$campo1,$campo2,$condition){
			//porque el global, jode la funcion al llamar la conexion y asi funciono v:
	global $connection;
	$query= "SELECT * FROM ".$php_table." ".$condition." ;";
	$stmt = mysqli_prepare($connection->myconn,$query);
	$stmt->execute();
	$result = $stmt->get_result();
	$rowsArray= array();
			
		while($fila = $result->fetch_assoc()){
				$rowsArray[$fila[$campo1]] = $fila[$campo2];
		}		
		$stmt->close();
	return $rowsArray;
}

function setOptionAndSelectecMonkey($array,$fila){
	foreach ($array as $index => $row){
		if($index == $fila){
			echo '<option value="'.$index.'" selected>'.$row.'</option>'; 
		}
		else{
			echo '<option value="'.$index.'">'.$row.'</option>'; 
		}
	}
}

}





?>