<?php 

include '../php_class/phpconnection.php';
$connection = new createCon();
$connection->connect();


	$php_cantidad=0;
	$php_usuario = $_POST['ajax_idcli'];
	$php_obra = $_POST['ajax_idobra'];


	$query ="SELECT * FROM km_remisiones WHERE cliId = ? AND idObra = ? order by idRemi desc;";	
	$stmt = mysqli_prepare($connection->myconn,$query);
	$stmt->bind_param('ii',$php_usuario,$php_obra);



	if($stmt->execute()){

		$result = $stmt->get_result();
		?>
		
		<div class='col-12' style=' padding: 5px 10px;
		border: PowderBlue 2px solid;
		border-radius: 20px;overflow-y: auto; height: 323px; width: 100%;' >
		<table>
			<thead>
				<tr>
					<th>Nº</th>
					<th>Codigo</th>
					<th>Imagen</th>
					
				</tr>
			</thead>
			<tbody>

				<?php while($fila = $result->fetch_assoc()){?>
					<tr>

						<td data-label="Nº"><?php echo $php_cantidad+1 ?></td>
						<td data-label="Codigo"><?php echo $fila['codigoRemi']?></td>
						<td data-label="Imagen">	
							<span class="image fit">
								<a class="button small fit" href="<?php echo '../'.$fila['imagenRemi']; ?>" data-lightbox="Remisiones">
								ver imagen
								</a>
							</span>	</td>



						</tr>

						<?php $php_cantidad++;} ?>

					</tbody>
				</table>

			</div>
			<div class='col-12' style="text-align: center;">
				<?php echo "Fueron encontrados <b>".$php_cantidad."</b> elementos.";?>
			</div>





			<?php 
		} 
	









	?>


