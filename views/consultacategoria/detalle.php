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
        <h1 class="center">Actualizar <?php echo $this->categoria->id_categoria; ?></h1>

        <form action="<?php echo constant('URL'); ?>consultacategoria/actualizarCategoria/" method="POST">
            <label for="id_categoria">ID</label><br>
            <input type="text" disabled name="id_categoria" id="id_categoria" value="<?php echo $this->categoria->id_categoria; ?>"><br>
            <label for="">Nombre</label><br>
            <input type="text" name="nombre" value="<?php echo $this->categoria->nombre; ?>"><br>
            <label for="">Descripción</label><br>
            <input type="text" name="descripcion" value="<?php echo $this->categoria->descripcion; ?>"><br>
            <input type="submit" value="Crear nuevo alumno">
        </form>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>