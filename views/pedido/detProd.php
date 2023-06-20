<?php
require 'config.php';

$url = $_SERVER['REQUEST_URI'];
$parts = explode('/', $url);
$id_venta = end($parts);

$sql = "SELECT d.id_detalle, d.cantidad, p.nombre
FROM detalle_venta d
INNER JOIN producto p ON d.id_product = p.id_producto
WHERE d.id_venta = " . $id_venta;
$resultado = $conn->query($sql);

$cons = "SELECT estado FROM venta WHERE id_venta = " . $id_venta;
$estado = $conn->query($cons);
$estado = $estado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Mr. Potato</title>

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

    <div class="container" style="padding-left: 10%; padding-top:20px;">
        <a class='btn btn-info' href="<?php echo constant('URL'); ?>pedido"><i class="fa-solid fa-pen-to-square fa-xl"
                style="color: #ffffff;"></i>
            Regresar</a>
    </div>

    <div class="container " style="padding-left: 25%;">
        <div class="row">
            <h1 align="center">Detalles de pedido</h1>
        </div>
    </div>
    <section class="home-section">
        <div class="home-content">
            <br>
            <div class="container caja">
                <div class="row">
                    <?php
                    $estadoP = "";
                    if ($estado['estado'] == 1) {
                        $estadoP = "<h2 style = 'color: green;' >Solicitado</h2>";
                    } elseif ($estado['estado'] == 2) {
                        $estadoP = "<h2 style = 'color: yellow;' >En preparación</h2>";
                    } elseif ($estado['estado'] == 3) {
                        $estadoP = "<h2 style = 'color: blue;' >Entregado</h2>";
                    } elseif ($estado['estado'] == 0) {
                        $estadoP = "<h2 style = 'color: red;' >Cancelado</h2>";
                    } ?>
                    <h1>Estado:
                        <?php echo $estadoP; ?>
                    </h1>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="tablaUsuarios" class="table table-striped table-bordered table-condensed"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="sort asc">ID</th>
                                        <th class="sort asc">Nombre</th>
                                        <th class="sort asc">Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody id="content">
                                    <?php
                                    while ($row = $resultado->fetch_assoc()) {
                                        echo "
                                        <tr>
                                        <td>$row[id_detalle]</td>
                                        <td>$row[nombre]</td>
                                        <td>$row[cantidad]</td>
                                        </tr>
                                        ";
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" style="padding-left: 35%;">
                    <form method="POST">
                        <button type="submit" name="ok" id="ok" class="btn btn-primary">Entregado</button>
                        <button type="submit" name="ok1" id="ok1" class="btn btn-warning">En preparación</button>
                        <button type="submit" name="ok2" id="ok2" class="btn btn-danger">Cancelado</button>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <?php

    if (isset($_POST['ok'])) {
        $sql1 = "UPDATE venta SET estado = 3 WHERE id_venta = " . $id_venta;
        $resultado1 = $conn->query($sql1);

        print "<script>window.setTimeout(function() { window.location = '".constant("URL") . "'pedido/verVenta/' }, 0);</script>";
    }

    if (isset($_POST['ok1'])) {
        $sql2 = "UPDATE venta SET estado = 2 WHERE id_venta = " . $id_venta;
        $resultado1 = $conn->query($sql2);

        print "<script>window.setTimeout(function() { window.location = '".constant("URL") . "'pedido/verVenta/' }, 0);</script>";
    }

    if (isset($_POST['ok2'])) {
        $sql3 = "UPDATE venta SET estado = 0 WHERE id_venta = " . $id_venta;
        $resultado1 = $conn->query($sql3);

        print "<script>window.setTimeout(function() { window.location = '".constant("URL") . "'pedido/verVenta/' }, 0);</script>";
    }

    ?>

</body>

</html>