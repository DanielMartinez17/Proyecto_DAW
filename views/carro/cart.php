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
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Carrito</h1>
				<a href="<?php echo constant('URL'); ?>carro/verProductos" class="btn btn-default">Productos</a>
				<br><br>
				<?php
				/*
				 * Esta es la consula para obtener todos los productos de la base de datos.
				 */
				$products = $con->query("SELECT P.*, C.nombre AS nombre_cat  FROM producto P INNER JOIN categoria C ON P.id_categoria = C.id_categoria WHERE P.estado = 1 ORDER BY P.nombre");
				if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
					?>
					<table class="table table-bordered">
						<thead>
							<th>Cantidad</th>
							<th>Producto</th>
							<th>Precio Unitario</th>
							<th>Total</th>
							<th></th>
						</thead>
						<?php
						/*
						 * Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
						 */
						foreach ($_SESSION["cart"] as $c):
							$products = $con->query("select * from producto where id_producto=$c[product_id]");
							$r = $products->fetch_object();
							?>
							<tr>
								<th>
									<?php echo $c["q"]; ?>
								</th>
								<td>
									<?php echo $r->nombre; ?>
								</td>
								<td>$
									<?php echo $r->precio; ?>
								</td>
								<td>$
									<?php echo $c["q"] * $r->precio; ?>
								</td>
								<td style="width:260px;">
									<?php
									$found = false;
									foreach ($_SESSION["cart"] as $c) {
										if ($c["product_id"] == $r->id_producto) {
											$found = true;
											break;
										}
									}
									?>
									<form class="form-inline" method="post">
										<input type="hidden" name="product_id" value="<?php echo $c["product_id"]; ?>">

										<button type="submit" name="ok" class="btn btn-danger">Eliminar</button>
									</form>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>

					<form class="form-horizontal" method="post">
						<div class="form-group">
							<label for="nombre" class="col-sm-2 control-label">Nombre del cliente</label>
							<div class="col-sm-5">
								<input type="text" name="nombre" required class="form-control" id="nombre"
									placeholder="Nombre del cliente">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" name="ok2" class="btn btn-primary">Procesar Venta</button>
							</div>
						</div>
					</form>


				<?php else: ?>
					<h3 class="alert alert-warning">El carrito esta vacio.</h3>
				<?php endif; ?>
				<br><br>

				<?php
				/*
				 * Eliminar un producto del carrito
				 */
				if (isset($_POST['ok'])) {
					if (!empty($_SESSION["cart"])) {

						$id = $_POST['product_id'];

						$cart = $_SESSION["cart"];
						if (count($cart) == 1) {
							unset($_SESSION["cart"]);
						} else {
							$newcart = array();
							foreach ($cart as $c) {
								if ($c["product_id"] != $id) {
									$newcart[] = $c;
								}
							}
							$_SESSION["cart"] = $newcart;
						}
					}
					print "<script>window.location='" . constant('URL') . "carro/verCarrito';</script>";
				}


				if (isset($_POST['ok2'])) {
					if (!empty($_POST)) {

						$tipo = $_SESSION['user_id'];
						$idempleado = $tipo['id_empleado'];
						
						$nombre = $_POST['nombre'];

						$q1 = $con->query("INSERT INTO venta(fecha, nom_cliente, estado, id_emple) VALUE(NOW(), '$nombre', 1, $idempleado )");
						if ($q1) {
	
							$cart_id = $con->insert_id;
	
							foreach ($_SESSION["cart"] as $c) {
								$q1 = $con->query("INSERT INTO detalle_venta(id_venta,id_product,cantidad) value($cart_id, $c[product_id],$c[q])");
							}
							unset($_SESSION["cart"]);
						}
					}
					print "<script>alert('Venta procesada exitosamente');window.location='" . constant('URL') . "carro/verCarrito';</script>";
				}
				?>

			</div>
		</div>
	</div>
</body>

</html>