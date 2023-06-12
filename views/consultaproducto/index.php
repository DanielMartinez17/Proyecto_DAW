<?php
session_start();
//session_destroy();
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
} else {
     
}

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

    <title>Mr. Potato</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="assets/main.css">


    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css" />
    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet" type="text/css"
        href="assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

    <script src="https://kit.fontawesome.com/e2c53ba39b.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('#tabla').DataTable();
        });
    </script>
</head>

<body>

    <?php require 'views/header.php'; ?>
    <section class="home-section">
        <div class="home-content">
            <br>
            <div>
                <?php echo $this->mensaje; ?>
            </div>
            <div class="container caja">
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            style="padding: 15px; font-size: larger; "><i
                                class="fa-solid fa-file-circle-plus fa-xl"></i>Nuevo</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="tablaUsuarios" class="table table-striped table-bordered table-condensed"style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>STOCK</th>
                                        <th>Imagen</th>
                                        <th>Categoria</th>
                                        <th></th>
                                        >
                                    </tr>
                                </thead>
                                <tbody id="tbody-productos">
                                    <?php
                                    include_once 'models/producto.php';

                                    foreach ($this->productos as $row) {
                                        $producto = new Producto();
                                        $producto = $row;
                                        ?>
                                        <tr id="fila-<?php echo $producto->id_producto; ?>">
                                            <th>
                                                <?php echo $producto->id_producto; ?>
                                            </th>
                                            <th>
                                                <?php echo $producto->nombre; ?>
                                            </th>
                                            <th>
                                                <?php echo $producto->precio; ?>
                                            </th>
                                            <th>
                                                <?php echo $producto->stok; ?>
                                            </th>
                                            <th>
                                                <img src="/Proyecto_DAW/public/img_products/<?php echo $producto->imagen; ?>"
                                                    alt="Error" style="height: 50px; width:50px;">
                                            </th>
                                            <th>
                                                <?php echo $producto->id_categoria; ?>
                                            </th>
                                            <th>
                                                <a class='btn btn-warning'
                                                    href="<?php echo constant('URL') . 'consultaproducto/verProducto/' . $producto->id_producto; ?>"><i
                                                        class="fa-solid fa-pen-to-square fa-xl" style="color: #ffffff;"></i>
                                                    Actualizar</a>

                                                <button class='btn btn-danger bEliminar'
                                                    data-producto="<?php echo $producto->id_producto; ?>"><i
                                                        class="fa-solid fa-trash fa-xl" style="color: #ffffff;"></i>
                                                    Eliminar</button>
                                            </th>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registro" name="registro" autocomplete="off"
                        action="<?php echo constant('URL'); ?>producto/agregarProd" method="POST"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form form-control" name="nombre" id="nombre" autofocus required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="number" step="0.01" class="form form-control" name="precio" id="precio"
                                required>
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
                            <select class="form form-control" name="id_categoria" id="id_categoria">
                                <?php
                                while ($fila = $resultado->fetch_assoc()) {
                                    echo "<option value='" . $fila["id_categoria"] . "'>" . $fila["nombre"] . $fila["id_categoria"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <br>

                </div>
                <div class="modal-footer">
                    <div class="form form-group">
                        <button class="btn btn-primary" id="Agregar" name="Agregar" type="submit">Agregar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="<?php echo constant('URL'); ?>/public/js/main2.js"></script>

        <!-- jQuery, Popper.js, Bootstrap JS -->
        <script src="assets/jquery/jquery-3.3.1.min.js"></script>
        <script src="assets/popper/popper.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>

        <!-- datatables JS -->
        <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>

</body>

</html>