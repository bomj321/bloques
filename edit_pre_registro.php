<?php 
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('America/Costa_Rica');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DataTables | Gentelella</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <script>
function mostrar(){

    document.getElementById("credi").style.display = "inline";
    document.getElementById("b-credi").style.display = "none";
    document.getElementById("btcredi").style.display = "inline";

}
function mostrart(){

    document.getElementById("credi").style.display = "none";
    document.getElementById("b-credi").style.display = "inline";
    document.getElementById("btcredi").style.display = "none";

}


//FUNCIONES AJAX
function provir(str) {

    if (str == 0) {

        var str= document.getElementById("proviv").value;
        var ced= document.getElementById("id").value;
}else{
          var ced=0;

}


    if (str == "") {
        document.getElementById("provi").innerHTML = "<input type='text' class='form-control' disabled >";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("provi").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","provi_pre_registro.php?q="+str+"&&"+"c="+ced,true);
        xmlhttp.send();
    }
  
}

function distrir(str) {
    
         if (str == 0) {

        var str= document.getElementById("canton").value;
        var ced= document.getElementById("id").value;
}else{
          var ced=0;

}

    if (str == "") {
        document.getElementById("distri").innerHTML = '<input type="text" class="form-control" disabled >';
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("distri").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","distri_pre_registro.php?q="+str+"&"+"c="+ced,true);
        xmlhttp.send();
    }
  
}

function start() {
  var elejir = 0;
   provir(elejir);
   distrir(elejir);
  
}

//FUNCIONAES AJAX


</script> 
  </head>
  
