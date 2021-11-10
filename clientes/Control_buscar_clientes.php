<?php 
include '../php_class/phpconnection.php';
$connection = new createCon();
$connection->connect();
//por si algun momento se cola un vacio, la primera defensa es required del html
if (isset($_POST["buscadorcategoria"])&&isset($_POST["buscadornombre"])) {

	
	$php_selected = $_POST["buscadorcategoria"];
	$php_abuscar = $_POST["buscadornombre"]."%";

	$query = "SELECT * FROM km_clientes ";
	$php_cantidad=0;

	//PARA EL SELECT
	switch ($php_selected ) {
		case 1:
			//Si buscan por id
			$query.="WHERE cliCednit LIKE ?;";
			break;
		case 2:
			//Si buscan por nombre LIKE
			$query.="WHERE cliNombre LIKE ?;";
			break;
		case 3:
			//Si buscan por USUARIO LIKE
			$query.="WHERE cliTelefono LIKE ?;";
			break;

		case 4:
			//Si buscan por USUARIO LIKE
			$query.="WHERE cliEmail LIKE ?;";
			break;

		case 5:
			//Si buscan por TODO LIKE
			$query.=";";
			break;
		default:
			$query="SELECT * FROM km_clientes;";
			break;
	}
	
	$stmt = mysqli_prepare($connection->myconn,$query);
	
	switch ($php_selected) {
		case 1:
			//Si buscan por id
			$stmt->bind_param('i',$php_abuscar);

			break;
		case 2:
			//Si buscan por nombre LIKE
			$stmt->bind_param('s',$php_abuscar);
			
			break;

		case 3:
			//Si buscan por USUARIO LIKE
			$stmt->bind_param('s',$php_abuscar);
			break;

		case 4:
			//Si buscan por USUARIO LIKE
			$stmt->bind_param('s',$php_abuscar);
			break;

		case 5:
			//Si buscan por TODO :v		
			break;
		default:			
			$stmt->bind_param('s',$php_abuscar);
			break;
	}

	

	$stmt->execute();
	$result = $stmt->get_result();

	?>		
	<table class="alt" >
	<thead>
		<tr>											
			<th>Nº</th>	
			<th>Cedula/Nit</th>
			<th>Nombre/Razon Social</th>
			<th>Telefono</th>
			<th>Email</th>
			<th>Opcion Nº1</th>
			<th>Opcion Nº2</th>

			</tr>
		</thead>
	<tbody id="table_tbodyid">   
	<div id="pageMessage"></div>
	<?php
	$php_cont = 1;
	//MIRAR CAPACIDAD DE LOS CARACTERES DE LA FUNCION JS
	while($fila = $result->fetch_assoc()){
    	
    	 ?>
    	 <tr> 
		<td><?php echo $php_cont++; ?></td>  
		<td><?php echo htmlspecialchars($fila['cliCednit']); ?></td>
		<td><?php echo htmlspecialchars($fila['cliNombre']); ?></td>
		<td><?php echo htmlspecialchars($fila['cliTelefono']); ?></td>
		<td><?php echo htmlspecialchars($fila['cliEmail']); ?></td>


		<!--$connection->monkeyCrypt(htmlspecialchars($fila['idUsuario']),1);-->
		<?php $phpid = "id=".$connection->monkeyCrypt(htmlspecialchars($fila['cliId'].'(*)'.$fila['cliNombre']),1);?>
		
		<td><a href='javascript:eliminar(<?php echo json_encode($phpid); ?>)' class="button fit small">Borrar</a></td>

		<td><a  class="button fit small" href="<?php echo 'editar.php?id='.$connection->monkeyCrypt(htmlspecialchars($fila['cliId']),1); ?>">Editar</a></td>
		

      	<?php

      	$php_cantidad++;
  	}



	?>
	<tr > 			
		<td align="left" colspan=4>
			<a  class="button alt fit" href="log.php">Registro de Actividad</a></td>  
			<td align="right" colspan=2>
			<?php echo "Fueron encontrados <b>".$php_cantidad."</b> elementos."; ?></td>	
     </tr>
	</tbody>
	</table>
  	<?php

	exit;

}
?>

