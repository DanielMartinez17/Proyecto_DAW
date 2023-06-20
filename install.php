<?php

if (isset($_POST["ok1"])) {
    //insformacion para conectarse con el servidor de base de datos
    $servidor = $_POST["servidor"];
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];
    $base = $_POST["base"];

    //conectarse con el servidor de base de datos de MySQL
    @$link = mysqli_connect($servidor, $usuario, $clave);
    if (!$link) {
        echo "
 <div class=container align=center>
 <h1 class='display-1'>Error!!!! al intentar crear la base de datos<br>
 verifique los datos ingresados
 </h1>
 </div>
";
        echo "<br>";
        exit;
    }

    //creamos la base detos con el nombre ingresado
    $sql = "create database if not exists " . $base;
    if ($link->query($sql) === TRUE) {
        echo "base de datos creada";
    }
    //seleccionamos la base de datos
    $link->select_db($base);

    //crear un array con el contenido del archivo que
    //tiene la informacion de las tablas de base de datos
    $sqlA = explode(";", file_get_contents("base.sql"));

    //ejecutamos cada setencia SQL que esta dentro del arreglo
    foreach ($sqlA as $sentencia) {
        if (!empty(trim($sentencia))) {
            if ($link->query($sentencia) === TRUE) {
                 // la sentencia se ejecutó correctamente, no hay nada que hacer aquí
            } else {
                 echo "Error al ejecutar la sentencia: " . $link->error;
            }
        }
     }

    echo "se termino de crear las tablas";
    //guardar la informacion en el archivo de las credenciales

}
?>
<html>

<head>
    <title>
        Instador de la basde de datos del sistema de ventas
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
 </head >
            <body>
                <div class="container col-sm-6 " style="margin-top: 30px;">
                    <form method=post>
                        <h2>Importate! despues de instalar la base de datos borrar la carpeta <strong>
                            install</strong></h2>
                        <table class="table table-bordered">
                            <thead class="thead-dark"> <tr>
                                <th colspan=2>
                                Información requerida para crear la basde de datos
                            </th>
                            </tr>
                        </thead>
                        <tr>
                            <td>Ingrese la IP del servidor de base de datos</td>
                            <td> <input type="text" name="servidor" id=""> </td>
                        </tr>
                        <tr>
                            <td>Ingrese el nombre del usuario</td>
                            <td> <input type="text" name="usuario" id=""> </td>
                        </tr>
                        <tr>
                            <td>Ingrese la clave del usuario</td>
                            <td> <input type="text" name="clave" id=""> </td>
                        </tr>
                        <tr>
                            <td>Ingrese el nombre de la base de datos</td>
                            <td> <input type="text" name="base" id=""> </td>
                        </tr>
                        <tr>
                            <td colspan=2 align=center>
                            <input type="submit" class="btn btn-dark" value="Crear base de datos"
                                name="ok1">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
</body >
</html >