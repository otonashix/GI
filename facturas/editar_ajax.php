<?php session_start();
include '../php_class/phpconnection.php';
$connection = new createCon();
$connection->connect();

if(isset($_POST['titulo'])
  && isset($_POST['vk'])
  && isset($_POST['nombrefactura1'])
  && isset($_POST['imagenfactura1'])
  && isset($_POST['nombrefactura2'])
  && isset($_POST['imagenfactura2'])  
  && isset($_POST['nombrefactura3'])
  && isset($_POST['imagenfactura3'])
  && isset($_POST['empresa'])
  && isset($_POST['valor'])
  && isset($_POST['notas'])
  )
{

 
  $php_vk = $connection->monkeyCrypt(htmlspecialchars($_POST['vk']),2);

  $php_titulo = htmlspecialchars($_POST['titulo']);
  //Mi host tiene diferencia de 1 horas, toca acomodar luego.

  $php_nombrefactura1 = htmlspecialchars($_POST['nombrefactura1']);
  $php_nombrefactura2 = htmlspecialchars($_POST['nombrefactura2']);
  $php_nombrefactura3 = htmlspecialchars($_POST['nombrefactura3']);

  //Mueve las imagenes, tiene un contador para saber cuando ocurren errores al subir.
  $php_imagen1 = htmlspecialchars($_POST['imagenfactura1']);
  $php_imagen2 = htmlspecialchars($_POST['imagenfactura2']);
  $php_imagen3 = htmlspecialchars($_POST['imagenfactura3']);

  $php_empresa = htmlspecialchars($_POST['empresa']);
  //remplaza los . por limpio para poder guardar.
  $php_valor = str_replace(".","",htmlspecialchars($_POST['valor']));
  $php_valor = str_replace(",","",$php_valor);
  $php_notas = htmlspecialchars($_POST['notas']);
 

  $explodewords = explode("[K]", $php_vk);
 //$query ="UPDATE post_preventiva SET idTipoVehiculo=?, placaPost=?, pathPost=?,modeloPost=?,fallasPost=?,observacionesPost=?,hserialPost=?,fechaPost=?,idUsuario=?,idEmpresa=?,idEstadoRev=? WHERE idPost = ? ";


    //Si entra a esta condicion, solo falta el insert into y ya!
    $query ="UPDATE km_facturas SET titulo = ?,nombre1 = ?,nombre2 = ?,nombre3 = ?,imagen1 = ?,imagen2 = ?,imagen3 = ?,idEmpresa = ?,idUsuario = ?,valor = ?,notas = ? WHERE idFactura = ?"; 

    $stmt = mysqli_prepare($connection->myconn,$query);
    $stmt->bind_param('sssssssiissi',$php_titulo,$php_nombrefactura1,$php_nombrefactura2,$php_nombrefactura3,$php_imagen1,$php_imagen2,$php_imagen3,$php_empresa,$_SESSION["idusuario"],$php_valor,$php_notas,$explodewords[0]);

    if($stmt->execute()){
      
      echo "Informacion actualizada correctamente.";

    }
    else{
      echo "ocurrio un error, recargue esta pagina inmediatamente.";
    }

  }
  



  exit;
  ?>