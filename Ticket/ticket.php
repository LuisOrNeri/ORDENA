<?php
include "fpdf/fpdf.php";

$pdf = new FPDF($orientation='P',$unit='mm', array(45,350));
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);    //Letra Arial, negrita (Bold), tam. 20
$textypos = 5;
$pdf->setY(2);
$pdf->setX(2);
$pdf->Cell(5,$textypos,"NOMBRE DE LA EMPRESA");
$pdf->SetFont('Arial','',5);    //Letra Arial, negrita (Bold), tam. 20
$textypos+=6;
$pdf->setX(2);
$pdf->Cell(5,$textypos,'-------------------------------------------------------------------');
$textypos+=6;
$pdf->setX(2);
$pdf->Cell(5,$textypos,'CANT.     ARTICULO         PRECIO      SUBTOTAL');

$total =0;
$off = $textypos+6;
$producto = array(
	"q"=>1,
	"name"=>"Alitas Buffalo",
	"price"=>80
);
$productos = array();
array_push($productos, $producto);
foreach($productos as $pro){
$pdf->setX(3);
$pdf->Cell(5,$off,$pro["q"]);
$pdf->setX(8);
$pdf->Cell(35,$off,  strtoupper(substr($pro["name"], 0,12)) );
$pdf->setX(20);
$pdf->Cell(11,$off,  "$".number_format($pro["price"],2,".",",") ,0,0,"R");
$pdf->setX(31);
$pdf->Cell(11,$off,  "$ ".number_format($pro["q"]*$pro["price"],2,".",",") ,0,0,"R");

$total += $pro["q"]*$pro["price"];
$off+=6;
}
$textypos=$off+6;

$pdf->setX(2);
$pdf->Cell(5,$textypos,"TOTAL: " );
$pdf->setX(38);
$pdf->Cell(5,$textypos,"$ ".number_format($total,2,".",","),0,0,"R");

$pdf->setX(2);
$pdf->Cell(5,$textypos+6,'GRACIAS POR TU COMPRA ');

$pdf->output();
