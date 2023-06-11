<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Mr.Potato</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

    <?php require 'views/header.php'; ?>
    
    <div class="container mt-5">
    <div><?php echo $this->mensaje; ?></div>
        <div class="row">
            <h1 align="center" style="background-color: cyan;">Agregar empleado</h1>
        </div>
        <div class="row">
            <form id="registro" name="registro" autocomplete="off" action="<?php echo constant('URL'); ?>empleado/agregarEmp" method="POST">
                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form form-control" name="nombres" id="nombres"  autofocus required>
                </div>
                <br>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form form-control" name="apellidos" id="apellidos" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="area_trabajo">Área de trabajo:</label>
                    <select class="form form-control" name="area_trabajo" id="area_trabajo" required>
                        <option value="">[--Selecione una opción--]</option>
                        <option value="Gerencia">Gerencia</option>
                        <option value="Cocina">Cocina</option>
                        <option value="Atencion">Atencion</option>
                        <option value="Administracion">Administración</option>
                    </select>
                
                </div>
                <br>
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form form-control" name="usuario" id="usuario" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="contrasena">Contraseña</label>
                    <input type="text" class="form form-control" name="contrasena" id="contrasena" required>
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