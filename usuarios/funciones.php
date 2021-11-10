<?php
function log_oto($idresponsable,$nomresponsable,$accion,$nomusuario,$rangousu){

    global $connection;

    

    $query="INSERT INTO log_responsables ( idResponsable, nomResponsable,accionResponsable,nomUsuario,idRol) VALUES (?,?,?,?)";
   // $query2 = "SELECT * FROM km_usuarios WHERE ".$campo." = ? AND  idUsuario =?";
    $stmt = mysqli_prepare($connection->myconn,$query);
    
    //("ss") son doble string usuarios="juan" password ="cola"
    //("si") string e integer, "juan",10
    $stmt->bind_param("isis",$idresponsable,$nomresponsable,$accion,$nomusuario,$rangousu);
   
     if($stmt->execute()){
      
      if($accion==3){


      }else{


      ?>
      <div id="message"><a href="log.php">Guardado en el registro de actividad </a> </div>      
      <?php
       }

    }else{
    
      ?>
      <div id="message"> No se guardo en el Registro de actividad</div>     
      <?php 
    }
  }

  function accion_oto($accion,$nomusuario,$rango){


   echo $accion." a ".$rango.":  <b>".$nomusuario ."</b>";
  }




  
  ?>