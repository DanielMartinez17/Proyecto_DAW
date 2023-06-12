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
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/css/main.css">


    <link rel="stylesheet" href="assets\style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


    <link rel="stylesheet" href="/Proyecto_DAW/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Proyecto_DAW/public/css/jquery.dataTables.min.css">

    <script src="/Proyecto_DAW/public/js/jquery-3.6.3.min.js"></script>
    <script src="/Proyecto_DAW/public/js/bootstrap.min.js"></script>
    <script src="/Proyecto_DAW/public/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

    <?php 

    $tipo = $_SESSION['user_id'];

    if ($tipo['area_trabajo'] == "Administracion") {
        require 'views/header.php'; 
    }elseif ($tipo['area_trabajo'] == "Cocina") {
        require 'views/header2.php';
    }
    ?>

    <div id="main">
        <h1 class="center">Bienvenido al sitio</h1>
        
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>