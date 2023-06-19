
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
        <a class='btn btn-info' href="<?php echo constant('URL'); ?>consultaempleado"><i
                class="fa-solid fa-pen-to-square fa-xl" style="color: #ffffff;"></i>
            Regresar</a>
    </div>
    
    <div class="container " style="padding-left: 25%;">
        <div>
            <?php echo $this->mensaje; ?>
        </div>
        <div class="row">
            <h1  align ="center">Actualizar
                <?php echo $this->empleado->nombres; ?>
                <?php echo $this->empleado->apellidos; ?>
            </h1>
        </div>
        <div class="row">
            <form action="<?php echo constant('URL'); ?>consultaempleado/actualizarEmpleado" method="POST">
                <div class="form-group">
                    <label for="id_empleado">ID</label>
                    <input type="text" class="form form-control" disabled name="id_empleado" id="id_empleado"
                        value="<?php echo $this->empleado->id_empleado; ?>" required>
                </div>
                <br>

                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form form-control" name="nombres"
                        value="<?php echo $this->empleado->nombres; ?>" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form form-control" name="apellidos" id="apellidos"
                        value="<?php echo $this->empleado->apellidos; ?>" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="area_trabajo">Área de trabajo:</label>
                    <select class="form form-control" name="area_trabajo" id="area_trabajo"
                        value="<?php echo $this->empleado->area_trabajo; ?>">
                        <option value="">[--Selecione una opción--]</option>
                        <option value="Gerencia">Gerencia</option>
                        <option value="Atencion">Atencion</option>
                        <option value="Administracion">Administración</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form form-control" name="usuario"
                        value="<?php echo $this->empleado->usuario; ?>" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="contrasena">Contraseña</label>
                    <input type="text" class="form form-control" name="contrasena" id="contrasena"
                        value="<?php echo $this->empleado->contrasena; ?>" required>
                </div>
                <br>
                <div class="form form-group">
                    <input class="btn btn-primary" type="submit" value="Actualizar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>