<?php

$date = "".date('Y/m/d h:i:s', time());
$php_folder = '/uploads/'.$_POST['test_text'];
$php_serial ="";
$total = count($_FILES['upload']['name']);
$php_filesarray = array();
$php_rutafilesarray = array();
$php_filesexten = array();
$php_serial = array();

$carpeta_destino = $_SERVER['DOCUMENT_ROOT'].$php_folder.'/';	

//carga de nombres y extenciones.
for( $i=0 ; $i < $total ; $i++ ) {

	$php_filesarray[$i] = $_FILES['upload']['name'][$i];
	$php_filesexten[$i] = strrchr($_FILES['upload']['name'][$i],".");
	$php_rutafilesarray[$i] = $_FILES['upload']['tmp_name'][$i];
	$php_serial[$i] = strtoupper(substr(hash('sha1', $_FILES['upload']['name'][$i].$date),0,40));

}

?>
	<div class="box alt">
	<div class="row gtr-50 gtr-uniform">
<?php  
for( $i=0 ; $i < $total ; $i++ ) {
	$tempvalue = $php_serial[$i].$php_filesexten[$i];
	$php_movefile = move_uploaded_file($php_rutafilesarray[$i],$carpeta_destino.$tempvalue);

	if($php_movefile){	
 		?>
		<div class="col-4">	
			<span class="image fit" >
				<a href="<?php echo $php_folder.'/'.$tempvalue;?>" data-lightbox="factura">
				<img src="<?php echo $php_folder.'/'.$tempvalue;?>" alt="" style="width:15%px;height:190px;"/></a>
			</span>
		</div>
		<?php
 	}

	else{
		echo 'Error al subir subir'.$php_filesarray[$i];
	}
}
?>

</div>
</div>

<?php

echo "".$php_folder;
?>
