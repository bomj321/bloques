<?php 
include('conexion.php');

                $fecha_pago  =    mysqli_real_escape_string($con,(strip_tags($_POST["fecha_pago"],ENT_QUOTES)));//Escanpando caracteres
                $banco_pago  =    mysqli_real_escape_string($con,(strip_tags($_POST["banco_pago"],ENT_QUOTES)));//Escanpando caracteres
                $deposito  =    mysqli_real_escape_string($con, (strip_tags($_POST["deposito"], ENT_QUOTES)));//Escanpando caracteres
                $Nombre           =    mysqli_real_escape_string($con,(strip_tags($_POST["Nombre"],ENT_QUOTES)));//Escanpando caracteres 
		        $Cedula           =    mysqli_real_escape_string($con,(strip_tags($_POST["Cedula"],ENT_QUOTES)));//Escanpando caracteres 

            
                 $para = 'contabilidad@factoconsulting';

                //require 'vendor/autoload.php'; // If you're using Composer (recommended)
// comment out the above line if not using Composer
 require("sendgrid-php/sendgrid-php.php"); 
// If not using Composer, uncomment the above line

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("registro@factoconsulting.com", "SISTEMA FACTO");
$email->setSubject("PAGO DESDE SISTEMA DE REGISTRO");
$email->addTo($para, "Usuario Normal");
$email->addContent("text/html", "
                        <html>
                            <head>
                              <title>Pago Realizado desde FACTO</title>
                              
                            </head>
                            <body>
                                <center><h4>Pago del Usuario Normal</h4></center>            
                                <p>Fecha del Pago: $fecha_pago </p>
                                <p>Entidad del Pago: $banco_pago </p>
                                <p>Numero del Deposito: $deposito </p>
                                <p>Nombre del Cliente: $Nombre </p> 
                                <p>C&eacute;dula del Cliente: $Cedula </p>
               
                            </body>
                        </html>     
    ");

$sendgrid = new \SendGrid('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');
try {
    $response = $sendgrid->send($email);
    //print $response->statusCode() . "\n";
    //print_r($response->headers());
    //print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}               

 ?>