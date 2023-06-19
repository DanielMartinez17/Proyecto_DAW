<?php 
require 'config.php';

$url = $_SERVER['REQUEST_URI'];
$parts = explode('/', $url); 
$id_venta = end($parts);

$sql = "SELECT d.id_detalle, d.cantidad, p.nombre
FROM detalle_venta d
INNER JOIN producto p ON d.id_product = p.id_producto
WHERE d.id_venta = ";
$resultado = $conn->query($sql);
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
        <a class='btn btn-info' href="<?php echo constant('URL'); ?>pedido"><i
                class="fa-solid fa-pen-to-square fa-xl" style="color: #ffffff;"></i>
            Regresar</a>
    </div>
    
    <div class="container " style="padding-left: 25%;">
        <div>
            <?php echo $this->mensaje; ?>
        </div>
        <div class="row">
            <h1  align ="center">Detalles de pedido</h1>
        </div>
    </div>
    <section class="home-section">
        <div class="home-content">
            <div>
                <?php echo $this->mensaje; ?>
            </div>
            <br>
            <div class="container caja">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="tablaUsuarios" class="table table-striped table-bordered table-condensed"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="sort asc">ID</th>
                                        <th class="sort asc">Nombre</th>
                                        <th class="sort asc">Apellido</th>
                                        <th class="sort asc">Área</th>
                                        <th class="sort asc">Usuario</th>
                                        <th class="sort asc">Contraseña</th>
                                        <th class="sort asc"></th>
                                    </tr>
                                </thead>
                                <tbody id="content">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>