<?php
include('../conexion.php');

$nombre_cuenta = mysqli_real_escape_string($con, (strip_tags($_POST["nombre_cuenta"], ENT_QUOTES)));//Escanpando caracteres
$metodo_pago = mysqli_real_escape_string($con, (strip_tags($_POST["metodo_pago"], ENT_QUOTES)));//Escanpando caracteres
$nombre_pago = mysqli_real_escape_string($con, (strip_tags($_POST["nombre_pago"], ENT_QUOTES)));//Escanpando caracteres
$numero_deposito = mysqli_real_escape_string($con, (strip_tags($_POST["numero_deposito"], ENT_QUOTES)));//Escanpando caracteres

// CORREO DESTINO
$email = 'ronaldrojascastro@gmail.com';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= "Organization: Ecommerce Orybu\r\n";
$cabeceras .= "X-Priority: 3\r\n";
$cabeceras .= "X-Mailer: PHP" . phpversion(7.1) . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$cabeceras .= 'Cc: <ronaldrojascastro@gmail.com>' . "\r\n";
$cabeceras .= 'Bcc: <ronaldrojascastro@gmail.com>' . "\r\n";
// Cabeceras adicionales
$cabeceras .= 'From: Sistemas FACTO <ronaldrojascastro@gmail.com>' . "\r\n";
$cabeceras .= "Reply-To: <ronaldrojascastro@gmail.com>\r\n";
$cabeceras .= "Return-Path: <ronaldrojascastro@gmail.com>\r\n";

$message =
    "
    
    <html>
            <head>
              <title>Pre-Registro desde FACTO</title>
              
            </head>
            <body>
                <center><h4>Datos del Usuario PRE-REGISTRADO</h4></center>            
                <p>Nombre del Dueño de la Cuenta: $nombre_cuenta </p>
                <p>Metodo de Pago: $metodo_pago </p>
                <p>Nombre del Pago: $nombre_pago </p>
                <p>Numero del Deposito: $numero_deposito </p>               
            </body>
        </html>   
      
    ";

mail($email, "Pre-Registro desde FACTO", $message, $cabeceras);
