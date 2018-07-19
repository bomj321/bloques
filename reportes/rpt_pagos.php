<?php 
session_start();
date_default_timezone_set('America/Caracas');

  


include('../conexion.php');
error_reporting(7); //esto debe ir en la primera linea
include('class.ezpdf.php');


  $sql=("SELECT * FROM ventas ORDER BY id_ventas ASC");
 

$ventas =mysqli_query($con,$sql);


//titulos de la tabla
$titulo[0]=utf8_decode('Matrícula');
$titulo[1]='Espacio del Parqueo';
$titulo[2]=utf8_decode('Tipo de Vehículo');
$titulo[3]='Marca del Auto';
$titulo[4]='Inicio del Parqueo';
$titulo[5]='Fin del Parqueo';
$titulo[6]='Fecha del Parqueo';
$titulo[7]='Total';




//valores de la tabla
while($row=mysqli_fetch_array($ventas)){
  $registro[$titulo[0]]= utf8_decode($row['matricula']);
  $registro[$titulo[1]]= utf8_decode($row['espacio']);
  $registro[$titulo[2]]= utf8_decode($row['tipo_auto']);
  $registro[$titulo[3]]= utf8_decode($row['marca']);
  $registro[$titulo[4]]= utf8_decode($row['inicio']);
  $registro[$titulo[5]]= utf8_decode($row['fin']);
  $registro[$titulo[6]]= utf8_decode($row['creacion']);
  $registro[$titulo[7]]= utf8_decode('¢'.$row['total']);

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
$pdf->ezText(utf8_decode("Listado de Parqueos"),8,array('justification'=>'center'));



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
'cols'=>array(utf8_decode('Matrícula')=>array('justification'=>'center','width'=>42),
      'Espacio del Parqueo'=>array('justification'=>'center','width'=>90),
      utf8_decode('Tipo de Vehículo')=>array('justification'=>'center','width'=>70),
      'Marca del Auto'=>array('justification'=>'center','width'=>70),
      'Inicio del Parqueo'=>array('justification'=>'center','width'=>50),
      'Fin del Parqueo'=>array('justification'=>'center','width'=>50),
      'Fecha del Parqueo'=>array('justification'=>'center','width'=>60),
      'Total'=>array('justification'=>'center','width'=>50)

      )
      );
    
      $pdf->ezSetCmMargins(4,1,1.5,1);

  

$pdf->ezTable($tabla, $row, 'Listado de Parqueos', $la); 



      
 $pdf-> ezStream ();



?>