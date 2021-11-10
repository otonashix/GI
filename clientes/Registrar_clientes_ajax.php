<?php session_start();
include '../php_class/phpconnection.php';
include 'funciones.php';

$connection = new createCon();
$connection->connect();

//por si algun momento se cola un vacio, la primera defensa es required del html
if (((isset($_POST["cednat"])&&isset($_POST["nm1"])&&isset($_POST["nmbcial"])) || (isset($_POST["cedjur"])&&isset($_POST["rs"])))&&isset($_POST["dr1"])&&isset($_POST["tel"])&&isset($_POST["email"])&&isset($_POST["cod"])&&isset($_POST["codpais"])&&isset($_POST["encr"])&&isset($_POST["vend"])&&isset($_POST["agcial"])&&isset($_POST["trasp"])&&isset($_POST["listpre"])&&isset($_POST["ccart"])&&isset($_POST["calf"])) {




  // se pueden guardar en variables o sar directamente el $_post

//Requeridos
  //Persona Natural
  if(isset($_POST["cednat"])){
  
  $php_rs = "VACIO";
  $php_cednit = htmlspecialchars($_POST["cednat"]);
  $php_nm1 = htmlspecialchars($_POST["nm1"]);
  $php_nmbcial = htmlspecialchars($_POST["nmbcial"]);
  $php_tipoid=1;
  //Persona Juridica
  }else {

  $php_tipoid=2;
  $php_nm1 = "VACIO";
  $php_nmbcial = "VACIO";
  $php_cednit = htmlspecialchars($_POST["cedjur"]);
  $php_rs = htmlspecialchars($_POST["nm1"]);

  }

  $php_dr1 = htmlspecialchars($_POST["dr1"]);
  $php_tel = htmlspecialchars($_POST["tel"]);
  $php_email = htmlspecialchars($_POST["email"]);
  $php_codmun = htmlspecialchars($_POST["cod"]);
  $php_codpais = htmlspecialchars($_POST["codpais"]);
  $php_encr = htmlspecialchars($_POST["encr"]);
  $php_vend = htmlspecialchars($_POST["vend"]);
  $php_agcial = htmlspecialchars($_POST["agcial"]);
  $php_trasp = htmlspecialchars($_POST["trasp"]);
  $php_listpre = htmlspecialchars($_POST["listpre"]);
  $php_ccart = htmlspecialchars($_POST["ccart"]);
  $php_calf = htmlspecialchars($_POST["calf"]);

  //No requeridos
  
  $php_dr2 = htmlspecialchars($_POST["dr2"]);
  $php_tel2 = htmlspecialchars($_POST["tel2"]);
  
  $php_obs = htmlspecialchars($_POST["obs"]);
  $php_clas = htmlspecialchars($_POST["clas"]);
  $php_zn = htmlspecialchars($_POST["zn"]);



  $php_rowsql=0;
  
  $arrayprsn= array(0 =>$php_tipoid,1 =>$php_cednit, 2 =>$php_nm1, 3 =>$php_nmbcial, 4 =>$php_dr1, 5 => $php_dr2, 6 => $php_tel,7=> $php_tel2, 8 =>$php_email, 9 =>$php_codmun, 10 =>$php_codpais, 11 =>$php_encr, 12=>$php_obs,13 =>$php_clas,14 =>$php_zn ,15=>$php_vend,16=> $php_agcial,17=>$php_trasp,18=>$php_listpre,19=>$php_ccart,20=>$php_calf );


  $php_idprs=consulta_oto("km_clientes","cliCednit",$php_cednit,"Cliente");


  
  if($php_idprs==0){

    $php_insrt=insertar_oto($arrayprsn);

}
}  

?>