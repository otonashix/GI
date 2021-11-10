<?php session_start();
@$_SESSION["loginintento"] = $_SESSION["loginintento"]+1;

if($_SESSION["loginintento"]>=5){
  //intentos mayores a 5, ya no conectaran a la base de datos.
  ?>

     <div id="message">Inicio de sesion bloqueado, por muchos intentos.</div>      
  <?php
}
else{
  
include 'php_class/phpconnection.php';
$connection = new createCon();
$connection->connect();

//por si algun momento se cola un vacio, la primera defensa es required del html
if (isset($_POST["usuario"])&&isset($_POST["contrasenia"])) {

  // se pueden guardar en variables o sar directamente el $_post

  $php_usuario = htmlspecialchars($_POST["usuario"]);
  $php_password = htmlspecialchars(md5($_POST["contrasenia"]));

  $php_nick = "";
  $php_id = 0;
  $php_rowsql=0;
  
  $query = "SELECT * FROM km_usuarios WHERE nickUsuario = ? AND contraUsuario = ?;";

  $stmt = mysqli_prepare($connection->myconn,$query);
  //("ss") son doble string usuarios="juan" password ="cola"
  //("si") string e integer, "juan",10
  $stmt->bind_param("ss",$php_usuario,$php_password);
  $stmt->execute();

  //Usar bind_param es para mas de 1 parametro, aca logi y pass
  //bindValue es para solo 1 parametro, no esta mal, pero lo dice stackoverflow :,v 

  $result = $stmt->get_result();

  while($fila = $result->fetch_assoc()){

    $php_id = htmlspecialchars($fila['idUsuario']); 
    $php_usuario = htmlspecialchars($fila['nombreUsuario']);      
    $php_nick = htmlspecialchars($fila['nickUsuario']); 
    $php_rango = htmlspecialchars($fila['idRol']); 
    $php_rowsql++;

  }
  $stmt->close(); 

     if($php_rowsql>0){

      $_SESSION["idusuario"]= $php_id;
      $_SESSION["nombreusuario"]= $php_usuario;
      $_SESSION["nickusuario"]= $php_nick;
      $_SESSION["idrango"]= $php_rango;   
      //Segun los rangos de la base de datos
      //El echo con script, pasa que el servidor en internet, putos servidores
      //No dejan usar el header, tiran error siempre con eso, mejor usar el script para redireccionar.
      $_SESSION["loginintento"]==1;
      echo"<script> window.location = 'redireccion.php/';</script>";

  }
  else if ($php_rowsql<=0){
      //Ese mensaje se puede arreglar tambien la div xD
      ?>
          <div id="message"> [*]Error usuario u contraseña  - <?php echo " [Intento ".$_SESSION["loginintento"]." de  5]";?></div>      
      <?php
  }
  
  }
  
    
}//Sesion bloqueada

?>

