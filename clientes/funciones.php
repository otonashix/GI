<?php
function log_oto($idresponsable,$nomresponsable,$accion,$nomusuario,$rangousu){

    global $connection;

    

    $query="INSERT INTO log_responsables ( idResponsable, nomResponsable,accionResponsable,nomUsuario,idRol) VALUES (?,?,?,?,?)";
   // $query2 = "SELECT * FROM km_usuarios WHERE ".$campo." = ? AND  idUsuario =?";
    $stmt = mysqli_prepare($connection->myconn,$query);
    
    //("ss") son doble string usuarios="juan" password ="cola"
    //("si") string e integer, "juan",10
    $stmt->bind_param("isisi",$idresponsable,$nomresponsable,$accion,$nomusuario,$rangousu);
   
     if($stmt->execute()){
      
      if($accion==3){


      }else{


      ?>
      <div id="message"><a href="../Usuarios/log.php">Guardado en el registro de actividad </a> </div>      
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

  function consulta_oto($tabla,$campo,$valor,$texto){

    global $connection;
    $cont= 0; 

    $query = "SELECT * FROM ".$tabla." WHERE ".$campo." = ?";
    $stmt = mysqli_prepare($connection->myconn,$query);
    //("ss") son doble string usuarios="juan" password ="cola"
    //("si") string e integer, "juan",10

    $stmt->bind_param("i",$valor);
   
   
    $stmt->execute();

    $result = $stmt->get_result();

    while($fila = $result->fetch_assoc()){
      
    $cont++;

  }
  if($cont>0){

    ?><div class="col-6 col-12-mobilep" style=" padding: 5px 10px;
                                border: PowderBlue 2px solid;
                                  border-radius: 20px;">
                  <br>
                  <h3 style="color: red">Alertas(!)</h3>

                   <?php echo "<h4 style='color:red'>"."*El ".$texto." ya existe en la base de datos <br></h4>";?>

                  </div>

   


<?php  }
  return $cont;


  }

  function insertar_oto($c){

    global $connection;
    $cont= 0; 

    $query = "INSERT INTO km_clientes (cliTipoid,cliCednit,cliNombre,cliNomcial,cliDireccion1, cliDireccion2,cliTelefono,cliMovil,cliEmail,cliCodciu,cliCodpais,cliEncargado, cliObservaciones,cliClasificacion,cliZona,cliVendedor,cliAgente,cliTransportadora,cliListprec,cliCupocartera,cliCalificacion) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = mysqli_prepare($connection->myconn,$query);
    $stmt->bind_param("issssssssiissiisssssi",$c[0],$c[1],$c[2],$c[3],$c[4],$c[5],$c[6],$c[7],$c[8],$c[9],$c[10],$c[11],$c[12],$c[13],$c[14],$c[15],$c[16],$c[17],$c[18],$c[19],$c[20]);
    
   
    if($stmt->execute()){
      //$last_id = mysqli_insert_id($connection->myconn);     
      ?>
      <div id="message"> Se ha registrado correctamente</div>
      
      <?php $funcion_registrar=log_oto($_SESSION["idusuario"],$_SESSION["nombreusuario"],1,$c[1],1); ?>
      <?php

    }else{
    
      ?>
      <div id="message"> Ocurrio Un Error, Intente nuevamente</div>     
      <?php 
    }

    }

  ?>