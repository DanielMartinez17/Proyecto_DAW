<?php
$mysqli = new mysqli("localhost", "root", "", "mr_potato");

$query = "SELECT c.nombre AS categoria, COUNT(dv.id_detalle) AS cantidad
FROM categoria c 
JOIN producto p ON c.id_categoria = p.id_categoria 
JOIN detalle_venta dv ON p.id_producto = dv.id_product
WHERE p.estado = 1
GROUP BY c.nombre;";
$resultado = $mysqli->query($query);

include '/xampp/htdocs/Proyecto_DAW/views/informe/plantilla.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('/xampp/htdocs/Proyecto_DAW/views/informe/logo2.png', 5, 5, 20);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(30);
$pdf->Cell(120, 10, 'Productos vendidos por categoria', 0, 0, 'C');
$pdf->Ln(20);

$pdf->SetLeftMargin(50);
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 6, 'Categoria', 1, 0, 'C', 1);
$pdf->Cell(50, 6, 'Cantidad', 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 10);

$total = 0;
$total2 = 0;

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(50, 6, utf8_decode($row['categoria']), 1, 0, 'C');
    $total = $total+1;
    $pdf->Cell(50, 6, utf8_decode($row['cantidad']), 1, 1, 'C');
    $total2 = $total2 + $row['cantidad'];
}

$pdf->Cell(120, 10, '', 0, 1, 'C');
$pdf->Cell(0, 10, 'Total de categorias: '.$total, 0, 1, 'L');
$pdf->Cell(0, 10, 'Total de productos vedidos: '.$total2, 0, 1, 'L');
$pdf->Output();


?>