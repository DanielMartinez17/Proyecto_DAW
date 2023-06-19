<?php
session_start();
//session_destroy();
if (!isset($_SESSION['user_id'])) {
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

    <?php

    $tipo = $_SESSION['user_id'];

    if ($tipo['area_trabajo'] == "Administracion") {
        require 'views/header.php';
    } elseif ($tipo['area_trabajo'] == "Atencion") {
        require 'views/header2.php';
    } elseif ($tipo['area_trabajo'] == "Gerencia") {
        require 'views/header3.php';
    }
    ?>

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
                    <br><br><br><br>
                    <div class="col-auto">
                        <label for="num_registros" class="col-form-label">Mostrar: </label>
                    </div>

                    <div class="col-auto">
                        <select name="num_registros" id="num_registros" class="form-select">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>

                    <div class="col-auto">
                        <label for="num_registros" class="col-form-label">registros </label>
                    </div>

                    <div class="col-5"></div>

                    <div class="col-auto">
                        <label for="campo" class="col-form-label">Buscar: </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="campo" id="campo" class="form-control">
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
                <div class="row">
                    <div class="col-6">
                        <label id="lbl-total"></label>
                    </div>

                    <div class="col-6" id="nav-paginacion"></div>

                    <input type="hidden" id="pagina" value="1">
                    <input type="hidden" id="orderCol" value="0">
                    <input type="hidden" id="orderType" value="asc">
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
        <script>
            /* Llamando a la función getData() */
            getData()

            /* Escuchar un evento keyup en el campo de entrada y luego llamar a la función getData. */
            document.getElementById("campo").addEventListener("keyup", function () {
                getData()
            }, false)
            document.getElementById("num_registros").addEventListener("change", function () {
                getData()
            }, false)


            /* Peticion AJAX */
            function getData() {
                let input = document.getElementById("campo").value
                let num_registros = document.getElementById("num_registros").value
                let content = document.getElementById("content")
                let pagina = document.getElementById("pagina").value
                let orderCol = document.getElementById("orderCol").value
                let orderType = document.getElementById("orderType").value

                if (pagina == null) {
                    pagina = 1
                }

                let url = "<?php echo constant('URL') ?>views/consultaempleado/load.php"
                let formaData = new FormData()
                formaData.append('campo', input)
                formaData.append('registros', num_registros)
                formaData.append('pagina', pagina)
                formaData.append('orderCol', orderCol)
                formaData.append('orderType', orderType)

                fetch(url, {
                    method: "POST",
                    body: formaData
                }).then(response => response.json())
                    .then(data => {
                        content.innerHTML = data.data
                        document.getElementById("lbl-total").innerHTML = 'Mostrando ' + data.totalFiltro +
                            ' de ' + data.totalRegistros + ' registros'
                        document.getElementById("nav-paginacion").innerHTML = data.paginacion
                    }).catch(err => console.log(err))
            }

            function nextPage(pagina) {
                document.getElementById('pagina').value = pagina
                getData()
            }

            let columns = document.getElementsByClassName("sort")
            let tamanio = columns.length
            for (let i = 0; i < tamanio; i++) {
                columns[i].addEventListener("click", ordenar)
            }

            function ordenar(e) {
                let elemento = e.target

                document.getElementById('orderCol').value = elemento.cellIndex

                if (elemento.classList.contains("asc")) {
                    document.getElementById("orderType").value = "asc"
                    elemento.classList.remove("asc")
                    elemento.classList.add("desc")
                } else {
                    document.getElementById("orderType").value = "desc"
                    elemento.classList.remove("desc")
                    elemento.classList.add("asc")
                }

                getData()
            }

        </script>

        <!-- jQuery, Popper.js, Bootstrap JS -->
        <script src="assets/jquery/jquery-3.3.1.min.js"></script>
        <script src="assets/popper/popper.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>

        <!-- datatables JS -->
        <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>

</body>

</html>