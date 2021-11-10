<?php 

//paginacion

//Creador de la url
//hace el post al formulario, el crea una url  y redirecciona a ella

if(isset($_POST["fechainicio"])
  &&isset($_POST["fechafinal"])
  &&isset($_POST["categoria"])
  &&isset($_POST["contenido"]) 
  &&isset($_POST["empresa"])
  &&isset($_POST["test_text"])){
  //las guarda en otras variables... es redundante se pueden ir directamente a ellas.
  //crea la url para luego ir a la url aca diseñada, donde luego ejecutara el buscador
  //avanzado de sql, con los parametros aca dados.
  $php_datetime = htmlspecialchars(date("Y-m-d  H:i:s",strtotime("+18 hours")));
  $php_buscador_url = "[K]".(htmlspecialchars($_POST["categoria"]))."[K]".(htmlspecialchars($_POST["contenido"]))."[K]".(htmlspecialchars($_POST["empresa"]))."[K]".(htmlspecialchars($_POST["test_text"]))."[K]".(htmlspecialchars($_POST["fechainicio"]))."[K]".(htmlspecialchars($_POST["fechafinal"]))."";
     
  //seremos el futuro, a lo google :v
  //guarda un log de la busqueda 
  $query ="INSERT INTO km_busqueda (fecha,idUsuario,busqueda) VALUES (?,?,?);"; 
  $stmt = mysqli_prepare($connection->myconn,$query);
  $stmt->bind_param('sss',$php_datetime,$_SESSION["idusuario"],$php_buscador_url);
  //si todo va bien y ejecuta la consultado, redirecciona.
  if($stmt->execute()){
    $last_id = mysqli_insert_id($connection->myconn);
    echo"<script>window.location = 'explorar.php?vk=".($connection->monkeyCrypt($last_id,1))."&page=1';</script>";
  }
  else{
    echo "Algo fue alterado, RECARGA ESTA PAGINA YA!";
  }
}
//Que no se pasen de los paremetros.
if(count($_GET)==2
  && isset($_GET["vk"])
  && isset($_GET["page"])

){
  //Desencripta la URL
  $php_idbusqueda = $connection->monkeyCrypt(htmlspecialchars($_GET["vk"]),2);
  $php_values = ""; //guardara los 

  //Va la busqueda de los [k] encriptados
  $query = "SELECT * FROM km_busqueda WHERE idBusqueda = ?;";
  $stmt = mysqli_prepare($connection->myconn,$query);
  $stmt->bind_param("i",$php_idbusqueda);
  $stmt->execute();
  $result = $stmt->get_result();
  //guarda los K
  while($fila = $result->fetch_assoc()){
    $php_values = $fila['busqueda']; 
  }

  //parte la cadena en [K] 
  $explodewords = explode("[K]", $php_values);
  //Si al partir, salen 7 todo va bien y nada fue alterado.
  if(count($explodewords)==7){

    //ex 1, categoria ex 2,contenido ex 3, idempresa, ex 4 nombre empresa. 
    $php_count=0;
    $query = "SELECT kmf.*,kme.* FROM km_facturas kmf 
  INNER JOIN km_empresas kme 
  ON kme.idEmpresa = kmf.idEmpresa WHERE ";
    $php_busqueda ="<h4 style='text-align: center;'> ";
    switch (htmlspecialchars($explodewords[1])) {
      case '1':
        $query.=" kmf.titulo LIKE ? ";
        $php_busqueda.= " <b>Titulo </b>: ";
      break;
      case '2':
        $query.=" kmf.valor LIKE ? ";
        $php_busqueda.= " <b>Valor </b>: ";
      break;
      case '3':
        $query.=" kmf.notas LIKE ? ";
        $php_busqueda.= " <b>Notas </b>: ";
      break;
      case '4':
        $query.=" kmf.indicex LIKE ? ";
        $php_busqueda.= " <b>Todo </b>: ";
      break;
      default:
        $query.=" kmf.titulo LIKE ? ";
        $php_busqueda.= " <b>Titulo </b>: ";
      break;      
    }

  
    //busque entres
    $temp_busqueda="%".$explodewords[2]."%";
    //los input date solo son fecha mas no hora, aca le agrego horas 
    //para el inicial desde las 00:00 y el final a las 23:59
    $temp_date1 = $explodewords[5]." 00:00:01";
    $temp_date2 = $explodewords[6]." 23:59:59";
    $php_busqueda.= " <i> ' ".htmlspecialchars($explodewords[2])." '</i> - <b> Empresa </b>: ";


    
    //todas
    if($explodewords[3] == 0){

      $query.=" AND kmf.fecha BETWEEN ? AND ? ORDER BY kmf.idFactura DESC ";
      $stmt = mysqli_prepare($connection->myconn,$query);
      $stmt->bind_param("sss", $temp_busqueda,$temp_date1,$temp_date2); 
      $php_busqueda.= " <i> ' ".htmlspecialchars($explodewords[4])." '</i> - ";  
    }
    // empresa especifica
    else{
     
      $query.=" AND kmf.idEmpresa = ? AND kmf.fecha BETWEEN ? AND ? ORDER BY idFactura DESC ";
      $stmt = mysqli_prepare($connection->myconn,$query);
      $stmt->bind_param("ssss", $temp_busqueda,$explodewords[3],$temp_date1,$temp_date2); 
      $php_busqueda.= " <i> ' ".htmlspecialchars($explodewords[4])." '</i> - "; 
    }
    $php_busqueda.=" <b>Entre las fechas: </b> <i> ".htmlspecialchars($explodewords[5]." y ".$explodewords[6])."</i><h4>";
   
    echo "".$php_busqueda;
    
    if($stmt->execute()){

      $result = $stmt->get_result();    
      //contador de todos los registros  
      while($fila = $result->fetch_assoc()){
        $php_count++;      
      }
      echo "Total resultados: <b> ".$php_count."</b><hr>";
      if($php_count>0){

       $php_pagina = htmlspecialchars($_GET['page']);
       ///Si ingresan letras o valores negativos.
       if(!is_numeric($php_pagina) || $php_pagina<=0){
        $php_pagina = 1;
       }

       $php_tamanio = 10; // tamanio de la paginacion.
       $php_f2_empezardesde=($php_pagina-1)*$php_tamanio;
       $php_f2_limitepagina =$php_f2_empezardesde.",".$php_tamanio;
       $php_f2_totalpaginas = ceil($php_count/$php_tamanio);
      
       //sigue el primer query, pero ahora le aplica limit para la paginacion
       $query.=" LIMIT ".$php_f2_limitepagina.";";     
       $stmt = mysqli_prepare($connection->myconn,$query);
        if($explodewords[3] == 0){  
           $stmt->bind_param("sss", $temp_busqueda,$temp_date1,$temp_date2);
        }
        else{
           $stmt->bind_param("ssss", $temp_busqueda,$explodewords[3],$temp_date1,$temp_date2);
        }
         

        
      if($stmt->execute()){
        $result = $stmt->get_result();  
          echo "<thead>
             <tr>
                <th width='10%' style='text-align:center;' >#</th>
                <th width='60%'>Titulo - <b>[ EMPRESA ]</b></th>                
                <th style='text-align:right;'>Precio</th>
                <th>Fecha</th>
             </tr>
          </thead>
          <tbody>";

       
        while($fila = $result->fetch_assoc()){          
          //""
          echo"

            <tr>   
              <td style='text-align:center;'>".(($php_f2_empezardesde++)+1)."</td>
              <td><b><a href=factura.php?vk=".($connection->monkeyCrypt(($fila['idFactura'].'[K]KM'),1))."><b>".htmlspecialchars(strtoupper($fila['titulo']))." - ".htmlspecialchars(strtoupper($fila['nombre']))."</b></a></td>
              <td style='text-align:right;'> $ ".htmlspecialchars(number_format($fila['valor']))."</td>
              <td>".htmlspecialchars($fila['fecha'])."</td>
            </tr>";
        }//end while
        echo " <tr> <td colspan='4' style='text-align:center'>".(getDefaultPaginationMonkey($php_pagina,$php_f2_totalpaginas,'explorar.php?vk='.htmlspecialchars($_GET["vk"])))."</td> </tr>";
        echo "</tbody>";

       }//end execute 2

     }//end count
     else{
      echo "Total resultados: 0";
     }//end else count
    }//end execute 1
    //Execute no funciona
    else{
      echo "URL Alterada ";
    }
  }//end explode, si es 7 o <7 entra en url alterada
  else{
    echo "URL alterada";
  }
}
if(count($_GET)!=2){
  echo "No";
}
//Funciona y es un milagro, no tocar IMPORTANTE!
function getDefaultPaginationMonkey($pn,$totalpages,$urlf){ 
  $k = (($pn+2>$totalpages)?$totalpages-2:(($pn-2<1)?3:$pn));    
  $pagLink = ""; 
    if($pn>=2){ 
      $pagLink.="<a class='button alt small' href='{$urlf}&page=1'> << </a>"; 
      $pagLink.="<a class='button alt small' href='{$urlf}&page=".($pn-1)."'> < </a>"; 
    } 
        for ($i=-2; $i<=2; $i++) {
          if(($k+$i)>0 && ($k+$i)<=$totalpages){
           if($k+$i==$pn) 
              $pagLink .= "<a class='button small' href='{$urlf}&page=".($k+$i)."'>".($k+$i)."</a>"; 
            else
              $pagLink .= "<a class='button alt small' href='{$urlf}&page=".($k+$i)."'>".($k+$i)."</a>"; 
            }
        }; 
        
        if($pn<$totalpages){ 
            $pagLink.="<a class='button alt small' href='{$urlf}&page=".($pn+1)."'> > </a>"; 
            $pagLink.="<a class='button alt small' href='{$urlf}&page=".$totalpages."'> >> </a>"; 
        }  
        return $pagLink;
}

?>
