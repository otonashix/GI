<?php
//Lo contrario a encriptar.

$php_empresas = $empresas->getArrayDataMonkey('km_empresas','idEmpresa','nombre',' ORDER BY nombre DESC');



$php_eidfactura = $connection->monkeyCrypt(htmlspecialchars($_GET["vk"]),2);
$explodewords = explode("[K]", $php_eidfactura);


$query = "SELECT kmf.*,kme.*,kmu.*
	FROM km_facturas kmf 
	INNER JOIN km_empresas kme 
	ON kme.idEmpresa = kmf.idEmpresa
	INNER JOIN km_usuarios kmu 
	ON kmu.idUsuario = kmf.idUsuario
	WHERE idFactura = ?;";

	$stmt = mysqli_prepare($connection->myconn,$query);
  	$stmt->bind_param("i",$explodewords[0]);

  	if($stmt->execute()){
  		$result = $stmt->get_result();
  		while($fila = $result->fetch_assoc()){
  			?>	
  			<div class="col-12">	
				<h3>Titulo</h3>
				<input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($fila['titulo']);?>" placeholder="<?php echo htmlspecialchars($fila['titulo']);?>" required />
				<input type="hidden" name="vk" id="vk" value="<?php echo htmlspecialchars($_GET["vk"]);?>" placeholder="<?php echo htmlspecialchars($_GET["vk"]);?>" />
			</div>
			
			<div class="col-12">
				<h3>Empresa</h3>
				<select name="empresa" id="empresa" required><?php $empresas->setOptionAndSelectecMonkey($php_empresas,htmlspecialchars($fila['idEmpresa']));?></select>
			</div>
			
			<div class="col-6 col-12-mobilep">
				<h3>Valor</h3>
				<input type="text" name="valor" id="valor" value="<?php echo htmlspecialchars(number_format($fila['valor']));?>" placeholder="<?php echo htmlspecialchars($fila['valor']);?>" onkeyup="format(this)" required/>
			</div>
			
			<div class="col-6 col-12-mobilep" style="word-wrap: break-word;">				
				<h2 style="font-size:7vw;text-align: center;" id="h2valor" >$<?php echo htmlspecialchars(number_format($fila['valor']));?></h2>
			</div>
			
			<div class="col-12">
				<hr>
			</div>	
			
			<div class="col-12">
				<h3>¿Donde subir imagenes?</h3>
				<a href="../galeria/upload.php" class="button fit small" target="_blank">Clic para subir imagenes</a>
			<hr>
			</div>
			<div class="col-9 col-12-mobilep">
				<h3>Nombre factura Nº1</h3>
				<input type="text" name="nombrefactura1" id="nombrefactura1" value="<?php echo htmlspecialchars($fila['nombre1']);?>" placeholder="Nombre Factura Nº1*" required/>	
			</div>
			<div class="col-3 col-12-mobilep">
				<span class="image fit">
					<a id="imagenfactura1href" href="<?php echo htmlspecialchars($fila['imagen1']);?>" data-lightbox="uploads">
						<img alt="" id="imagenfactura1src" src="<?php echo htmlspecialchars($fila['imagen1']);?>" style="width:15%px;height:113px;" />
					</a>
				</span>
			</div>
			<div class="col-9 col-12-mobilep">
				<h3>URL factura Nº1</h3>
				<input type="text" name="imagenfactura1" id="imagenfactura1" value="<?php echo htmlspecialchars($fila['imagen1']);?>" placeholder="URL*" required/>
			</div>
			<div class="col-3 col-12-mobilep">
				<h3>Visualizar</h3>
				<a class="button fit" onclick="showImage('imagenfactura1','imagenfactura1src','imagenfactura1href')" >ver</a>
			</div>
			<div class="col-12">
				<hr>
			</div>
			<div class="col-9 col-12-mobilep">
				<h3>Nombre factura Nº2</h3>
				<input type="text" name="nombrefactura2" id="nombrefactura2" value="<?php echo htmlspecialchars($fila['nombre2']);?>" placeholder="<?php echo htmlspecialchars($fila['nombre2']);?>" required/>	
			</div>
			<div class="col-3 col-12-mobilep">
				<span class="image fit">
					<a id="imagenfactura2href" href="<?php echo htmlspecialchars($fila['imagen2']);?>" data-lightbox="uploads">
						<img alt="" id="imagenfactura2src" src="<?php echo htmlspecialchars($fila['imagen2']);?>" style="width:15%px;height:113px;" />
					</a>
				</span>
			</div>
			<div class="col-9 col-12-mobilep">
				<h3>URL factura Nº2</h3>
				<input type="text" name="imagenfactura2" id="imagenfactura2" value="<?php echo htmlspecialchars($fila['imagen2']);?>" placeholder="URL*" required/>
			</div>
			<div class="col-3 col-12-mobilep">
				<h3>Visualizar</h3>
				<a class="button fit" onclick="showImage('imagenfactura2','imagenfactura2src','imagenfactura2href')" >ver</a>
			</div>
			<div class="col-12">
				<hr>
			</div>
			<div class="col-9 col-12-mobilep">
				<h3>Nombre factura Nº3</h3>
				<input type="text" name="nombrefactura3" id="nombrefactura3" value="<?php echo htmlspecialchars($fila['nombre3']);?>" placeholder="<?php echo htmlspecialchars($fila['nombre3']);?>" required />	
			</div>
			<div class="col-3 col-12-mobilep">
				<span class="image fit">
					<a id="imagenfactura3href" href="<?php echo htmlspecialchars($fila['imagen3']);?>" data-lightbox="uploads">
						<img alt="" id="imagenfactura3src" src="<?php echo htmlspecialchars($fila['imagen3']);?>" style="width:15%px;height:113px;" />
					</a>
				</span>
			</div>
			<div class="col-9 col-12-mobilep">
				<h3>URL factura Nº3</h3>
				<input type="text" name="imagenfactura3" id="imagenfactura3" value="<?php echo htmlspecialchars($fila['imagen3']);?>" placeholder="URL*" required/>
			</div>
			<div class="col-3 col-12-mobilep">
				<h3>Visualizar</h3>
				<a class="button fit" onclick="showImage('imagenfactura3','imagenfactura3src','imagenfactura3href')" >ver</a>
			</div>
			<div class="col-12">
				<hr>
				<h3>Notas</h3>
			<textarea id="notas" name="notas"><?php echo htmlspecialchars($fila['notas']);?></textarea>
			</div>
			<div class="col-12">
				<input type="submit" value="Guardar" style="width: 100%;" />
			</div>
			<?php
  		}//end while
  	}//end execute


?>

