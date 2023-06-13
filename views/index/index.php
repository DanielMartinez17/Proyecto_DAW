<?php

session_start();
//session_destroy();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
} else {

}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mr_potato";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Realizar consulta SQL
$sql = "SELECT COUNT(id_venta) AS cantidad_ventas FROM venta WHERE fecha BETWEEN '2023-06-01 00:00:00' AND '2023-06-30 23:59:59'";
$resultado = $conn->query($sql);

$sql2 = "SELECT SUM(p.precio*v.cantidad)AS total FROM detalle_venta v INNER JOIN producto p ON v.id_product = p.id_producto";
$resultado2 = $conn->query($sql2);

$sql3 = "SELECT COUNT(id_empleado) AS empleado FROM empleado WHERE estado = 1";
$resultado3 = $conn->query($sql3);

$sql4 = "SELECT COUNT(nombre) AS categoria FROM categoria WHERE estado = 1";
$resultado4 = $conn->query($sql4);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Mr. Potato</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/css/main.css">


    <link rel="stylesheet" href="assets\style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


    <link rel="stylesheet" href="/Proyecto_DAW/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Proyecto_DAW/public/css/jquery.dataTables.min.css">

    <script src="/Proyecto_DAW/public/js/jquery-3.6.3.min.js"></script>
    <script src="/Proyecto_DAW/public/js/bootstrap.min.js"></script>
    <script src="/Proyecto_DAW/public/js/jquery.dataTables.min.js"></script>

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


    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="/Proyecto_DAW/assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="/Proyecto_DAW/assets/js/init-alpine.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="/Proyecto_DAW/assets/js/charts-lines.js" defer></script>
    <script src="/Proyecto_DAW/assets/js/charts-pie.js" defer></script>
</head>

<body>

    <?php

    /*$tipo = $_SESSION['user_id'];

    if ($tipo['area_trabajo'] == "Administracion") {
        require 'views/header.php';
    } elseif ($tipo['area_trabajo'] == "Cocina") {
        require 'views/header2.php';
    }*/
    require 'views/header.php';
    ?>


    <section class="home-section">
        <div id="main">
            <h1 class="center"><strong> Bienvenido!</strong></h1>
            <h2 style="color: #66202A;" class="center">Vive, sueña y come papas</h2>

        </div>
        <div style="padding-left: 15%;" class="home-content">

            <br><br><br><br><br>
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <!-- Cards -->
                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <div
                                class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Empleados
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    <?php
                                    $resultado3 = $resultado3->fetch_assoc();
                                    echo $resultado3['empleado'];
                                    ?>
                                </p>
                            </div>
                        </div>
                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <div
                                class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Entradas
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    $
                                    <?php
                                    $resultado2 = $resultado2->fetch_assoc();
                                    echo $resultado2['total'];
                                    ?>
                                </p>
                            </div>
                        </div>
                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <div
                                class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Ventas del mes
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    <?php
                                    $resultado = $resultado->fetch_assoc();
                                    echo $resultado['cantidad_ventas'];
                                    ?>
                                </p>
                            </div>
                        </div>
                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <div
                                class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Categorias
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    <?php
                                    $resultado4 = $resultado4->fetch_assoc();
                                    echo $resultado4['categoria'];
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Charts -->
                    
                    <div class="grid gap-6 mb-8 md:grid-cols-2">
                    
                        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                Productos por categoría
                            </h2>
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                Productos vendidos por categoría
                            </h2>
                            <div>
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php
    $sint = "SELECT c.nombre, COUNT(p.id_producto) AS cantidad
    FROM categoria c 
    INNER JOIN producto p 
    ON c.id_categoria = p.id_categoria 
    GROUP BY c.nombre
    ";
    $categorias = $conn->query($sint);
    ?>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                    foreach ($categorias as $row) {
                        $a = $row['nombre'];
                        echo "'" . $a . "',";
                    }
                    ?>

                ],
                datasets: [{
                    label: 'productos',
                    data: [
                        <?php
                    foreach ($categorias as $row) {
                        $a = $row['cantidad'];
                        echo "" . $a . ",";
                    }
                    ?>],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <?php
    $sint = "SELECT c.nombre AS categoria, COUNT(dv.id_detalle) AS cantidad
    FROM categoria c 
    JOIN producto p ON c.id_categoria = p.id_categoria 
    JOIN detalle_venta dv ON p.id_producto = dv.id_product
    GROUP BY c.nombre;
    ";
    $ventas = $conn->query($sint);
    ?>
    <script>
        const ctx2 = document.getElementById('myChart2');

        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                    foreach ($ventas as $row) {
                        $a = $row['categoria'];
                        echo "'" . $a . "',";
                    }
                    ?>

                ],
                datasets: [{
                    label: 'ventas',
                    data: [
                        <?php
                    foreach ($ventas as $row) {
                        $a = $row['cantidad'];
                        echo "" . $a . ",";
                    }
                    ?>],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>