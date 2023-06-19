<?php
/*
 * Este archio muestra los productos en una tabla.
 */
session_start();
include "php/conection.php";
?>
<!DOCTYPE html>
<html>

<head>
	<title>Mr. Potato</title>
	<link rel="stylesheet" type="text/css" href="../views/carro/bootstrap.min.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
		crossorigin="anonymous"></script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h1>Productos</h1>
				<a class='btn btn-info' href="<?php echo constant('URL'); ?>index"><i
						class="fa-solid fa-pen-to-square fa-xl" style="color: #ffffff;"></i>
					Regresar</a>
				<a href="<?php echo constant('URL'); ?>carro/verCarrito" class="btn btn-warning">Ver Carrito</a>

				<br><br>
				<?php

				//Esta es la consulta para obtener todos los productos de la base de datos.
				
					$productos = $con->query("SELECT P.*, C.nombre AS nombre_cat  FROM producto P INNER JOIN categoria C ON P.id_categoria = C.id_categoria WHERE P.estado = 1 ORDER BY P.nombre ");
				
				
				?>


				<section style="background-color: #eee;">
					<div class="container py-5">
						<div class="row">

							<?php while ($row = $productos->fetch_object()): ?>
								<div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
									<div class="card">
										<div class="d-flex justify-content-between p-3">
											<p class="lead mb-0">
												<?php echo $row->nombre_cat; ?>
											</p>
										</div>
										<img src="/Proyecto_DAW/public/img_products/<?php echo $row->imagen; ?>"
											class="card-img-top" alt="<?php echo $row->imagen; ?>" style="height: 200px;" />
										<div class="card-body">

											<div class="d-flex justify-content-between mb-3">
												<h2 class="mb-0">
													<?php echo $row->nombre; ?>
												</h2>
												<h5 class="text-dark mb-0">
													<?php echo $row->precio; ?>
												</h5>
											</div>

											<div class="d-flex justify-content-between mb-2">
												<p class="text-muted mb-0">
													<?php
													if ($row->stok > 0) {
														echo "<h4 style='color: green;' >Disponible: </h4>" . $row->stok;
													}
													if ($row->stok <= 0) {
														echo "<h4 style='color: red;' >Agotado</h4>";
													}
													?>
												</p>
											</div>
											<?php
											if ($row->stok > 0):

												?>
												<div class="d-flex justify-content-between mb-3">
													<?php
													$found = false;

													if (isset($_SESSION["cart"])) {
														foreach ($_SESSION["cart"] as $c) {
															if ($c["product_id"] == $row->id_producto) {
																$found = true;
																break;
															}
														}
													}
													?>
													<?php if ($found): ?>
														<a href="<?php echo constant('URL'); ?>carro/verCarrito"
															class="btn btn-info">Agregado</a>
													<?php else: ?>
														<form class="form-inline" method="post">
															<input type="hidden" name="product_id"
																value="<?php echo $row->id_producto; ?>">
															<div class="form-group">
																<input type="number" name="q" value="1" style="width:100px;" min="1"
																	class="form-control" placeholder="Cantidad">
															</div>
															<button type="submit" name="ok" class="btn btn-primary">Agregar al
																carrito</button>
														</form>
													<?php endif; ?>


												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				</section>

				<?php
				/*
				 * Agrega el producto a la variable de sesion de productos.
				 */

				if (isset($_POST['ok'])) {
					if (isset($_POST["product_id"]) && isset($_POST["q"])) {
						// si es el primer producto simplemente lo agregamos
						if (empty($_SESSION["cart"])) {
							$_SESSION["cart"] = array(array("product_id" => $_POST["product_id"], "q" => $_POST["q"]));
						} else {
							// apartie del segundo producto:
							$cart = $_SESSION["cart"];
							$repeated = false;
							// recorremos el carrito en busqueda de producto repetido
							foreach ($cart as $c) {
								// si el producto esta repetido rompemos el ciclo
								if ($c["product_id"] == $_POST["product_id"]) {
									$repeated = true;
									break;
								}
							}
							// si el producto es repetido no hacemos nada, simplemente redirigimos
							if ($repeated) {
								print "<script>alert('Error: Producto Repetido!');</script>";
							} else {
								// si el producto no esta repetido entonces lo agregamos a la variable cart y despues asignamos la variable cart a la variable de sesion
								array_push($cart, array("product_id" => $_POST["product_id"], "q" => $_POST["q"]));
								$_SESSION["cart"] = $cart;
							}
						}
					}
					print "<script>window.location='" . constant('URL') . "carro/verProductos';</script>";
				}

				?>
			</div>
		</div>
	</div>
</body>

</html>