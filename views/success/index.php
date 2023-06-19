<?php
session_start();
//session_destroy();
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
} else {
     
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mr. Potato</title>
</head>
<body>

<?php

$tipo = $_SESSION['user_id'];

if ($tipo['area_trabajo'] == "Administracion") {
    require 'views/header.php';
} elseif ($tipo['area_trabajo'] == "Atencion") {
    require 'views/header2.php';
}elseif ($tipo['area_trabajo'] == "Gerencia") {
    require 'views/header3.php';
}
?>

    <div id="main">
        <h1 class="center success">
        <?php
            echo $this->mensaje;
        ?>
        </h1>
    </div>

</body>
</html>