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
    <title>Document</title>
</head>
<body>
    <h2>Sección de ayuda</h2>
</body>
</html>