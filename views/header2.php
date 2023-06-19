<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mr. Potato</title>
  <link rel="shortcut icon" type="image/png" href="./logo.ico"/>
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


</head>

<body>
  <div class="sidebar close">
    <div class="logo-details">

      <img alt="logo" src="/Proyecto_DAW/public/imagenes/logo2.png" style="height: 70px; width: 70px;"><br>
      <span class="logo_name">Mr. Potato</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="<?php echo constant('URL'); ?>index">
          <i class='bx bx-grid-alt'></i>
          <span class="link_name">Inicio</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="<?php echo constant('URL'); ?>index"">Inicio</a></li>
        </ul>
      </li>

      <li>
        <a href=" <?php echo constant('URL'); ?>consultacategoria">
              <i class='bx bx-collection'></i>
              <span class="link_name">Categoria</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="<?php echo constant('URL'); ?>consultacategoria">Categoria</a></li>
            </ul>
          </li>

          <li>
            <a href="<?php echo constant('URL'); ?>consultaproducto">
              <i class='bx bx-book-alt'></i>
              <span class="link_name">Producto</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="<?php echo constant('URL'); ?>consultaproducto">Producto</a></li>
            </ul>
          </li>

          <li>
            <a href="<?php echo constant('URL'); ?>consultaempleado">
              <i class='bx bx-user'></i>
              <span class="link_name">Empleado</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="<?php echo constant('URL'); ?>consultaempleado">Empleado</a></li>
            </ul>
          </li>

          <li>
            <a href="<?php echo constant('URL'); ?>carro">
              <i class='bx bx-cart'></i>
              <span class="link_name">Venta</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="<?php echo constant('URL'); ?>carro">Venta</a></li>
            </ul>
          </li>
        
          <li>
            <a href="<?php echo constant('URL'); ?>pedido">
              <i class='bx bx-list-ul'></i>
              <span class="link_name">Pedidos</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="<?php echo constant('URL'); ?>pedido">Pedidos</a></li>
            </ul>
          </li>

          <li>
            <div class="profile-details">
              <div class="profile-content">
                <img src="assets/image/profile.png" alt="profileImg">
              </div>
              <?php
              $tipo = $_SESSION['user_id'];
              ?>

              <div class="name-job">
                <div class="profile_name">
                  <?php echo $tipo['nombres']; ?><br>
                  <?php echo $tipo['apellidos']; ?>
                </div>
                <div class="job">
                  <?php echo $tipo['area_trabajo']; ?>
                </div>
              </div>
              <button onclick="confirmarAccion()" style="background-color: #b02a37;" ><i class='bx bx-log-out'></i></button>
              <script type="text/javascript">
                // Función que muestra la alerta y ejecuta el código PHP
                function confirmarAccion() {
                  var aceptar = confirm("¿Estás seguro de que quieres cerrar la sesión?");
                  if (aceptar) {
                    // Redireccionar a archivo con codigo PHP para destruir la sesión
                    window.location.href = "/Proyecto_DAW/views/cerrar_sesion.php";
                  }
                }
              </script>

            </div>
          </li>
        </ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>
      <span class="text">Mr. Potato</span>
    </div>
  </section>

  <script src="assets\script.js"></script>

</body>

</html>