<?php
      if(isset($_GET['nik'])){

$cedula=$_GET['nik'];
$ce=base64_decode($cedula);
$id_user=$_SESSION['id_usu'];
$url = explode(".", $ce);
 $n=$url[0];
include('conexion.php');

 $sql=("SELECT * FROM pre_registro WHERE id_pre_registro='$n'
");
$user =mysqli_query($con,$sql);

$sql1=("SELECT * FROM provincias ORDER BY nom_provi ASC
");
$provi =mysqli_query($con,$sql1);

$sql2=("SELECT * FROM planes ORDER BY nom_plan ASC
");
$plane =mysqli_query($con,$sql2);
$datos=mysqli_fetch_array($user);
 ?>

<?php  if(@$privilegios=$_SESSION['privilegios']=="1"){ ?>
  <!--MODAL-->           
<?php 
    include("modal_desbloquear.php");
   ?>
<!--MODAL CLOSE--> 
  <body class="nav-md" onload="start()">
    <div class="container body">
      <div class="main_container">
         <!--ASIDE-->
        <?php 
          include ('aside.php');
         ?>
        <!--ASIDE-->

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="image/avatar5.png" alt=""><?php echo $_SESSION['nombres'];?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">                    
                    <li><a href="cerrar.php"><i class="fa fa-sign-out pull-right"></i>Salir</a></li>
                  </ul>
                </li>
                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edici&oacute; de Datos de los Clientes<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar Cliente</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                        <!--SCRIPT-->
                     <?php
      if(isset($_POST['add'])){
        $Id_unico           =  mysqli_real_escape_string($con,(strip_tags($_POST["id"],ENT_QUOTES)));//Escanpando caracteres

        $tipo_registro      =  mysqli_real_escape_string($con,(strip_tags($_POST["tipo_registro"],ENT_QUOTES)));//Escanpando caracteres 
        $cedula             =  mysqli_real_escape_string($con,(strip_tags($_POST["cedula"],ENT_QUOTES)));//Escanpando caracteres 
        $nombre_completo    =  mysqli_real_escape_string($con,(strip_tags($_POST["nombre_completo"],ENT_QUOTES)));//Escanpando caracteres
        $nombre_comercio    =  mysqli_real_escape_string($con,(strip_tags($_POST["nombre_comercio"],ENT_QUOTES)));//Escanpando caracteres
        $actividad          =  mysqli_real_escape_string($con,(strip_tags($_POST["actividad"],ENT_QUOTES)));//Escanpando caracteres
        $telefono           =  mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));//Escanpando caracteres
        $email              =  mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));//Escanpando caracteres
        $Provincia          =  mysqli_real_escape_string($con,(strip_tags($_POST["Provincia"],ENT_QUOTES)));//Escanpando caracteres
        $Canton             =  mysqli_real_escape_string($con,(strip_tags($_POST["Canton"],ENT_QUOTES)));//Escanpando caracteres
        $Distrito           =  mysqli_real_escape_string($con,(strip_tags($_POST["Distrito"],ENT_QUOTES)));//Escanpando caracteres
        $direccion          =  mysqli_real_escape_string($con,(strip_tags($_POST["direccion"],ENT_QUOTES)));//Escanpando caracteres
        $facturas_mensuales =  mysqli_real_escape_string($con,(strip_tags($_POST["facturas_mensuales"],ENT_QUOTES)));//Escanpando caracteres

        $Tiempo           =    mysqli_real_escape_string($con,(strip_tags($_POST["tiempo"],ENT_QUOTES)));//Escanpando caracteres 
        $Bloque           =    mysqli_real_escape_string($con,(strip_tags($_POST["bloque"],ENT_QUOTES)));//Escanpando caracteres
        $ClaveATV         =    mysqli_real_escape_string($con,(strip_tags($_POST["claveATV"],ENT_QUOTES)));//Escanpando caracteres 
        $Plan             =    mysqli_real_escape_string($con,(strip_tags($_POST["plan"],ENT_QUOTES)));//Escanpando caracteres 
        
         /*CAMPOS AGREGADOS*/
        $estado_pago      =    mysqli_real_escape_string($con,(strip_tags($_POST["estado_pago"],ENT_QUOTES)));//Escanpando caracteres
        $fecha_pago_edit  =    mysqli_real_escape_string($con,(strip_tags($_POST["fecha_pago"],ENT_QUOTES)));//Escanpando caracteres
        $metodo_pago_edit =    mysqli_real_escape_string($con,(strip_tags($_POST["metodo_pago"],ENT_QUOTES)));//Escanpando caracteres
        $banco_pago_edit  =    mysqli_real_escape_string($con,(strip_tags($_POST["banco_pago"],ENT_QUOTES)));//Escanpando caracteres
        $deposito_edit    =    mysqli_real_escape_string($con,(strip_tags($_POST["deposito"],ENT_QUOTES)));//Escanpando caracteres
        /*CAMPOS AGREGADOS*/




/*VERIFICANDO QUE EXISTAN LAS VARIABLES*/
        if($estado_pago=='Pagado'){
                $fecha_pago_edit  =    mysqli_real_escape_string($con,(strip_tags($_POST["fecha_pago"],ENT_QUOTES)));//Escanpando caracteres
                 $imagen=$_FILES['img_emple']['name'];

            
        }elseif($estado_pago=='Pendiente'){
            $deposito_edit='No Pagado';
            $imagen='No Pagado';
            $Tiempo='No Pagado';
            $Bloque='Pendiente';
            $ClaveATV='No Designado';
            $Plan='No Designado';
            $activado=0;
            $fecha_inicio='No Pagado'; 
            $metodo_pago_edit='No Pagado';
            $activado=0;
            $fecha_pago_edit   = 'No Pagado';            
        }elseif($fecha_pago_edit=='No Pagado' AND $estado_pago='Pagado'){
            $imagen=$_FILES['img_emple']['name'];
            $activado=1;
            $fecha_inicio    =    mysqli_real_escape_string($con,(strip_tags($_POST["fecha_inicio"],ENT_QUOTES)));//Escanpando caracteres
            $fecha_pago_edit  =    mysqli_real_escape_string($con,(strip_tags($_POST["fecha_pago"],ENT_QUOTES)));//Escanpando caracteres
            $metodo_pago_edit    =    mysqli_real_escape_string($con,(strip_tags($_POST["metodo_pago"],ENT_QUOTES)));//Escanpando caracteres
        }elseif(!empty($fecha_pago_edit) AND $estado_pago=='Pagado'){
            $imagen=$_FILES['img_emple']['name'];
            $activado=1;
            $fecha_inicio    =    mysqli_real_escape_string($con,(strip_tags($_POST["fecha_inicio"],ENT_QUOTES)));//Escanpando caracteres
            $fecha_pago_edit  =    mysqli_real_escape_string($con,(strip_tags($_POST["fecha_pago"],ENT_QUOTES)));//Escanpando caracteres
            $metodo_pago_edit    =    mysqli_real_escape_string($con,(strip_tags($_POST["metodo_pago"],ENT_QUOTES)));//Escanpando caracteres
        }

       
        if (empty($banco_pago_edit)) {
            $banco_pago_edit= "No Pagado";
        }else{

        $banco_pago_edit       =    mysqli_real_escape_string($con,(strip_tags($_POST["banco_pago"],ENT_QUOTES)));//Escanpando caracteres
        }

/*VERIFICANDO QUE EXISTAN LAS VARIABLES*/


        
///imagen destacada//
         $numero_pago = mysqli_query($con, "SELECT * FROM pre_registro WHERE deposito='$deposito' AND id_pre_registro!='$Id_unico' AND deposito!='' AND deposito!='No Pagado'");
        if(mysqli_num_rows($numero_pago)==0){

 if ($imagen!='' AND $imagen!='No Pagado') {
 $tipo=$_FILES['img_emple']['type'];
 $tmp=$_FILES['img_emple']['tmp_name'];
$carpeta="img-credenciales";
$img = explode("/", $tipo);
$n=$img[1];
if ($n=='png' || $n=='jpg' || $n=='jpeg') {
  # code...
$image=$imagen;  
move_uploaded_file($tmp, $carpeta.'/'.$imagen);

$archivos1= file_get_contents($carpeta.'/'.$imagen);
}else{
  echo '<script language="javascript">alert("La imagen principal no cumple con los formatos");
 window.location.href="pre_registro.php";</script>'; 

exit();

}
              mysqli_set_charset($con, "utf8");
              $sql_pre_registro="UPDATE pre_registro SET activado=?,tipo_registro=?,cedula=?,nombre=?,nombre_comercio=?,actividad=?,celular=?,email=?,provincia=?,distrito=?,canton=?,direccion=?,facturas_mensual=?,img_emple=?, Bloque= ?, ClaveATV= ?, Tiempo= ?, Plan= ?, estado_pago= ?,fecha_inicio=?, banco_pago= ?, deposito= ?, fecha_pago= ?, metodo_pago=?  WHERE id_pre_registro= ?";
              $pre_registro=mysqli_prepare($con, $sql_pre_registro);
              mysqli_stmt_bind_param($pre_registro, "ssssssssssssssssssssssssi",$activado,$tipo_registro,$cedula,$nombre_completo,$nombre_comercio,$actividad,$telefono,$email,$Provincia,$Distrito,$Canton,$direccion,$facturas_mensuales,$imagen,$Bloque, $ClaveATV, $Tiempo,$Plan,$estado_pago,$fecha_inicio,$banco_pago_edit,$deposito_edit,$fecha_pago_edit,$metodo_pago_edit,$Id_unico);
              $ok=mysqli_stmt_execute($pre_registro);
              mysqli_stmt_close($pre_registro);
                }elseif($imagen=='No Pagado'){
                    $imagen='';
                  mysqli_set_charset($con, "utf8");
              $sql_pre_registro="UPDATE pre_registro SET activado=?,tipo_registro=?,cedula=?,nombre=?,nombre_comercio=?,actividad=?,celular=?,email=?,provincia=?,distrito=?,canton=?,direccion=?,facturas_mensual=?,img_emple=?, Bloque= ?, ClaveATV= ?, Tiempo= ?, Plan= ?, estado_pago= ?,fecha_inicio=?, banco_pago= ?, deposito= ?, fecha_pago= ?, metodo_pago=?  WHERE id_pre_registro= ?";
              $pre_registro=mysqli_prepare($con, $sql_pre_registro);
              mysqli_stmt_bind_param($pre_registro, "ssssssssssssssssssssssssi",$activado,$tipo_registro,$cedula,$nombre_completo,$nombre_comercio,$actividad,$telefono,$email,$Provincia,$Distrito,$Canton,$direccion,$facturas_mensuales,$imagen,$Bloque, $ClaveATV, $Tiempo,$Plan,$estado_pago,$fecha_inicio,$banco_pago_edit,$deposito_edit,$fecha_pago_edit,$metodo_pago_edit,$Id_unico);
              $ok=mysqli_stmt_execute($pre_registro);
              mysqli_stmt_close($pre_registro);

                }else{
                  mysqli_set_charset($con, "utf8");
                  $sql_pre_registro="UPDATE pre_registro SET activado=?,tipo_registro=?,cedula=?,nombre=?,nombre_comercio=?,actividad=?,celular=?,email=?,provincia=?,distrito=?,canton=?,direccion=?,facturas_mensual=?, Bloque= ?, ClaveATV= ?, Tiempo= ?, Plan= ?, estado_pago= ?,fecha_inicio=?,banco_pago= ?, deposito= ?, fecha_pago= ?, metodo_pago=?  WHERE id_pre_registro= ?";
                  $pre_registro=mysqli_prepare($con, $sql_pre_registro);
                  mysqli_stmt_bind_param($pre_registro, "sssssssssssssssssssssssi",$activado,$tipo_registro,$cedula,$nombre_completo,$nombre_comercio,$actividad,$telefono,$email,$Provincia,$Distrito,$Canton,$direccion,$facturas_mensuales,$Bloque, $ClaveATV, $Tiempo,$Plan,$estado_pago,$fecha_inicio,$banco_pago_edit,$deposito_edit,$fecha_pago_edit,$metodo_pago_edit,$Id_unico);
                  $ok=mysqli_stmt_execute($pre_registro);
                  mysqli_stmt_close($pre_registro);        
                }
                            if($ok){
                              echo '<script language="javascript">alert("MODIFICADO CON EXITO");
                 window.location.href="pre_registro.php";</script>';
                            }else{
                              echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
                            }
        }elseif(mysqli_num_rows($numero_pago)>0){
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. N&uacute;mero de Deposito ya Existe!!!!</div>';
        }
                         
        }           
                      ?>
    
                        <!--SCRIPT CIERRE-->

                    <form class="form-horizontal" enctype="multipart/form-data" class="form-horizontal" action="" method="post">

 <div class="row"><!--ROW PRIMERO-->         

        <div class="col-md-6 col-sm-6 col-xs-12"><!--PRIMER COL-MD-6-->
                          <center><h4>Informaci&oacute;n Personal</h4></center>
                                <input type="hidden" value="<?php  echo  $datos['id_pre_registro'];?>" name="id" id="id" class="form-control">
                                <input type="hidden" value="<?php  echo  $datos['fecha_inicio'];?>" name="fecha_inicio" id="id" class="form-control">
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-sm-2 col-md-2 col-xs-12 control-label">N&uacute;mero de Cliente</label>
                                        <div class="col-sm-10 col-md-10 col-xs-12">
                                             <input type="text" disabled class="form-control" id="inputEmail1" value="<?php  echo  $datos['id_pre_registro'];?>" name="Numero_Cliente">
                                       </div>
                                </div> 

                                 <div class="form-group">
                                    <label for="inputEmail7" class="col-sm-2 col-md-2 col-xs-12 control-label">Tipo de Registro</label>
                                        <div class="col-sm-10 col-md-10 col-xs-12" >
                                                 <select name="tipo_registro" class="form-control" required>
                                                  <option class="alert alert-danger" value="<?php  echo  $datos['tipo_registro'];?>"><?php  echo  $datos['tipo_registro'];?></option>
                                                  <option value="FISICO">FISICO</option>
                                                  <option value="JURIDICO">JUR&Iacute;DICO</option>
                                                </select>
                                          </div>
                                </div>       


                              <div class="form-group">
                                    <label for="inputEmail2" class="col-sm-2 col-md-2 col-xs-12 control-label">C&eacute;dula</label>
                                        <div class="col-sm-10 col-md-10 col-xs-12">
                                             <input type="text" name="cedula" class="form-control" id="inputEmail2" value="<?php  echo  $datos['cedula'];?>" >
                                       </div>
                                </div>  


                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 col-md-2 col-xs-12 control-label">Nombre Completo</label>
                                        <div class="col-sm-10 col-md-10 col-xs-12">
                                             <input  type="text" name="nombre_completo" value="<?php  echo $datos['nombre'];?>" type="text" class="form-control" id="inputEmail3" >
                                       </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 col-md-2 col-xs-12 control-label">Nombre del Comercio</label>
                                        <div class="col-sm-10 col-md-10 col-xs-12">
                                             <input type="text" name="nombre_comercio" value="<?php  echo $datos['nombre_comercio'];?>" type="text" class="form-control" id="inputEmail3" >
                                       </div>
                                </div>  

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 col-md-2 col-xs-12 control-label">Actividad</label>
                                        <div class="col-sm-10 col-md-10 col-xs-12">
                                             <input type="text" name="actividad" value="<?php  echo $datos['actividad'];?>" type="text" class="form-control" id="inputEmail3" >
                                       </div>
                                </div>    


                                <div class="form-group">
                                    <label for="inputEmail4" class="col-sm-2 col-md-2 col-xs-12 control-label">T&eacute;lefono</label>
                                        <div class="col-sm-10 col-md-10 col-xs-12">
                                             <input name="telefono" value="<?php  echo  $datos['celular'];?>" type="emtextail" class="form-control" id="inputEmail4">
                                       </div>
                                </div>  


                                <div class="form-group">
                                    <label for="inputEmail5" class="col-sm-2 col-md-2 col-xs-12 control-label">Email</label>
                                        <div class="col-sm-10 col-md-10 col-xs-12">
                                             <input  name="email" value="<?php  echo  $datos['email'];?>" type="text" class="form-control" id="inputEmail5" >
                                       </div>
                                </div>

<!--CAMPOS DE AJAX-->
                                 <div class="form-group">
                                    <label for="proviv" class="col-sm-2 col-md-2 col-xs-12 control-label">Provincia</label>
                                        <div class="col-sm-10 col-md-10 col-xs-12">
                                                <select name="Provincia" class="form-control" id="proviv" onchange="provir(this.value)" required>
                                                <option class="alert alert-danger" value="<?php  echo  $datos['provincia'];?>"><?php  echo  $datos['provincia'];?></option>
                                                 <?php
                                            while($datos1=mysqli_fetch_array($provi)){ ?>
                                                  <option value="<?php  echo  $datos1['nom_provi'];?>"><?php  echo $datos1['nom_provi'];?></option>
                                                  <?php } ?>
                                                </select>
                                       </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputEmail7" class="col-sm-2 col-md-2 col-xs-12 control-label">Cant&oacute;n</label>
                                        <div class="col-sm-10 col-md-10 col-xs-12" id="provi">


                                          </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail7" class="col-sm-2 col-md-2 col-xs-12 control-label">Distrito</label>
                                        <div class="col-sm-10 col-md-10 col-xs-12" id="distri">
                                                 <select name="Distrito" class="form-control" required>
                                                  <option value="<?php  echo  $datos['distrito'];?>"><?php  echo  $datos['distrito'];?></option>
                                                </select>
                                          </div>
                                </div>

<!--CAMPOS DE AJAX-->

                                 <div class="form-group">
                                    <label for="inputEmail5" class="col-sm-2 col-md-2 col-xs-12 control-label">Direcci&oacute;n</label>
                                        <div class="col-sm-10 col-md-10 col-xs-12">
                                             <input name="direccion" value="<?php  echo  $datos['direccion'];?>" type="text" class="form-control" id="inputEmail5">
                                       </div>
                                </div>

                                 <div class="form-group">
                                        <label class="col-sm-2 col-md-2 col-xs-12 control-label">Facturas Mensuales</label>
                                      <div class="col-sm-10 col-md-10 col-xs-12">
                                        <input type="text"  name="facturas_mensuales" value="<?php  echo  $datos['facturas_mensual'];?>" class="form-control">
                                      </div>
                                 </div>
            </div><!--PRIMER COL-MD-6-->           
         
          <div class="col-md-6 col-sm-6 col-xs-12"> <!--DIV QUE ENCIERRA EL SEGUNDO-->               

                 <div class="form-group">
                       <label class="col-sm-2 col-md-2 col-xs-12 control-label">Tiempo</label>
                          <div class="col-sm-10 col-md-10 col-xs-12">
                            <select name="tiempo" class="form-control" required>
                            <option class="alert alert-danger" class="alert alert-danger" value="<?php  echo  $datos['Tiempo'];?>"><?php  echo  $datos['Tiempo'];?></option>
                              <option value="Mensual">Mensual</option>
                              <option value="Anual">Anual</option>
                            </select>
                          </div>  
               </div>

                <div class="form-group">
                      <label class="col-sm-2 col-md-2 col-xs-12 control-label">Bloque</label>
                      <div class="col-sm-10 col-md-10 col-xs-12">
                        <select name="bloque" class="form-control" required>
                          <option class="alert alert-danger" class="alert alert-danger" value="<?php  echo  $datos['Bloque'];?>"><?php  echo  $datos['Bloque'];?></option>
                           <option value="1">Bloque1</option>
                           <option value="2">Bloque2</option>
                           <option value="3">Bloque3</option>
                           <option value="4">Bloque4</option>
                           <option value="Pendiente">Pendiente</option>
                           <option value="Cancelado">Cancelado</option>
                           </select>
                      </div>
                </div>

              <div class="form-group">
                <label class="col-sm-2 col-md-2 col-xs-12 control-label">CLAVE ATV</label>
                  <div class="col-sm-10 col-md-10 col-xs-12">
                         <input type="text" name="claveATV" class="form-control" placeholder="ClaveATV" value="<?php  echo  $datos['ClaveATV'];?>">
                  </div>
              </div>
            
                <div class="form-group">
                          <label class="col-sm-2 col-md-2 col-xs-12 control-label">Plan</label>
                       <div class="col-sm-10 col-md-10 col-xs-12">
                          <select name="plan" class="form-control" id="proviv" required>
                           <option class="alert alert-danger" class="alert alert-danger" value="<?php  echo  $datos['Plan'];?>"><?php  echo  $datos['Plan'];?></option> 
                           <?php
                            while($datos2=mysqli_fetch_array($plane)){ ?>
                            <option value="<?php  echo  $datos2['nom_plan'];?>"><?php  echo $datos2['nom_plan'];?></option>
                            <?php } ?>
                          </select>
                     </div>
                </div> 

                <div class="form-group">
                      <label class="col-sm-2 col-md-2 col-xs-12 control-label">Credenciales</label>
                      <p style="margin-left: 1em;" class="btn btn-sm btn-danger col-xs-12 col-md-5 col-sm-5" id="b-credi" onclick="mostrar()">Editar Credenciales</p>
                      <label class="btn btn-sm btn-danger" style="display: none;" id="btcredi" onclick="mostrart()">X</label>
                       <div class="col-sm-9 col-md-9 col-xs-10" style="display: none;" id="credi">
                              <input type="file" name="img_emple" class="form-control" >
                       </div>
                 </div>   


             <?php
              if ($datos['estado_pago']=='Pagado') {                         

              ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <center><a id="boton_desbloquear" type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#desbloquear">Autorizaci&oacute;n</a></center>
            </div>

            <?php 
              }
             ?>    

            <div  
              <?php
              if ($datos['estado_pago']=='Pagado') {
              ?>
            style="display: none;" 
               <?php 
              }
             ?>
            id="seccion_pagos"><!--SEGUNDO COL-MD-6-->

                  <div class="col-md-12 col-sm-12 col-xs-12">
                        <center><h4>Control de Pagos e Informaci&oacute;n Adicional</h4></center>
                  </div> 
                <div class="form-group">
                               <?php 
                                     if($datos['fecha_inicio']=='No Pagado'){
                        $myFormatForView= 'No Pagado';
                      }else{
                            $time = strtotime($datos['fecha_inicio']);
                              $myFormatForView = date("Y-m-d g:i A", $time);
                      }
                                 ?>
                            <label class="col-sm-2 col-md-2 col-xs-12 control-label">Fecha de Inicio</label>
                               <div class="col-sm-10 col-md-10 col-xs-12">
                                    <input type="text" value="<?php  echo  $myFormatForView;?>" class="form-control" disabled>
                                </div>
                 </div>

               <div class="form-group">

                                <label class="col-sm-2 col-md-2 col-xs-12 control-label">Pago</label>                                
                                  <div  class="col-sm-10 col-md-10 col-xs-12">
                                    <!--INPUT ESCONDIDOS PARA EL JAVASCRIPT-->
                                       <input type="hidden" id="fecha_pago_edit_pre" value="<?php  echo  $datos['fecha_pago'];?>">
                                       <input type="hidden" id="tipo_de_pago_edit_pre" value="<?php  echo  $datos['metodo_pago'];?>">
                                       <input type="hidden" id="banco_pago_edit_pre" value="<?php  echo  $datos['banco_pago'];?>">
                                       <input type="hidden" id="deposito_edit_pre" value="<?php  echo  $datos['deposito'];?>">
                                    <!--INPUT ESCONDIDOS PARA EL JAVASCRIPT-->
                                    <select name="estado_pago" id="estado_pago" class="form-control" onchange="estadopago_pre_registro_e(this.value)" required>
                                      
                                       <?php 
                                            if ($datos['estado_pago']=='Pagado') {                                                
                                        ?>
                                            <option value="<?php  echo  $datos['estado_pago'];?>"><?php  echo  $datos['estado_pago'];?></option>
                                            <option value="Pendiente">Pendiente</option>   
                                        <?php 
                                            }elseif($datos['estado_pago']=='Pendiente'){
                                         ?> 
                                           <option value="<?php  echo  $datos['estado_pago'];?>" ><?php  echo  $datos['estado_pago'];?></option>
                                           <option value="Pagado">Pagado</option>
                                          <?php 
                                            }elseif(empty($datos['estado_pago'])){
                                           ?> 
                                                <option value="Pendiente">Pendiente</option> 
                                                <option value="Pagado">Pagado</option> 


                                           <?php 
                                            }
                                            ?>                              
                                    </select>
                                   </div> 
                            </div>


                            <div id="respuesta_pago_pre_registro"><!--CAMPOS A LLENAR--> 
                                  <div class="form-group" > 
                                        <label class="col-sm-2 col-md-2 col-xs-12 control-label">Fecha de Pago</label>
                                        <div class="col-sm-10 col-md-10 col-xs-12">
                                          <input type="date" required value="<?php  echo  $datos['fecha_pago'];?>" name="fecha_pago" class="form-control"> 
                                       </div> 
                                </div>


                                   
                                <div class="form-group">
                                      <label  class="col-sm-2 col-md-2 col-xs-12 control-label" for="metodo_pago">Metodo de Pago</label>
                                            <div class="col-sm-10 col-md-10 col-xs-12">
                                                <select onchange="pago_pre_registro_e(this.value)" class="form-control" name ="metodo_pago" id="metodo_pago" placeholder="Ingrese Metodo de Pago" required>
                                                  <option class="alert alert-danger" class="alert alert-danger" value="<?php  echo  $datos['metodo_pago'];?>"><?php  echo  $datos['metodo_pago'];?></option>
                                                  <option value="Deposito">Deposito</option>
                                                  <option value="Efectivo">Efectivo</option>
                                                </select>
                                              </div> 
                                </div>
                            </div>  <!--CAMPOS A LLENAR-->

                            <?php 
                              if ($datos['metodo_pago']=='Deposito') {
                             ?>

                             <div id="respuesta_pago_pre_registro_deposito_edit"><!--CAMPOS A LLENAR DEPOSITO--> 
                                  <div class="form-group">
                                    <label class="col-sm-2 col-md-2 col-xs-12 control-label">Banco</label>
                                    <div class="col-sm-10 col-md-10 col-xs-12">
                                      <select name="banco_pago" class="form-control" required>
                                              <option class="alert alert-danger" class="alert alert-danger" value="<?php  echo  $datos['banco_pago'];?>"><?php  echo  $datos['banco_pago'];?></option>
                                               <option value="Costa Rica">Costa Rica</option> 
                                               <option value="Nacional">Nacional</option>
                                               <option value="BAC SAN JOS&Eacute;">BAC SAN JOS&Eacute;</option>  
                                      </select>
                                    </div>
                                </div>

                              <?php 
                               }else{
                               ?> 
                                  <div id="respuesta_pago_pre_registro_deposito_edit"><!--CAMPOS A LLENAR DEPOSITO--> 

                                   <div class="form-group">
                                  <label class="col-sm-2 col-md-2 col-xs-12 control-label">Banco</label>
                                  <div class="col-sm-10 col-md-10 col-xs-12">
                                    <select name="banco_pago" class="form-control" required>
                                            <option class="alert alert-danger" class="alert alert-danger" value="<?php  echo  $datos['banco_pago'];?>"><?php  echo  $datos['banco_pago'];?></option>
                                             <option value="Camara de Comercio San Ram&oacute;n">Camara de Comercio San Ram&oacute;n</option>
                                             <option value="Camara de Comercio Zona Norte">Camara de Comercio Zona Norte</option>
                                    </select>
                                  </div>
                              </div>
                              <?php 
                              }
                              ?>  

                                <div class="form-group">
                                    <label class="col-sm-2 col-md-2 col-xs-12 control-label">Deposito</label>
                                    <div class="col-sm-10 col-md-10 col-xs-12">
                                      <input required type="text" maxlength="10" required name="deposito" class="form-control" onKeyPress="return soloNumeros(event)" onKeyUp="pierdeFoco(this)" value="<?php  echo  $datos['deposito'];?>" placeholder=" Ej:1548796795">
                                    </div>
                                </div>
                            </div>  <!--CAMPOS A LLENAR DEPOSITO-->          

            </div> <!--SEGUNDO COL-MD-6-->  
        </div> <!--DIV QUE ENCIERRA EL SEGUNDO-->       
</div><!--ROW PRIMERO-->       

  
             <div class="row"><!--ROW TERCERO--> 

                      <div class="col-md-12  col-sm-12  col-xs-12">
                        <center>
                            <input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
                            <a href="pre_registro.php" class="btn btn-sm btn-danger">Cancelar</a>
                        </center>
                    </div>
           </div><!--ROW TERCERO--> 

            <div class="row"><!--ROW SEGUNDO-->
                      <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 2em;">
                        <?php 
                          if (empty($datos['img_emple'])) {                       /////////////////////CONDICIONAL PARA LAS FOTOS 
                         ?>

                      <center>
                           <a href="img-credenciales/<?php echo $datos['img_emple']; ?>"><img id="" src="img-credenciales/atvpendiente.jpg" alt="Credenciales " style="width: 70%;" height="300"></a>
                      </center>

                      <?php 
                        }else{
                       ?>
             <center>
                           <a href="img-credenciales/<?php echo $datos['img_emple']; ?>"><img id="" src="img-credenciales/<?php echo $datos['img_emple']; ?>" alt="Credenciales " style="width: 70%;" height="300"></a>
                      </center>

                       <?php 
                          }
                        ?>
                        </div>
           </div><!--ROW SEGUNDO-->

        </form>
                    





                    
                   
                   
                  </div>
                </div>
              </div>          

             
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Sistemas FACTO
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
   

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.js"></script>
   

  </body>
  <?php
}else{
echo '<script language="javascript">alert("No tiene permisos para este modulo");
 window.location.href="login.php";</script>'; }
}else{
echo '<script language="javascript">alert("Debe proporcionar un dato valido");
 window.location.href="home.php";</script>'; }
?>
</html>