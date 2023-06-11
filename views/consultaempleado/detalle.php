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
        <div>
            <?php echo $this->mensaje; ?>
        </div>
        <h1 class="center">Actualizar
            <?php echo $this->empleado->nombres; ?>
            <?php echo $this->empleado->apellidos; ?>
        </h1>

        <form action="<?php echo constant('URL'); ?>consultaempleado/actualizarEmpleado" method="POST">
            <label for="id_empleado">ID</label><br>
            <input type="text" disabled name="id_empleado" id="id_empleado"
                value="<?php echo $this->empleado->id_empleado; ?>"><br>
            <label for="nombres">Nombres</label><br>
            <input type="text" name="nombres" value="<?php echo $this->empleado->nombres; ?>"><br>
            <label for="apellidos">Apellidos</label><br>
            <input type="text" name="apellidos" value="<?php echo $this->empleado->apellidos; ?>"><br>
            <label for="area_trabajo">Área de trabajo:</label>
            <select class="form form-control" name="area_trabajo" id="area_trabajo" value="<?php echo $this->empleado->area_trabajo; ?>" required>
                <option value="">[--Selecione una opción--]</option>
                <option value="Gerencia">Gerencia</option>
                <option value="Cocina">Cocina</option>
                <option value="Atencion">Atencion</option>
                <option value="Administracion">Administración</option>
            </select>
            <label for="usuario">Usuario</label><br>
            <input type="text" name="usuario" value="<?php echo $this->empleado->usuario; ?>"><br>
            <label for="contrasena">Contraseña</label><br>
            <input type="text" name="contrasena" value="<?php echo $this->empleado->contrasena; ?>"><br>

            <input type="submit" value="Actualizar">
        </form>
    </div>

    <?php require 'views/footer.php'; ?>

</body>

</html>