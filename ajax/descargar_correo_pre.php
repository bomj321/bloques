<?php
include('../conexion.php');
require '../fpdf/fpdf.php';

$id_usuario= $_GET['id_usuario'];

$sql_usuario=("SELECT * FROM pre_registro WHERE id_pre_registro='$id_usuario'");

$user =mysqli_query($con,$sql_usuario);

$datos_usuario=mysqli_fetch_array($user);


class PDF extends FPDF
{
	
	function Header()
	{
		//Logo
		$this->Image('logocorreo.png',1,1,6,3);
		//Derecha
		$this->Cell(80);		
		$this->SetFont('Arial','B',12);		
		$this->Ln(.8);
		$this->SetTextColor(80, 77, 208);
		$this->Cell(0,0,utf8_decode('¿Necesita Soporte?'),0,1,'R');
		$this->Ln(.8);		
	    $this->Image('logowhat.png',17,2.2,0.8,0.8);
		$this->Cell(0,0,utf8_decode('8782 2652'),0,1,'R');
		$this->Ln(2.5);
		$this->SetFont('Arial', 'B', 15);
		$this->Cell(0,1,'BIENVENIDOS A SU SISTEMA DE FACTURACION ELECTRONICA',0,1,'C');
		
	}
}

$pdf = new PDF('P','cm','A4');
$pdf->AddPage();
$pdf->Image('logo.jpeg', 0,7,21.5,11);
$pdf->SetXY(2.5, 17);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(68, 114, 196);
$pdf->Cell(16,1,$datos_usuario['nombre'],0,1,'C',true);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(68, 114, 196);
$pdf->SetXY(0,17.9);
$pdf->Cell(21.5,4.9,'',0,1,'C',true);
$pdf->SetXY(1,19);
/*INGRESO AL SISTEMA*/
$pdf->Cell(16,1,'Ingreso al Sistema: ',0,0,'L',true);
$pdf->SetTextColor(255, 255, 102);
$pdf->SetFont('Arial','U',16);
$pdf->SetXY(6,19);
$pdf->Cell(16,1,'https://www.factoco.com/',0,1,'L',true);
/*INGRESO AL SISTEMA*/

/*USUARIO*/
$pdf->SetTextColor(255, 255, 255);
$pdf->SetXY(1,20);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(16,1,'Usuario: ',0,0,'L',true);
$pdf->SetTextColor(255, 255, 102);
$pdf->SetFont('Arial','',16);
$pdf->SetXY(3.4,20);
$pdf->Cell(16,1,$datos_usuario['email'],0,1,'L',true); 

/*USUARIO*/

/*USUARIO*/
$pdf->SetTextColor(255, 255, 255);
$pdf->SetXY(1,21);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(16,1,utf8_decode('Contraseña: '),0,0,'L',true);
$pdf->SetTextColor(255, 255, 102);
$pdf->SetFont('Arial','',16);
$pdf->SetXY(4.4,21);
$pdf->Cell(16,1,$datos_usuario['ClaveATV'],0,1,'L',true); 

/*USUARIO*/

/*USUARIO*/
$pdf->SetTextColor(51, 153, 51);
$pdf->SetXY(1,23);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(16,1,utf8_decode('Para más servicios con nuestra empresa visite'),0,1,'L');
$pdf->SetTextColor(51, 51, 204);
$pdf->SetFont('Arial','U',16);
$pdf->SetXY(4.4,23);
$pdf->Ln(.8);
$pdf->Cell(8,1,'https://www.factoco.com/',0,1,'C');
/*USUARIO*/
$archivo ="Bienvenida.pdf";
$pdf->Output("I", $archivo);

?>