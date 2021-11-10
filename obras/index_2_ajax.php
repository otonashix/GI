<?php 

include '../php_class/phpconnection.php';
$connection = new createCon();
$connection->connect();
if(isset($_POST['indexselected'])){

	$php_cantidad=0;
	$php_usuario = $_POST['indexselected'];
	$query ="SELECT * FROM km_obras WHERE cliId = ?;";	
	$stmt = mysqli_prepare($connection->myconn,$query);
	$stmt->bind_param('i',$php_usuario);



	if($stmt->execute()){

		$result = $stmt->get_result();
		?>
		
		<div class='col-6 col-12-mobilep' style=' padding: 5px 10px;
		border: PowderBlue 2px solid;
		border-radius: 20px;overflow-y: auto; max-height: 323px; max-width: 511.33px;' >
		<table>
			<thead>
				<tr>
					<th>Nº</th>
					<th>Codigo</th>
					<th>Description</th>
					<th>Direccion</th>
				</tr>
			</thead>
			<tbody>

				<?php while($fila = $result->fetch_assoc()){?>
					<tr>
					<td data-label="Nº"><?php echo $php_cantidad+1 ?></td>
					<td data-label="Codigo"><?php echo $fila['codigoObra']?></td>
					<td data-label="Description"><?php echo $fila['nombreObra']?></td>
					<td data-label="Direccion"><?php echo $fila['direccionObra']?></td>

					</tr>

					<?php $php_cantidad++;} ?>

				</tbody>
			</table>

		</div>
		<div class='col-6 col-12-mobilep' style="text-align: center;">
			<?php echo "Fueron encontrados <b>".$php_cantidad."</b> elementos.";?>
		</div>





		<?php 
	} 
}









?>


