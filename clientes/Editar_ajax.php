<?php session_start();
include '../php_class/phpconnection.php';
include 'funciones.php';
$connection = new createCon();
$connection->connect();

//por si algun momento se cola un vacio, la primera defensa es required del html
if (isset($_POST["id"])&&isset($_POST["nom"])&&isset($_POST["usu"])&&isset($_POST["pass"])&&isset($_POST["email"])) {

  // se pueden guardar en variables o sar directamente el $_post
  $php_id = $connection->monkeyCrypt(htmlspecialchars($_POST["id"]),2);

  $php_nom =  htmlspecialchars($_POST["nom"]);
  $php_usu =  htmlspecialchars($_POST["usu"]);
  $php_pass =  htmlspecialchars($_POST["pass"]);
  $php_email =htmlspecialchars($_POST["email"]);


  $php_rowsql=0;

  $php_nombre=consulta_oto("nombreUsuario",$php_nom,"Nombre",$php_id);
  $php_usuario=consulta_oto("nickUsuario",$php_usu,"Usuario",$php_id);
  $php_correo=consulta_oto("emailUsuario",$php_email,"Correo",$php_id);

  if($php_usuario==0 && $php_correo==0 && $php_nombre==0 ){

   if (isset($_POST["id"])&&isset($_POST["nom"])&&isset($_POST["usu"])&&isset($_POST["pass"])&&isset($_POST["email"])) {


    $query="UPDATE km_usuarios SET nombreUsuario= ? , nickUsuario=?,contraUsuario=?,emailUsuario=? WHERE idUsuario= ?";
    $stmt = mysqli_prepare($connection->myconn,$query);
    $stmt->bind_param("ssssi",$php_nom,$php_usu,$php_pass,$php_email,$php_id);
    if($stmt->execute()){
      
      ?>
      <div id="message"> El registro se ha actualizado </div> 
      <?php $funcion_editar=log_oto($_SESSION["idusuario"],$_SESSION["nombreusuario"],2,$php_nom); ?>    
      <?php

    }else{
    
      ?>
      <div id="message"> Ocurrio Un Error, Intente nuevamente</div>     
      <?php 
    }

    }
  }



  }
 

 function consulta_oto($campo,$valor,$texto,$identificador){

    global $connection;
   
    $cont= 0;
    $cont2= 0; 

    $query = "SELECT * FROM km_usuarios WHERE ".$campo." = ? AND  NOT (idUsuario =?)";
   // $query2 = "SELECT * FROM km_usuarios WHERE ".$campo." = ? AND  idUsuario =?";
    $stmt = mysqli_prepare($connection->myconn,$query);
    
    //("ss") son doble string usuarios="juan" password ="cola"
    //("si") string e integer, "juan",10
    $stmt->bind_param("si",$valor,$identificador);
   
    $stmt->execute();


    $result = $stmt->get_result();

    while($fila = $result->fetch_assoc()){
      
    $cont++;

  }
   

  if($cont>0){
    echo "El ".$texto." ya existe en la base de datos <br>";


  }
  
  return $cont;

  }


    /* if($php_rowsql>0){

      ?>
          <div id="message"> [*]El usuario ya existe </div>      
      <?php
  }
  else if ($php_rowsql<=0){
      //Ese mensaje se puede arreglar tambien la div xD
if (isset($_POST["usu"])&&isset($_POST["nom"])&&isset($_POST["email"])) {

    $query="INSERT INTO km_usuarios ( nombreUsuario, nickUsuario,contraUsuario,emailUsuario) VALUES (?,?,?,?)";
    $stmt = mysqli_prepare($connection->myconn,$query);
    $stmt->bind_param("ssss",$php_nom,$php_usu,$php_usu,$php_email);
    if($stmt->execute()){
      
      ?>
      <div id="message"> Se Ha Registrado Correctamente</div>      
      <?php

    }else{
    
      ?>
      <div id="message"> Ocurrio Un Error, Intente Nuevamente</div>     
      <?php 
    }

    }
  }
  
  }
  


*/?>