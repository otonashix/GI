<?php 
include '../php_class/phpconnection.php';
$connection = new createCon();
$connection->connect();
if(isset($_POST['cod'])&&isset($_FILES['imgfiles'])&& isset($_POST['indexselected2'])&& isset($_POST['indexselected4']))
{
	$date = "".date('Y/m/d h:i:s', time());
	$php_id=htmlspecialchars($_POST['indexselected2']);
	$php_id2=htmlspecialchars($_POST['indexselected4']);
	$php_codigo = htmlspecialchars($_POST['cod']);
	
	$image = htmlspecialchars($_FILES['imgfiles']['name']);
	$ruta = htmlspecialchars($_FILES['imgfiles']['tmp_name']);
	$php_filesexten = strrchr($_FILES['imgfiles']['name'],".");
	$php_serial = strtoupper(substr(hash('sha1', $_FILES['imgfiles']['name'].$date),0,40));

	$php_cantidad=0;


	$php_validarcodigo=consulta_oto("codigoRemi",$php_codigo,"Codigo");
	if($php_validarcodigo==0){

		$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/images/Remisiones-imagenes/'; 
		$php_tempfoto = ('images/Remisiones-imagenes/'.$php_serial.$php_filesexten);

//id usuario es cliente 
		$query ="INSERT INTO km_remisiones (codigoRemi,imagenRemi,cliId,idObra) values(?,?,?,?);";	
		$stmt = mysqli_prepare($connection->myconn,$query);
		$stmt->bind_param('ssii',$php_codigo,$php_tempfoto,$php_id,$php_id2);

 		//si excute == true, es que se guardo correctamente.

		if($stmt->execute()){

			$tempvalue = $php_serial.$php_filesexten;
			$php_movefile = move_uploaded_file($ruta,$carpeta_destino.$tempvalue);


			$query ="SELECT * FROM km_remisiones WHERE cliId = ? and idObra=? order by idRemi desc;";	
			$stmt = mysqli_prepare($connection->myconn,$query);
			$stmt->bind_param('ii',$php_id,$php_id2);

			if($stmt->execute()){

				$result = $stmt->get_result();
				?>
				<h4 style="text-align: center; color: green">*Se agrego un nuevo registro</h4>
				<div  class='col-12' style=' padding: 5px 10px;
				border: PowderBlue 2px solid;
				border-radius: 20px;overflow-y: auto; height: 323px; width: 100%;'>
				
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
			} 

		}
	}



	function consulta_oto($campo,$valor,$texto){

		global $connection;
		$cont= 0; 

		$query = "SELECT * FROM km_remisiones WHERE ".$campo." = ?";
		$stmt = mysqli_prepare($connection->myconn,$query);
    //("ss") son doble string usuarios="juan" password ="cola"
    //("si") string e integer, "juan",10

		$stmt->bind_param("s",$valor);


		$stmt->execute();

		$result = $stmt->get_result();

		while($fila = $result->fetch_assoc()){

			$cont++;

		}
		if($cont>0){?>

			<div class="col-6 col-12-mobilep" style=" padding: 5px 10px;
			border: PowderBlue 2px solid;
			border-radius: 20px;">
			<br>
			<h3 style="color: red">Alertas(!)</h3>

			<?php echo "<h4 style='color:red'>"."*El ".$texto." ya existe en la base de datos <br></h4>";?>

		</div>


	<?php  }
	return $cont;


}




?>


