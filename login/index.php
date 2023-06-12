<?php
session_start();
//session_destroy();
if(!(isset($_SESSION["registro"]))){
    header("location:login.php");
}



?>
estamos en la index
<a href="cerrar.php">Cerrar</a>