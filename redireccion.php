<?php session_start();
if($_SESSION["idrango"]>2){
	echo"<script> window.location = '../facturas/explorar.php?vk=WXNNY2NVRytxQ2lTNm1GYVU3dHA4QT09&page=1';</script>";
}
if ($_SESSION["idrango"]==2) {
	echo"<script> window.location = '../remisiones/';</script>";
}

if ($_SESSION["idrango"]==1) {
	echo"<script> window.location = '../clientes/';</script>";
}




?>