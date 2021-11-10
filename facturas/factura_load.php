<?php 


	$php_idbusqueda = $connection->monkeyCrypt(htmlspecialchars($_GET["vk"]),2);

	$explodewords = explode("[K]", $php_idbusqueda);
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
	<header>
		<h2>Factura  <?php echo $explodewords[0];?></h2>
		<p>(En caso de quejas, realizarla cn el numero de factura.)</p>
	</header>
		
	<div class="box">
	
			<h2 align="center"><b><?php echo htmlspecialchars(strtoupper($fila['titulo']));?></b></h2>
			<h3><?php echo htmlspecialchars($fila['nombre']);?></h3>	
			<h3>$ <?php echo htmlspecialchars(number_format($fila['valor']));?></h3>
			<hr>			
			<h3>Fotos</h3>
			
				<div class="box alt">
					<div class="row gtr-50 gtr-uniform">
						<div class="col-4">
							<span class="image fit">								
								<a href="<?php echo htmlspecialchars($fila['imagen1']);?>" data-lightbox="factura" data-title="<?php echo htmlspecialchars(strtoupper($fila['nombre1']));?>">
								<img style="width:15%px;height:190px;" src="<?php echo htmlspecialchars($fila['imagen1']);?>" alt="<?php echo htmlspecialchars(strtoupper($fila['nombre1']));?>" title="<?php echo htmlspecialchars(strtoupper($fila['nombre1']));?>"/ />
								</a>
							</span>
						</div>
						<div class="col-4">
							<span class="image fit">
								<a href="<?php echo htmlspecialchars($fila['imagen2']);?>" data-lightbox="factura"data-title="<?php echo htmlspecialchars(strtoupper($fila['nombre2']));?>">
								<img style="width:15%px;height:190px;" src="<?php echo htmlspecialchars($fila['imagen2']);?>" alt="<?php echo htmlspecialchars(strtoupper($fila['nombre2']));?>" title="<?php echo htmlspecialchars(strtoupper($fila['nombre1']));?>"/ />
								</a>
							</span>
						</div>
						<div class="col-4">
							<span class="image fit">
								<a  href="<?php echo htmlspecialchars($fila['imagen3']);?>" data-lightbox="factura" data-title="<?php echo htmlspecialchars(strtoupper($fila['nombre3']));?>">
								<img style="width:15%px;height:190px;" src="<?php echo htmlspecialchars($fila['imagen3']);?>" alt="<?php echo htmlspecialchars(strtoupper($fila['nombre3']));?>" title="<?php echo htmlspecialchars(strtoupper($fila['nombre3']));?>"/ />
								</a>
							</span>
						</div>
					</div>
				</div>
				<hr>
				<h3>Notas</h3>
					<blockquote><h4><?php echo htmlspecialchars($fila['notas']);?></h4></blockquote>
				<h3>Responsable: <?php echo htmlspecialchars($fila['nombreUsuario']);?></h3>
				
				<div class="row gtr-50 gtr-uniform">
					<div class="col-12">						
						<a href="#" class="button icon fa-download" style="width: 100%;"> Descargar PDF</a>
					</div>						
				</div>
				<hr>
				<div class="table-wrapper">
					<table class="alt">						
						<tbody>
							<tr>
								<td width="20%">Titulo</td>
								<td><?php echo htmlspecialchars($fila['titulo']);?></td>
							</tr>
							<tr>
								<td >Valor</td>
								<td>$ <?php echo htmlspecialchars(number_format($fila['valor']));?></td>
							</tr>
							<tr>
								<td >Empresa</td>
								<td><?php echo htmlspecialchars($fila['nombre']);?></td>
							</tr>
							<tr>
								<td >Facturas</td>
								<td>
									<ul>
										<li><a href="<?php echo htmlspecialchars($fila['imagen1']);?>" data-lightbox="tabfactura"><?php echo htmlspecialchars($fila['nombre1']);?></a></li>
										<li><a href="<?php echo htmlspecialchars($fila['imagen2']);?>" data-lightbox="tabfactura"><?php echo htmlspecialchars($fila['nombre2']);?></a></li>
										<li><a href="<?php echo htmlspecialchars($fila['imagen3']);?>" data-lightbox="tabfactura"><?php echo htmlspecialchars($fila['nombre3']);?></a></li>
									</ul>
								</td>
							</tr>
							<tr>
								<td >Notas</td>
								<td><?php echo htmlspecialchars($fila['notas']);?></td>
							</tr>
							<tr>
								<td >Responsable</td>
								<td><?php echo htmlspecialchars($fila['nombreUsuario']);?></td>
							</tr>
							<tr>
								<td >Descargas</td>
								<td>
									<ul>
										<li>PDF</li>
									</ul>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="row gtr-50 gtr-uniform">
					<div class="col-6 col-12-mobilep">
						<a href="editar.php?vk=<?php echo $_GET["vk"];?>" class="button" style="width: 100%;"> EDITAR</a>
					</div>
					<div class="col-6 col-12-mobilep">
						<a href="#opkm" class="button" style="width: 100%;">Borrar</a>
							<div id="opkm" class="modalDialog" >
								<div>
								<a href="#clkm" title="Close" class="close">X</a>
								<form id="Borrar" name ="Borrar" action="" method="post">
								<div id="pageMessage"></div>	
								<h2>Borrar factura</h2>		
								<div class="col-12">
									<input type="hidden" name="vk" name="vk" value="<?php echo htmlspecialchars($_GET["vk"]);?>">
									<textarea id="razons" name="razons" style="resize: none;" placeholder="Escriba la razón por la cual desea borrar esta factura" required></textarea>
								</div>
								<br>
								<div class="col-12">
									<input type="submit" value="Borrar" style="width: 100%;" />
								</div>
								</form>
							</div>
						</div>
					</div>

				</div>
			
		</div>
<?php
		}//end while
	}//end execute
?>