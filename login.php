<?php
include('config.php');
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $connection->prepare("SELECT * FROM empleado WHERE usuario=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">Algo está mal!</p>';
    } else {
        include_once 'libs/encript_desencipt.php';
        $prueba = new cls_encriptar_desencriptar();

        $ps = $prueba->encrypt($password);
        
        if ($ps == $result['contrasena']) {

            $arrayusuario = array();
            $arrayusuario = $result;
              
            $_SESSION['user_id'] = $arrayusuario;

            $usu = $_SESSION['user_id'];
            echo '<p class="success">Bienvenido!</p>'. $usu['nombres'];

            header('location: '.constant('URL').'index');
        } else {
            echo '<p class="error">Algo salió mal!</p>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mr. Potato</title>

    <link href='./estilo.css' rel='stylesheet'>

</head>
<body>
<form method="post" action="" name="signin-form">
    <div class="form-element">
        <label>Username</label>
        <input type="text" name="username" required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="login" value="login">Log In</button>
</form>
</body>
</html>

