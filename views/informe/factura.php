<?php
session_start();

$id = $_SESSION["factura"];


$mysqli = new mysqli("localhost", "root", "", "mr_potato");

$query = "SELECT
p.nombre,
d.cantidad,
v.fecha,
e.nombres,
e.apellidos,
v.nom_cliente,
v.id_venta,
p.precio
FROM venta v
INNER JOIN empleado e ON v.id_emple = e.id_empleado
INNER JOIN detalle_venta d ON d.id_venta = v.id_venta
INNER JOIN producto p ON d.id_product = p.id_producto
WHERE v.id_venta = " . $_SESSION['factura'];

$resultado = $mysqli->query($query);
$rowe = $resultado->fetch_assoc();

include '/xampp/htdocs/Proyecto_DAW/views/informe/plantilla.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('/xampp/htdocs/Proyecto_DAW/views/informe/logo2.png', 5, 5, 20);
$pdf->SetFont('Arial', 'B', 25);
$pdf->Cell(30);
$pdf->Cell(120, 10, 'Factura', 0, 0, 'L');
$pdf->Ln(20);

$pdf->SetLeftMargin(30);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 6, 'ID Factura: ', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(40, 6, $rowe['id_venta'], 0, 1, 'L');
$pdf->Cell(40, 6, ' ', 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 6, 'Cliente: ', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(40, 6, $rowe['nom_cliente'], 0, 1, 'L');
$pdf->Cell(40, 6, ' ', 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 6, 'Empleado: ', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(40, 6, $rowe['nombres'] . ' ' . $rowe['apellidos'], 0, 1, 'L');
$pdf->Cell(40, 6, ' ', 0, 1, 'C');

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 6, 'Producto', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'Cantidad', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'Precio', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'Total', 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 10);

$sql = "SELECT d.cantidad, p.nombre, p.precio
    FROM detalle_venta d
    INNER JOIN producto p ON d.id_product = p.id_producto
    WHERE id_venta = " . $id;
$registros = $mysqli->query($sql);


$total_pagar = 0;
while ($row = $registros->fetch_assoc()) {
    $pdf->Cell(40, 6, utf8_decode($row['nombre']), 1, 0, 'C');
    $pdf->Cell(40, 6,$row['cantidad'], 1, 0, 'C');
    $pdf->Cell(40, 6, '$'.$row['precio'], 1, 0, 'C');
    $pdf->Cell(40, 6, '$'.$row['cantidad'] * $row['precio'], 1, 1, 'C');

    $total_pagar = $total_pagar + ($row['precio'] * $row['cantidad']);
}

$pdf->Cell(40, 6, ' ', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(120, 10, 'Total a pagar: $' . $total_pagar, 0, 1, 'L');

$pdf->Cell(150, 10, 'Gracias por su compra!', 0, 0, 'C');
$pdf->Output();


?>