<?php
require_once "../../controlador/facturaControlador.php";
require_once "../../modelo/facturaModelo.php";
require_once "../../assest/fpdf/fpdf.php";

$id=$_GET["id"];
$factura=ControladorFactura::ctrInfoFactura($id);
?>
<?php
$pdf = new FPDF();
$pdf->AddPage();

//ENCABEZADO
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(100, 20, "Sistemas POS", 0, 1);
$pdf->Line(10, 25,180, 25);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 8, "NIT: 376151024", 0, 0);
$pdf->setX(110);
$pdf->Cell(50, 8, "Nro. Factura: ".$factura['cod_factura'], 0, 1);
$pdf->Cell(50, 8, utf8_decode("Telefonos: (591) 9422560"), 0, 0);
$pdf->setX(110);
$pdf->Cell(50, 8, utf8_decode("Fecha de emision: ").$factura['fecha_emision'], 0, 0);


?>