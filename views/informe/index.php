<?php
$mysqli = new mysqli("localhost","root","","mr_potato"); 

$query = "SELECT nombres, apellidos, area_trabajo FROM empleado WHERE estado = 1";
$resultado = $mysqli->query($query);

include '/xampp/htdocs/Proyecto_DAW/views/informe/plantilla.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('/xampp/htdocs/Proyecto_DAW/views/informe/logo2.png', 5, 5, 20);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(30);
$pdf->Cell(120, 10, 'Reporte De Empleados Activos', 0, 0, 'C');
$pdf->Ln(20);

$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(50,6,'Nombre',1,0,'C',1);
	$pdf->Cell(50,6,'Apellido',1,0,'C',1);
	$pdf->Cell(50,6,'Área',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);

    while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(50,6,utf8_decode($row['nombres']),1,0,'C');
		$pdf->Cell(50,6,$row['apellidos'],1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['area_trabajo']),1,1,'C');
	}
$pdf->Output();


?>