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

    <title>Mr.Potato</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</head>

<body>

    <?php require 'views/header.php'; ?>

    <div class="container mt-5">
        <div>
            <?php echo $this->mensaje; ?>
        </div>
        <div class="row">
            <h1 align="center" style="background-color: cyan;">Agregar producto</h1>
        </div>
        <div class="row">
            <form id="registro" name="registro" autocomplete="off"
                action="<?php echo constant('URL'); ?>producto/agregarProd" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form form-control" name="nombre" id="nombre" autofocus required>
                </div>
                <br>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" step="0.01" class="form form-control" name="precio" id="precio" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="stok">STOCK</label>
                    <input type="number" class="form form-control" name="stok" id="stok" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" class="form form-control" name="imagen" id="imagen" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="id_categoria">Categoria</label>
                    <select name="id_categoria" id="id_categoria">
                        <?php
                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<option value='" . $fila["id_categoria"] . "'>" . $fila["nombre"] .$fila["id_categoria"]. "</option>";
                        }
                        ?>
                    </select>
                </div>
                <br>
                <div class="form form-group">
                    <button class="btn btn-primary" id="Agregar" name="Agregar" type="submit">Agregar</button>
                </div>
            </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>

</body>

</html>