<?Php
require('fpdf.php');
define('FPDF_FONTPATH','tfpdf/font/');
$pdf = new FPDF(); 
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);



?>