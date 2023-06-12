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

</head>

<body>
  <div class="sidebar close">
    <div class="logo-details">

      <img alt="logo" src="/Proyecto_DAW/public/imagenes/logo2.png" style="height: 70px; width: 70px;"><br>
      <span class="logo_name">Mr. Potato</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt'></i>
          <span class="link_name">Inicio</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Inicio</a></li>
        </ul>
      </li>

      <li>
        <a href="<?php echo constant('URL'); ?>consultacategoria">
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
        <a href="#">
          <i class='bx bx-pie-chart-alt-2'></i>
          <span class="link_name">Analytics</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Analytics</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-line-chart'></i>
          <span class="link_name">Chart</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Chart</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug'></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-compass'></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Explore</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog'></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
      <li>
        <div class="profile-details">
          <div class="profile-content">
            <img src="assets/image/profile.jpg" alt="profileImg">
          </div>
          <?php
          $tipo = $_SESSION['user_id'];
          ?>

          <div class="name-job">
            <div class="profile_name">
              <?php echo $tipo['nombres'] . " " . $tipo['apellidos']; ?>
            </div>
            <div class="job">
              <?php echo $tipo['area_trabajo']; ?>
            </div>
          </div>
          <i class='bx bx-log-out'></i>
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


  <!--
<div id="header">
<ul>
    <li><a href="<?php echo constant('URL'); ?>index">Inicio</a></li>
    <li><a href="<?php echo constant('URL'); ?>nuevo">Nuevo</a></li>
    <li><a href="<?php echo constant('URL'); ?>consultacategoria">Consulta</a></li>
    <li><a href="<?php echo constant('URL'); ?>categoria">categoria</a></li>
    <li><a href="<?php echo constant('URL'); ?>producto">Producto</a></li>
    <li><a href="<?php echo constant('URL'); ?>consultaproducto">Consulta-Producto</a></li>
    <li><a href="<?php echo constant('URL'); ?>empleado">Empleado</a></li>
    <li><a href="<?php echo constant('URL'); ?>consultaempleado">Consulta-Empleado</a></li>
</ul>

</div> 
-->
  <script src="assets\script.js"></script>
</body>

</html>