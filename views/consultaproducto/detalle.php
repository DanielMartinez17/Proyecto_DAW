<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mr_potato";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Realizar consulta SQL
$sql = "SELECT * FROM categoria WHERE estado = 1";
$resultado = $conn->query($sql);

$conn->close();
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

    <?php require 'views/header.php'; ?>

    <div id="main">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Actualizar <?php echo $this->producto->nombre; ?></h1>

        <form action="<?php echo constant('URL'); ?>consultaproducto/actualizarProducto/" method="POST" enctype="multipart/form-data">
            <label for="id_producto">ID</label><br>
            <input type="text" disabled name="id_producto" id="id_producto" value="<?php echo $this->producto->id_producto; ?>"><br>
            <label for="">Nombre</label><br>
            <input type="text" name="nombre" value="<?php echo $this->producto->nombre; ?>"><br>
            <label for="">Precio:</label><br>
            <input type="number" step="0.01" name="precio" value="<?php echo $this->producto->precio; ?>"><br>
            <label for="stok">STOCK:</label><br>
            <input type="number" name="stok" value="<?php echo $this->producto->stok; ?>"><br>
            <label for="imagen">Imagen:</label><br>
            <img src="/Proyecto_DAW/public/img_products/<?php echo $this->producto->imagen; ?>" alt="<?php echo $this->producto->imagen; ?>" style="height: 150px; width:150px;" >
            <input type="file" class="form form-control" name="imagen" id="imagen"><br>
            <div class="form-group">
                    <label for="id_categoria">Categoria:</label><br>
                    <select name="id_categoria" id="id_categoria">
                        <?php
                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<option value='" . $fila["id_categoria"] . "'>" . $fila["nombre"] .$fila["id_categoria"]. "</option>";
                        }
                        ?>
                    </select>
                </div>
                <br>
            <input type="submit" value="Actualizar">
        </form>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>