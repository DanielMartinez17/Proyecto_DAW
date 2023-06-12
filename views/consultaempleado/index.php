<?php
session_start();
//session_destroy();
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
} else {
     
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Mr. Potato</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="assets/main.css">


    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css" />
    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet" type="text/css"
        href="assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

    <script src="https://kit.fontawesome.com/e2c53ba39b.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('#tabla').DataTable();
        });
    </script>
</head>

<body>

    <?php require 'views/header.php'; ?>

    <section class="home-section">
        <div class="home-content">
            <div>
                <?php echo $this->mensaje; ?>
            </div>
            <br>
            <div class="container caja">
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            style="padding: 15px; font-size: larger; "><i
                                class="fa-solid fa-file-circle-plus fa-xl"></i>
                            Nuevo</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="tablaUsuarios" class="table table-striped table-bordered table-condensed"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Área</th>
                                        <th>Usuario</th>
                                        <th>Contraseña</th>
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
                                                <a class='btn btn-warning'
                                                    href="<?php echo constant('URL') . 'consultaempleado/verEmpleado/' . $empleado->id_empleado; ?>">Actualizar</a>

                                                <button class='btn btn-danger bEliminar'
                                                    data-empleado="<?php echo $empleado->id_empleado; ?>">Eliminar</button>
                                            </th>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registro" name="registro" autocomplete="off"
                        action="<?php echo constant('URL'); ?>empleado/agregarEmp" method="POST">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form form-control" name="nombres" id="nombres" autofocus required>
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

                </div>
                <div class="modal-footer">
                    <div class="form form-group">
                        <button class="btn btn-primary" id="Agregar" name="Agregar" type="submit">Agregar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="<?php echo constant('URL'); ?>/public/js/main3.js"></script>

        <!-- jQuery, Popper.js, Bootstrap JS -->
        <script src="assets/jquery/jquery-3.3.1.min.js"></script>
        <script src="assets/popper/popper.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>

        <!-- datatables JS -->
        <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>

</body>

</html>