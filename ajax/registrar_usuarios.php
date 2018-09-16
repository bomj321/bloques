<?php
include('../conexion.php');

$tipo_comercio = mysqli_real_escape_string($con, (strip_tags($_POST["tipo_comercio"], ENT_QUOTES)));//Escanpando caracteres
$cedula_fisica = mysqli_real_escape_string($con, (strip_tags($_POST["cedula_fisica"], ENT_QUOTES)));//Escanpando caracteres
$nombre_legal = mysqli_real_escape_string($con, (strip_tags($_POST["nombre_legal"], ENT_QUOTES)));//Escanpando caracteres
$nombre_comercio = mysqli_real_escape_string($con, (strip_tags($_POST["nombre_comercio"], ENT_QUOTES)));//Escanpando caracteres
$actividad = mysqli_real_escape_string($con, (strip_tags($_POST["actividad"], ENT_QUOTES)));//Escanpando caracteres
$celular = mysqli_real_escape_string($con, (strip_tags($_POST["celular"], ENT_QUOTES)));//Escanpando caracteres
$email_usuario = mysqli_real_escape_string($con, (strip_tags($_POST["email"], ENT_QUOTES)));//Escanpando caracteres
$provincia = mysqli_real_escape_string($con, (strip_tags($_POST["provincia"], ENT_QUOTES)));//Escanpando caracteres
$canton = mysqli_real_escape_string($con, (strip_tags($_POST["canton"], ENT_QUOTES)));//Escanpando caracteres
$distrito = mysqli_real_escape_string($con, (strip_tags($_POST["distrito"], ENT_QUOTES)));//Escanpando caracteres
$direccion = mysqli_real_escape_string($con, (strip_tags($_POST["direccion"], ENT_QUOTES)));//Escanpando caracteres
$calculo_factura = mysqli_real_escape_string($con, (strip_tags($_POST["calculo_factura"], ENT_QUOTES)));//Escanpando caracteres
$bloque='Pendiente';
$claveATV='No Designado';
$tiempo='No Designado';
$plan='No Designado';
$estado_pago='Pendiente';
$banco_pago='No Pagado';
$deposito='No Pagado';
$fecha_pago='No Pagado';
$metodo_pago='No Pagado';
$fecha_inicio='No Pagado';
$activado='0';
// CORREO DESTINO
$email_correo= 'ronaldrojascastro@gmail.com';

mysqli_set_charset($con, "utf8");
$sql_registro = "INSERT INTO pre_registro (activado,tipo_registro,cedula,nombre,nombre_comercio,actividad,celular,email,provincia,canton,distrito,direccion,facturas_mensual,Bloque,ClaveATV,Tiempo,Plan,estado_pago,fecha_inicio,banco_pago,deposito,fecha_pago,metodo_pago) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$resultado_registro = mysqli_prepare($con, $sql_registro);
mysqli_stmt_bind_param($resultado_registro, "sssssssssssssssssssssss",$activado,$tipo_comercio, $cedula_fisica, $nombre_legal, $nombre_comercio, $actividad, $celular, $email_usuario, $provincia, $canton, $distrito, $direccion, $calculo_factura,$bloque,$claveATV,$tiempo,$plan,$estado_pago,$banco_pago,$deposito,$fecha_pago,$metodo_pago,$fecha_inicio);
$ok = mysqli_stmt_execute($resultado_registro);
mysqli_stmt_close($resultado_registro);


//require 'vendor/autoload.php'; // If you're using Composer (recommended)
// comment out the above line if not using Composer
 require("../sendgrid-php/sendgrid-php.php"); 
// If not using Composer, uncomment the above line

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("registro@factoconsulting.com", "SISTEMA FACTO");
$email->setSubject("PRE-REGISTRO DESDE FACTO");
$email->addTo($email_correo, "Usuario Pre-Registrado");
$email->addContent("text/plain", "
    <html>
            <head>
              <title>Pre-Registro desde FACTO</title>
              
            </head>
            <body>
                <center><h4>Datos del Usuario PRE-REGISTRADO</h4></center>            
                <p>Tipo de Comercio: $tipo_comercio </p>
                <p>C&eacute;dula: $cedula_fisica </p>
                <p>Nombre: $nombre_legal </p>
                <p>Nombre del Comercio: $nombre_comercio </p>
                <p>Actividad del Comercio: $actividad </p>
                <p>Celular: $celular </p>
                <p>Email: $email_usuario </p>
                <p>Provincia: $provincia </p>
                <p>Cant&oacute;n: $canton </p>
                <p>Distrito: $distrito </p>
                <p>Direcci&oacute;: $direccion </p>
                <p>Facturas Mensuales: $calculo_factura </p>
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
