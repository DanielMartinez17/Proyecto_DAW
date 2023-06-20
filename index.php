<?php

try {
    $conn = new mysqli("localhost", "root", "", "mr_potato");

/* Comprobando si hay un error de conexión. */
if ($conn->connect_error) {
    header('Location: install.php');
    exit;
}else {
    require 'libs/database.php';
    require 'libs/model.php';
    require 'libs/controller.php';
    require 'libs/view.php';
    require 'libs/app.php';

    require 'config/config.php';
    $app = new App();
}
} catch (\Throwable $e) {
    header('Location: install.php');
    exit;
}


    
?>

