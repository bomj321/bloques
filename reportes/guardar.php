<?php 
session_start();
date_default_timezone_set('America/Costa_Rica');

  


include('../conexion.php');
error_reporting(7); //esto debe ir en la primera linea
include('class.ezpdf.php');


  $sql=("SELECT * FROM empleados ORDER BY numero_cliente ASC");
 

$pagos =mysqli_query($con,$sql);


//titulos de la tabla
$titulo[0]='Id del Cliente';
$titulo[1]=utf8_decode('Cédula');
$titulo[2]='Nombre del Cliente';
$titulo[3]='Fecha de Inicio';
$titulo[4]='Fecha del Pago';
$titulo[5]='Banco';
$titulo[6]=utf8_decode('Número de Depósito');



//valores de la tabla
while($row=mysqli_fetch_array($pagos)){
  $registro[$titulo[0]]= utf8_decode($row['id']);
  $registro[$titulo[1]]= utf8_decode($row['Cedula']);
  $registro[$titulo[2]]= utf8_decode($row['Nombre']);
  $registro[$titulo[3]]= utf8_decode($row['fecha_inicio']);
  $registro[$titulo[4]]= utf8_decode($row['fecha_pago']);
  $registro[$titulo[5]]= utf8_decode($row['banco_pago']);
  $registro[$titulo[6]]= utf8_decode($row['deposito']);

  $tabla[]=$registro;
}


$pdf = new Cezpdf('LETTER');
$pdf->ezSetCmMargins(1,2,4,4); // Configuración de los margenes en centímetros por orden superior(2), inferior(2), izquierdo(4) y derecho(4)
$pdf->ezStartPageNumbers(725,550,9,'','',1); // Insertar el número de página
$pdf-> setLineStyle (1);



$pdf->addText(490,700,8,"Fecha:".date("Y-m-d H:i:s")); // Agregar la fecha
  
//para colocar la imagen

//
$pdf->selectFont('./fonts/Helvetica.afm');
$pdf->setStrokeColor(0,0,0);
$pdf->setColor(0,0,0);
$pdf->ezSetCmMargins(1,1,1,1);
$pdf->ezText(utf8_decode("Listado de Pagos"),8,array('justification'=>'center'));



$la=array('showHeadings'=>1, // Mostrar encabezados
'fontSize' => 8, // Tamaño de Letras
'titleFontSize' => 12,  // Tamaño de Letras de los títulos
'showLines'=>1, // Mostrar Líneas
'shaded'=>1, // Sombra entre líneas
'width'=>700, // Ancho de la tabla
'maxWidth'=>900,
'lineCol'=>array(0,0,0),
  'textCol' => 0,0,0 ,
'height'=>700,
'maxHeight'=>900, // Ancho Máximo de la tabla
'xOrientation'=>center, // Orientación de la tabla
'cols'=>'Id del Cliente'=>array('justification'=>'center','width'=>42),
         utf8_decode('Cédula')=>array('justification'=>'center','width'=>70),
         'Nombre del Cliente'=>array('justification'=>'center','width'=>70),
         'Fecha de Inicio'=>array('justification'=>'center','width'=>50),
         'Fecha del Pago'=>array('justification'=>'center','width'=>50),
      'Banco'=>array('justification'=>'center','width'=>60),
       utf8_decode('Número de Depósito')=>array('justification'=>'center','width'=>50)

      )
      );
    
      $pdf->ezSetCmMargins(4,1,1.5,1);

  

$pdf->ezTable($tabla, $row, 'Listado de Pagos', $la); 



      
 $pdf-> ezStream ();



?>