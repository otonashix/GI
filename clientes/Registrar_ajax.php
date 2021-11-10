<?php session_start();
include '../php_class/phpconnection.php';
include 'funciones.php';

$connection = new createCon();
$connection->connect();

//por si algun momento se cola un vacio, la primera defensa es required del html
if (isset($_POST["usu"])&&isset($_POST["nom"])&&isset($_POST["email"])&&isset($_POST["empresa"])) {

  // se pueden guardar en variables o sar directamente el $_post

  $php_nom = htmlspecialchars($_POST["nom"]);
  $php_usu = htmlspecialchars($_POST["usu"]);
  $php_email = htmlspecialchars($_POST["email"]);
  $php_idempresa = htmlspecialchars($_POST["empresa"]);
  

  $php_rowsql=0;
 
  $php_nombre=consulta_oto("nombreUsuario",$php_nom,"Nombre");
  $php_usuario=consulta_oto("nickUsuario",$php_usu,"Usuario");
  $php_correo=consulta_oto("emailUsuario",$php_email,"Correo");
  
  if($php_usuario==0 && $php_correo==0 && $php_nombre==0){

   if (isset($_POST["usu"])&&isset($_POST["nom"])&&isset($_POST["email"])&&isset($_POST["empresa"])) {

    $query="INSERT INTO km_usuarios (nombreUsuario, nickUsuario,contraUsuario,emailUsuario,idEmpresa) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($connection->myconn,$query);
    $stmt->bind_param("ssssi",$php_nom,$php_usu,$php_usu,$php_email,$php_idempresa);
    if($stmt->execute()){
      //$last_id = mysqli_insert_id($connection->myconn);     
      ?>
      <div id="message"> Se ha registrado correctamente</div>
      
      <?php $funcion_registrar=log_oto($_SESSION["idusuario"],$_SESSION["nombreusuario"],1,$php_nom,2); ?>
      <?php

    }else{
    
      ?>
      <div id="message"> Ocurrio Un Error, Intente nuevamente</div>     
      <?php 
    }

    }
  }
}

 

 function consulta_oto($campo,$valor,$texto){

    global $connection;
    $cont= 0; 

    $query = "SELECT * FROM km_usuarios WHERE ".$campo." = ?";
    $stmt = mysqli_prepare($connection->myconn,$query);
    //("ss") son doble string usuarios="juan" password ="cola"
    //("si") string e integer, "juan",10

    $stmt->bind_param("s",$valor);
   
   
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