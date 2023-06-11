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
                            <th>Apellido</th>
                            <th>Área</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tbody-empleados">
                        <?php
                        include_once 'models/empleado.php';

                        foreach ($this->empleados as $row) {
                            $empleado = new Empleado();
                            $empleado = $row;
                            ?>
                            <tr id="fila-<?php echo $empleado->id_empleado; ?>">
                                <th>
                                    <?php echo $empleado->id_empleado; ?>
                                </th>
                                <th>
                                    <?php echo $empleado->nombres; ?>
                                </th>
                                <th>
                                    <?php echo $empleado->apellidos; ?>
                                </th>
                                <th>
                                    <?php echo $empleado->area_trabajo; ?>
                                </th>
                                <th>
                                    <?php echo $empleado->usuario; ?>
                                </th>
                                <th>
                                    <?php echo $empleado->contrasena; ?>
                                </th>
                                <th>
                                <a  class='btn btn-warning' href="<?php echo constant('URL') . 'consultaempleado/verEmpleado/' . $empleado->id_empleado; ?>">Actualizar</a>
                                </th>
                                <th><button class='btn btn-danger bEliminar'
                                        data-empleado="<?php echo $empleado->id_empleado; ?>">Eliminar</button>
                                </th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
    <?php require 'views/footer.php'; ?>

    <script src="<?php echo constant('URL'); ?>/public/js/main3.js"></script>

</body>

>
