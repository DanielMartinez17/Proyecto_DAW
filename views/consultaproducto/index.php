<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Mr. Potato</title>
    <script>
        $(document).ready(function () {
            $('#tabla').DataTable();
        });
    </script>
</head>

<body>

    <?php require 'views/header.php'; ?>
    <div id="main">
        <div class="container">
            
            <div>
                <?php echo $this->mensaje; ?>
            </div>

            <div class="container mt-5">
                <!--<h2 class="card-title">Administrar Categorías</h2>-->

                <table id="tabla" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>STOCK</th>
                            <th>Imagen</th>
                            <th>Categoria</th>
                            <th></th>
                            <th></th>
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
                                    <img src="/Proyecto_DAW/public/img_products/<?php echo $producto->imagen; ?>" alt="Error" style="height: 100px; width:100px;" >
                                </th>
                                <th>
                                    <?php echo $producto->id_categoria; ?>
                                </th>
                                <th>
                                    <a  class='btn btn-warning' href="<?php echo constant('URL') . 'consultaproducto/verProducto/' . $producto->id_producto; ?>">Actualizar</a>
                                </th>
                                <th><button class='btn btn-danger bEliminar'
                                        data-producto="<?php echo $producto->id_producto; ?>">Eliminar</button>
                                </th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
    <?php require 'views/footer.php'; ?>

    <script src="<?php echo constant('URL'); ?>/public/js/main2.js"></script>

</body>

>
