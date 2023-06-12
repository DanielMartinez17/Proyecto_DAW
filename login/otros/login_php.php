<?php

require_once("../librerias/cls_encriptar_desencriptar.php");
$objEncrip=new cls_encriptar_desencriptar();


//echo $objEncrip->encriptar_desencriptar("desencriptar","mZCVR1x65y0u8pBtEi6C8Q=");


require_once("../clases/cls_login.php");
$objLogin=new cls_login();


$datos[]=$_POST["usuario"];
$datos[]=$objEncrip->encriptar_desencriptar("encriptar",$_POST["Clave"]);

echo $datos[0];
echo $datos[1];

$objLogin->inicio($datos);


?>