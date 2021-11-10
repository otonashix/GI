<?php 
include '../php_class/phpconnection.php';
$connection = new createCon();
$connection->connect();
if(isset($_POST['cod'])&&isset($_POST['desc']) &&isset($_POST['dir']))
{
$php_id=htmlspecialchars($_POST['indexselected2']);
$php_codigo = htmlspecialchars($_POST['cod']);
$php_descripcion = htmlspecialchars($_POST['desc']);
$php_direccion=htmlspecialchars($_POST['dir']);
$php_cantidad=0;


$php_validarcodigo=consulta_oto("codigoObra",$php_codigo,"Codigo");
	if($php_validarcodigo==0){


//id usuario es cliente 
$query ="INSERT INTO km_obras (codigoObra,nombreObra,direccionObra,cliId) values(?,?,?,?);";	
$stmt = mysqli_prepare($connection->myconn,$query);
$stmt->bind_param('sssi',$php_codigo,$php_descripcion,$php_direccion,$php_id);
 		//si excute == true, es que se guardo correctamente.

if($stmt->execute()){


	$query ="SELECT * FROM km_obras WHERE cliId = ?;";	
	$stmt = mysqli_prepare($connection->myconn,$query);
	$stmt->bind_param('i',$php_id);
 		
	if($stmt->execute()){

		$result = $stmt->get_result();
		?>
		<h4 style="text-align: center; color: green">*Se agrego un nuevo registro</h4>
		<div class='col-6 col-12-mobilep' style=' padding: 5px 10px;
				border: PowderBlue 2px solid;
				border-radius: 20px;overflow-y: auto; max-height: 323px; max-width: 511.33px;'>
				
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

}
}



function consulta_oto($campo,$valor,$texto){

    global $connection;
    $cont= 0; 

    $query = "SELECT * FROM km_obras WHERE ".$campo." = ?";
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


