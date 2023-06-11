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
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tbody-categorias">
                        <?php
                        include_once 'models/categoria.php';

                        foreach ($this->categorias as $row) {
                            $categoria = new Categoria();
                            $categoria = $row;
                            ?>
                            <tr id="fila-<?php echo $categoria->id_categoria; ?>">
                                <th>
                                    <?php echo $categoria->id_categoria; ?>
                                </th>
                                <th>
                                    <?php echo $categoria->nombre; ?>
                                </th>
                                <th>
                                    <?php echo $categoria->descripcion; ?>
                                </th>
                                <th>
                                    <?php echo $categoria->estado; ?>
                                </th>
                                <th>
                                <a  class='btn btn-warning' href="<?php echo constant('URL') . 'consultacategoria/verCategoria/' . $categoria->id_categoria; ?>">Actualizar</a>
                                </th>
                                <th><button class='btn btn-danger bEliminar'
                                        data-categoria="<?php echo $categoria->id_categoria; ?>">Eliminar</button>
                                </th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
    <?php require 'views/footer.php'; ?>

    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>

</body>

>
