<?php
session_start();
require_once("../librerias/database.php");

class cls_login extends Database {
    function inicio($datos) {
        $stmt = $this->connect()->prepare('SELECT * FROM empleado WHERE usuario = ? and contrasena = ?');
        $stmt->bind_param('ss', $datos[0], $datos[1]);

        echo $datos[0];
        echo $datos[1];
        $stmt->execute();
        $rs = $stmt->get_result();
    
        if($rs->num_rows > 0){
            $_SESSION["registro"]="1";
            header("Location: /index.php");
            exit();
        }else{
            header("Location: /login.php");
            exit();
        }
    }
}
?>