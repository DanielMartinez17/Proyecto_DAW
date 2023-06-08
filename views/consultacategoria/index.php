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
        <h1 class="center">Consulta de Categorias</h1>

        <table width="100%" id="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="tbody-alumnos">
            
        <?php
            include_once 'models/categoria.php';
            foreach ($this->categorias as $row) {
                $categoria = new Categoria();
                $categoria = $row;
        ?>
                <tr id="fila-<?php echo $categoria->id_categoria; ?>">
                    <td><?php echo $categoria->id_categoria; ?></td>
                    <td><?php echo $categoria->nombre; ?></td>
                    <td><?php echo $categoria->descripcion; ?></td>
                    <td><?php echo $categoria->estado; ?></td>
                    <td><a href="<?php echo constant('URL') . 'consultacategoria/verCategoria/' . $categoria->id_categoria; ?>">Actualizar</a></td>
                    <td><button class="bEliminar" data-categoria="<?php echo $categoria->id_categoria; ?>">Eliminar</button></td> 
                </tr>
        <?php } ?>
            </tbody>
        </table>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
</body>
</html>