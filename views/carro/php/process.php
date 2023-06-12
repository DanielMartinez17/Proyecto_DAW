<?php
session_start();
include "conection.php";

if (!empty($_POST)) {
    $q1 = $con->query("INSERT INTO venta(fecha,nom_cliente,estado,id_emple) VALUE(NOW(),\"$_POST[email]\")");
    if ($q1) {

        $cart_id = $con->insert_id;

        foreach ($_SESSION["cart"] as $c) {
            $q1 = $con->query("INSERT INTO detalle_venta(product_id,q,cart_id) value($c[product_id],$c[q],$cart_id)");
        }
        unset($_SESSION["cart"]);
    }
}
print "<script>alert('Venta procesada exitosamente');window.location='../products.php';</script>";
?>