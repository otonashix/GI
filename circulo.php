<?php
$image=imagecreate(800,600); 
		imagecolorallocate($image, 255, 255,255); 
		include("coneccion.php");
		$consulta=mysql_query("SELECT COUNT(m.mov_tip), ci.ciu_nom FROM movimientos m INNER JOIN tiposmov t ON (m.mov_tip = t.tim_cod AND t.tim_nat = 'DEB') INNER JOIN cuentas c ON (m.mov_cue = c.cue_cod AND c.cue_est = 'ACT') INNER JOIN usuarios u ON (c.cue_usu = u.usu_doc) INNER JOIN ciudades ci ON (u.usu_ciu = ci.ciu_cod) GROUP BY ci.ciu_cod;") or die(mysql_error());
		
		$registro=mysql_fetch_array($consulta);
		$i=0;
		$cont=0;
		$t=0;
//		echo "<table border>";
	do{
	 $nom[$i]=$registro['ciu_nom'];
	 $valor[$i]=$registro['COUNT(m.mov_tip)'];
	 $cont++;
	 $t=$t+$valor[$i];
	 $i++;
	//echo "<tr><td>$fecha</td> <td> $valor</td></tr>";
	} while ($registro=mysql_fetch_array($consulta));
//echo "</table>";

$v=0;
	for($i=0;$i<$cont;$i++){
		

			imagefilledrectangle($image,30, 30+($i*40),50,50+($i*40),imagecolorallocate($image, 230,$i+20, $i*200));
			imagestring($image,3,70, 35+($i*40),$valor[$i],imagecolorallocate($image,0,0,0));
			imagestring($image,3,120, 35+($i*40),' = '.$nom[$i],imagecolorallocate($image,0,0,0));

			$v1=(($valor[$i]*360)/$t);

			imagefilledarc($image,500, 200, 400, 400,$v,$v1+$v, imagecolorallocate($image, 230,$i+20, $i*200), IMG_ARC_PIE);
			$v=$v+$v1;


}
		
		
		

 imagepng($image,"im2.png"); 
 imagedestroy($image);
?>
 <!DOCTYPE html>
<html>
	<head>
		<title> EJERCICIO TERCER CORTE</title>
	</head>
	<body>
		<H3>
				
		<CENTER>
				<img src="im2.png" alt="" width="800" height="600"/>
			</CENTER>
	</body>
</html>
