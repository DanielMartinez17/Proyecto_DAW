<?php
$mysqli = new mysqli("localhost", "root", "", "mr_potato");

$query = "SELECT id_categoria, nombre, descripcion
FROM categoria 
WHERE estado = 1";
$resultado = $mysqli->query($query);
$cantRegistros = $resultado->num_rows;

include 'plantilla.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('/xampp/htdocs/Proyecto_DAW/views/informe/logo2.png', 5, 5, 20);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(30);
$pdf->Cell(120, 10, 'Productos por categoria', 0, 0, 'C');
$pdf->Ln(20);

$pdf->SetLeftMargin(30);


if ($cantRegistros > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $pdf->SetFont('Arial', 'B', 15);
        $pdf->Cell(150, 6, utf8_decode($row['nombre']), 0, 1, 'C');
        $pdf->Cell(50, 6, '', 0, 1, 'C');

        $pdf->SetFillColor(232, 232, 232);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 6, 'ID', 1, 0, 'C', 1);
        $pdf->Cell(50, 6, 'Nombre', 1, 0, 'C', 1);
        $pdf->Cell(50, 6, 'Disponibilidad', 1, 1, 'C', 1);

        //Para imprimir los productos por categoria
        $sql = "SELECT p.id_producto, p.nombre, p.stok
        FROM producto p 
        WHERE estado = 1 AND p.id_categoria = ".$row['id_categoria'];
        $productos = $mysqli->query($sql);
        $cantProductos = $productos->num_rows;

        if ($cantProductos > 0) {
            $pdf->SetFont('Arial', '', 10);

            while ($fila = $productos->fetch_assoc()) {
                $pdf->Cell(50, 6, utf8_decode($fila['id_producto']), 1, 0, 'C');
                $pdf->Cell(50, 6, utf8_decode($fila['nombre']), 1, 0, 'C');
                $pdf->Cell(50, 6, utf8_decode($fila['stok']), 1, 1, 'C');
            }
        }
        $pdf->Cell(50, 6, '', 0, 1, 'C');
        $pdf->Cell(50, 6, '', 0, 1, 'C');
    }
} else {
    $pdf->Cell(50, 6, 'No hay categorías disponibles', 0, 1, 'C');
}

$pdf->Output();


?>