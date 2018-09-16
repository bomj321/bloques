<?php 
include('conexion.php');

                $fecha_pago_edit  =    mysqli_real_escape_string($con,(strip_tags($_POST["fecha_pago"],ENT_QUOTES)));//Escanpando caracteres
                $deposito_edit    =    mysqli_real_escape_string($con,(strip_tags($_POST["deposito"],ENT_QUOTES)));//Escanpando caracteres
                $banco_pago_edit  =    mysqli_real_escape_string($con,(strip_tags($_POST["banco_pago"],ENT_QUOTES)));//Escanpando caracteres
                $nombre_pago_bbdd =    mysqli_real_escape_string($con,(strip_tags($_POST["nombre_pago_bbdd"],ENT_QUOTES)));//Escanpando caracteres
		        $cedula_pago_bbdd =    mysqli_real_escape_string($con,(strip_tags($_POST["cedula_pago_bbdd"],ENT_QUOTES)));//Escanpando caracteres
		        $metodo_pago =    mysqli_real_escape_string($con,(strip_tags($_POST["metodo_pago"],ENT_QUOTES)));//Escanpando caracteres

                // CORREO DESTINO
                $para = 'contabilidad@factoconsulting';

                //require 'vendor/autoload.php'; // If you're using Composer (recommended)
// comment out the above line if not using Composer
 require("sendgrid-php/sendgrid-php.php"); 
// If not using Composer, uncomment the above line

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("registro@factoconsulting.com", "SISTEMA FACTO");
$email->setSubject("PAGO DESDE SISTEMA DE REGISTRO");
$email->addTo($para, "Usuario Pre-Registrado");
$email->addContent("text/html", "
    <html>
                            <head>
                              <title>Pago Realizado desde FACTO</title>
                              
                            </head>
                            <body>
                                <center><h4>Pago del Usuario PRE-REGISTRADO</h4></center>            
                                <p>Fecha del Pago: $fecha_pago_edit </p>
                                <p>Entidad del Pago: $banco_pago_edit </p>
                                <p>Numero del Deposito: $deposito_edit </p> 
                                <p>Tipo de Pago: $metodo_pago </p>
                                <p>Nombre del Cliente: $nombre_pago_bbdd </p> 
                                <p>C&eacute;dula del Cliente: $cedula_pago_bbdd </p>
               
                            </body>
                        </html>   
    ");

$sendgrid = new \SendGrid('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');
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

 ?>