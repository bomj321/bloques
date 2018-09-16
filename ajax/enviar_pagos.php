<?php
include('../conexion.php');

$nombre_cuenta = mysqli_real_escape_string($con, (strip_tags($_POST["nombre_cuenta"], ENT_QUOTES)));//Escanpando caracteres
$metodo_pago = mysqli_real_escape_string($con, (strip_tags($_POST["metodo_pago"], ENT_QUOTES)));//Escanpando caracteres
$nombre_banco = mysqli_real_escape_string($con, (strip_tags($_POST["nombre_banco"], ENT_QUOTES)));//Escanpando caracteres
$numero_deposito = mysqli_real_escape_string($con, (strip_tags($_POST["numero_deposito"], ENT_QUOTES)));//Escanpando caracteres
// CORREO DESTINO
$email = 'ronaldrojascastro@gmail.com';

$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'From: Sistemas FACTO <registro@factoconsulting.com>' . "\r\n";
$cabeceras .= 'Cc:  registro@factoconsulting.com' . "\r\n";
$cabeceras .= 'Bcc: registro@factoconsulting.com' . "\r\n";

$message =
    "
    <html>
            <head>
              <title>Pago desde FACTO</title>
              
            </head>
            <body>
                <center><h4>Pago del Usuario PRE-REGISTRADO</h4></center> 
                <p>Nombre del Due単o de la Cuenta:$nombre_cuenta </p>
                <p>Metodo de Pago: $metodo_pago </p>
                <p>Entidad del Pago: $nombre_banco </p>
                <p>Numero del Deposito: $numero_deposito </p>               
            </body>
        </html>   
      
    ";

mail($email, "Pago desde FACTO", $message, $cabeceras);
