<?php session_start();
include '../php_class/phpconnection.php';
$connection = new createCon();
$connection->connect();
//toca agregarle un cliente.


if(isset($_POST['titulo'])
  && isset($_POST['clid'])
  && isset($_POST['ido'])
  && isset($_POST['fechaemi'])  
  && isset($_POST['fechaven'])
  && isset($_POST['valor'])
  && isset($_POST['notas'])
)
{


  $php_titulo = htmlspecialchars($_POST['titulo']);
  //Mi host tiene diferencia de 1 horas, toca acomodar luego.
  

  $php_cliente= htmlspecialchars($_POST['clid']);
  $php_obra = htmlspecialchars($_POST['ido']);
  $php_fechaemi = htmlspecialchars($_POST['fechaemi']);
  $php_fechaven= htmlspecialchars($_POST['fechaven']);

  $php_valor = str_replace(".","",htmlspecialchars($_POST['valor']));
  $php_notas = htmlspecialchars($_POST['notas']);

  //imagen de la factura
  //
  $datetime = date('Y-m-d h:i:s');

  $image = htmlspecialchars($_FILES['imgfactura']['name']);
  $ruta = htmlspecialchars($_FILES['imgfactura']['tmp_name']);
  $php_filesexten = strrchr($_FILES['imgfactura']['name'],".");
  $php_serial = strtoupper(substr(hash('sha1', $_FILES['imgfactura']['name'].$datetime),0,40));

  $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/images/Facturas-imagenes/'; 
  $php_tempfoto = ('images/Facturas-imagenes/'.$php_serial.$php_filesexten);

$php_consulta=consulta_oto("tituloFac",$php_titulo,"Titulo");

if($php_consulta==0){



    //Si entra a esta condicion, solo falta el insert into y ya!
  $query ="INSERT INTO km_facturas2 (tituloFac,fechaemiFac,fechavenFac,fechasubFac,imagenFac,valorFac,notasFac,cliId,idObra,idUsuario) VALUES (?,?,?,?,?,?,?,?,?,?);"; 

  $stmt = mysqli_prepare($connection->myconn,$query);
  $stmt->bind_param('sssssssiii',$php_titulo,$php_fechaemi,$php_fechaven,$datetime,$php_tempfoto,$php_valor,$php_notas,$php_cliente,$php_obra,$_SESSION["idusuario"]);

  

  if($stmt->execute()){
    $tempvalue = $php_serial.$php_filesexten;
    $php_movefile = move_uploaded_file($ruta,$carpeta_destino.$tempvalue);

    echo "<h5 style='color:green'><i class='fa fa-check-circle-o fa-lg'> Informacion guardada correctamente</i></h5>";

  }
  else{
    echo "ocurrio un error, recargue esta pagina inmediatamente.";
  }

  
  
}



exit;
}


 function consulta_oto($campo,$valor,$texto){

    global $connection;
    $cont= 0; 

    $query = "SELECT * FROM km_facturas2 WHERE ".$campo." = ?";
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
    echo "<h5 style='color:red'><i class='fa fa-times-circle-o fa-lg'> Alerta(!): El ".$texto." ya existe en la base de datos</i></h5>";


  }
return $cont;


  }
?>