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
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
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


function provi(str) {

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
        xmlhttp.open("GET","provi.php?q="+str+"&&"+"c="+ced,true);
        xmlhttp.send();
    }
  
}

function distri(str) {
    
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
        xmlhttp.open("GET","distri.php?q="+str+"&"+"c="+ced,true);
        xmlhttp.send();
    }
  
}

function start() {
  var elejir = 0;
   provi(elejir);
   distri(elejir);
  
}


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

 $sql=("SELECT * FROM empleados WHERE id='$n'
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
                <h3>Edici&oacute;n de clientes<!--<small>Todos los clientes</small>--></h3>
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
        $Id               =    mysqli_real_escape_string($con,(strip_tags($_POST["id_ced"],ENT_QUOTES)));//Escanpando caracteres 
        $Id_unico         =    mysqli_real_escape_string($con,(strip_tags($_POST["id"],ENT_QUOTES)));//Escanpando caracteres 
        $Numero_Cliente   =    mysqli_real_escape_string($con, (strip_tags($_POST["Numero_Cliente"], ENT_QUOTES)));//Escanpando caracteres
        $Cedula           =    mysqli_real_escape_string($con,(strip_tags($_POST["Cedula"],ENT_QUOTES)));//Escanpando caracteres 
        $Nombre           =    mysqli_real_escape_string($con,(strip_tags($_POST["Nombre"],ENT_QUOTES)));//Escanpando caracteres 
        $Telefono         =    mysqli_real_escape_string($con,(strip_tags($_POST["Telefono"],ENT_QUOTES)));//Escanpando caracteres 
        $Email            =    mysqli_real_escape_string($con,(strip_tags($_POST["Email"],ENT_QUOTES)));//Escanpando caracteres 
        $Provincia        =    mysqli_real_escape_string($con,(strip_tags($_POST["Provincia"],ENT_QUOTES)));//Escanpando caracteres 
        $Canton           =    mysqli_real_escape_string($con,(strip_tags($_POST["Canton"],ENT_QUOTES)));//Escanpando caracteres 
        $Tiempo           =    mysqli_real_escape_string($con,(strip_tags($_POST["Tiempo"],ENT_QUOTES)));//Escanpando caracteres 
        $Bloque           =    mysqli_real_escape_string($con,(strip_tags($_POST["Bloque"],ENT_QUOTES)));//Escanpando caracteres 
        $Plan             =    mysqli_real_escape_string($con,(strip_tags($_POST["Plan"],ENT_QUOTES)));//Escanpando caracteres 
        $ClaveATV         =    mysqli_real_escape_string($con,(strip_tags($_POST["ClaveATV"],ENT_QUOTES)));//Escanpando caracteres 

        $estado_pago      =    mysqli_real_escape_string($con,(strip_tags($_POST["estado_pago"],ENT_QUOTES)));//Escanpando caracteres
        $fecha_pago_edit  =    mysqli_real_escape_string($con,(strip_tags($_POST["fecha_pago"],ENT_QUOTES)));//Escanpando caracteres
        $banco_pago_edit  =    mysqli_real_escape_string($con,(strip_tags($_POST["banco_pago"],ENT_QUOTES)));//Escanpando caracteres
        $deposito_edit    =    mysqli_real_escape_string($con,(strip_tags($_POST["deposito"],ENT_QUOTES)));//Escanpando caracteres
        $Distrito      =    mysqli_real_escape_string($con,(strip_tags($_POST["Distrito"],ENT_QUOTES)));//Escanpando caracteres

/*VERIFICANDO QUE EXISTAN LAS VARIABLES*/
        if($estado_pago=='Pagado'){
                $fecha_pago_edit  =    mysqli_real_escape_string($con,(strip_tags($_POST["fecha_pago"],ENT_QUOTES)));//Escanpando caracteres
                

            
        }elseif($estado_pago=='Pendiente'){
            $fecha_pago_edit   = 'No Pagado';            
        }elseif($fecha_pago_edit=='No Pagado' AND $estado_pago='Pagado'){
            $fecha_pago_edit  =    mysqli_real_escape_string($con,(strip_tags($_POST["fecha_pago"],ENT_QUOTES)));//Escanpando caracteres

        }elseif(!empty($fecha_pago_edit) AND $estado_pago=='Pagado'){
            $fecha_pago_edit  =    mysqli_real_escape_string($con,(strip_tags($_POST["fecha_pago"],ENT_QUOTES)));//Escanpando caracteres
        }

       
        if (empty($banco_pago_edit)) {
            $banco_pago_edit= "No Pagado";
        }else{

        $banco_pago_edit       =    mysqli_real_escape_string($con,(strip_tags($_POST["banco_pago"],ENT_QUOTES)));//Escanpando caracteres
        }


        if (empty($deposito_edit)) {
            $deposito_edit= "No Pagado";
        }else{
        $deposito_edit         =    mysqli_real_escape_string($con,(strip_tags($_POST["deposito"],ENT_QUOTES)));//Escanpando caracteres
        }
/*VERIFICANDO QUE EXISTAN LAS VARIABLES*/


        
//imagen destacada//
 $imagen=$_FILES['img_emple']['name'];
         $cek         = mysqli_query($con, "SELECT * FROM empleados WHERE Cedula='$Cedula' AND id!='$Id_unico' ");
         $numero_pago = mysqli_query($con, "SELECT * FROM empleados WHERE deposito='$deposito' AND id!='$Id_unico' AND deposito!='' AND deposito!='No Pagado'");
         $cekt        = mysqli_query($con, "SELECT * FROM empleados WHERE Cedula='$Cedula' AND Cedula!='$Id' ");
        if(mysqli_num_rows($cek) == 0 AND mysqli_num_rows($numero_pago)==0){

 if ($imagen!='') {
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
 window.location.href="home.php";</script>'; 

exit();

}
 /*$cek_numero = mysqli_query($con, "SELECT * FROM empleados WHERE numero_cliente='$Numero_Cliente'");
                  if (mysqli_num_rows($cek_numero) > 0) {
                      echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. Numero de               Cliente ya existe!
                      </div>';
                      exit;
                  }*/


                $insert = mysqli_query($con, "UPDATE empleados SET Cedula='$Cedula',numero_cliente='$Numero_Cliente', Nombre='$Nombre', Telefono='$Telefono',Email='$Email',Provincia='$Provincia',Canton='$Canton',Distrito='$Distrito',Tiempo='$Tiempo',Bloque='$Bloque',Plan='$Plan',ClaveATV='$ClaveATV',img_emple='$image',estado_pago='$estado_pago',banco_pago='$banco_pago_edit',deposito='$deposito_edit',fecha_pago='$fecha_pago_edit' WHERE id='$Id_unico'
                ") or die(mysqli_error());
                }
                else{
                         $insert = mysqli_query($con, "UPDATE empleados SET Cedula='$Cedula',numero_cliente='$Numero_Cliente', Nombre='$Nombre', Telefono='$Telefono',Email='$Email',Provincia='$Provincia',Canton='$Canton',Distrito='$Distrito',Tiempo='$Tiempo',Bloque='$Bloque',Plan='$Plan',ClaveATV='$ClaveATV',estado_pago='$estado_pago',banco_pago='$banco_pago_edit',deposito='$deposito_edit',fecha_pago='$fecha_pago_edit' WHERE id='$Id_unico'
                ") or die(mysqli_error());         
                }
                            if($insert){
                              echo '<script language="javascript">alert("MODIFICADO CON EXITO");
                 window.location.href="home.php";</script>';
                            }else{
                              echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
                            }
                           
                         }elseif(mysqli_num_rows($cek)>0){
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. C&eacute;dula existe!</div>';
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

                                <input type="hidden" value="<?php  echo  $datos['Cedula'];?>" name="id_ced" id="id_ced" class="form-control" placeholder="Cedula" required>
                                <input type="hidden" value="<?php  echo  $datos['id'];?>" name="id" id="id" class="form-control" placeholder="Cedula" required>


                                <div class="form-group">
                                    <label for="inputEmail1" class="col-sm-2 col-md-2 col-xs-12 control-label">N&uacute;mero de Cliente</label>
                                        <div class="col-sm-10 col-md-10 col-xs-12">
                                             <input type="text" class="form-control" id="inputEmail1" value="<?php  echo  $datos['numero_cliente'];?>" name="Numero_Cliente" placeholder="Numero de Cliente">
                                       </div>
                                </div>      


                              <div class="form-group">
                                    <label for="inputEmail2" class="col-sm-2 col-md-2 col-xs-12 control-label">C&eacute;dula</label>
                                        <div class="col-sm-10 col-md-10 col-xs-12">
                                             <input type="text" class="form-control" id="inputEmail2" value="<?php  echo  $datos['Cedula'];?>" name="Cedula" placeholder="C&eacute;dula">
                                       </div>
                                </div>  


                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 col-md-2 col-xs-12 control-label">Nombre Completo</label>
                                        <div class="col-sm-10 col-md-10 col-xs-12">
                                             <input name="Nombre" value="<?php  echo $datos['Nombre'];?>" type="text" class="form-control" id="inputEmail3" placeholder="Nombre Completo">
                                       </div>
                                </div>  


                                <div class="form-group">
                                    <label for="inputEmail4" class="col-sm-2 col-md-2 col-xs-12 control-label">T&eacute;lefono</label>
                                        <div class="col-sm-10 col-md-10 col-xs-12">
                                             <input name="Telefono" value="<?php  echo  $datos['Telefono'];?>" type="emtextail" class="form-control" id="inputEmail4" placeholder="Telefono">
                                       </div>
                                </div>  


                                <div class="form-group">
                                    <label for="inputEmail5" class="col-sm-2 col-md-2 col-xs-12 control-label">Email</label>
                                        <div class="col-sm-10 col-md-10 col-xs-12">
                                             <input name="Email" value="<?php  echo  $datos['Email'];?>" type="text" class="form-control" id="inputEmail5" placeholder="Email">
                                       </div>
                                </div>


                                <div class="form-group">
                                    <label for="proviv" class="col-sm-2 col-md-2 col-xs-12 control-label">Provincia</label>
                                        <div class="col-sm-10 col-md-10 col-xs-12">
                                                <select name="Provincia" class="form-control" id="proviv" onchange="provi(this.value)" required>
                                                <option value="<?php  echo  $datos['Provincia'];?>"><?php  echo  $datos['Provincia'];?></option>
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
                                                  <option value="<?php  echo  $datos['Distrito'];?>"><?php  echo  $datos['Distrito'];?></option>
                                                </select>
                                          </div>
                                </div>


                                 <div class="form-group">
                                     <label class="col-sm-2 col-md-2 col-xs-12 control-label">Tiempo</label>
                                          <div class="col-sm-10 col-md-10 col-xs-12">
                                            <select name="Tiempo" class="form-control" required>                                              
                                              <option value="<?php  echo  $datos['Tiempo'];?>"><?php  echo  $datos['Tiempo'];?></option>
                                            <option value="Mensual">Mensual</option>
                                              <option value="Anual">Anual</option>
                                            </select>
                                          </div>  
                                 </div>


                                <div class="form-group">
                                  <label class="col-sm-2 col-md-2 col-xs-12 control-label">Bloque</label>
                                  <div class="col-sm-10 col-md-10 col-xs-12">
                                    <select name="Bloque" class="form-control" required>
                                        <?php 
                                            if ($datos['Bloque']==5) {
                                                $bloque='Pendiente';                                    
                                         ?>
                                            <option value="<?php  echo  $datos['Bloque'];?>"><?php  echo  $bloque;?></option>       
                                         <?php 
                                            }elseif($datos['Bloque']==6){
                                                $bloque='Cancelado';
                                          ?>
                                           <option value="<?php  echo  $datos['Bloque'];?>"><?php  echo  $bloque;?></option>
                                          <?php 
                                            }else{

                                           ?>
                                           <option value="<?php  echo  $datos['Bloque'];?>"><?php  echo  $datos['Bloque'];?></option>

                                           <?php 
                                            }
                                            ?>                                                
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
                                    <label class="col-sm-2 col-md-2 col-xs-12 control-label">Plan</label>
                                   <div class="col-sm-10 col-md-10 col-xs-12">
                                        <select name="Plan" class="form-control" id="proviv" required>
                                        <option value="<?php  echo  $datos['Plan'];?>"><?php  echo  $datos['Plan'];?></option>
                                         <?php
                                          while($datos2=mysqli_fetch_array($plane)){ ?>
                                          <option value="<?php  echo  $datos2['nom_plan'];?>"><?php  echo $datos2['nom_plan'];?></option>
                                          <?php } ?>
                                        </select>
                                 </div>
                                </div>


                                 <div class="form-group">
                                        <label class="col-sm-2 col-md-2 col-xs-12 control-label">CLAVE ATV</label>
                                      <div class="col-sm-10 col-md-10 col-xs-12">
                                        <input type="text" name="ClaveATV" value="<?php  echo  $datos['ClaveATV'];?>" class="form-control" placeholder="ClaveATV" required>
                                      </div>
                                 </div>

                        <div class="form-group">
                             <label class="col-sm-2 col-md-2 col-xs-12 control-label">Credenciales</label>
                           <p style="margin-left: 0.8em;" class="btn btn-sm btn-danger col-xs-12 col-md-5 col-sm-5" id="b-credi" onclick="mostrar()">Editar Credenciales</p>
                           <label class="btn btn-sm btn-danger" style="display: none;" id="btcredi" onclick="mostrart()">X</label>
                           <div class="col-sm-9 col-md-9 col-xs-10" style="display: none;" id="credi">
                              <input type="file" name="img_emple" class="form-control" >
                           </div>
                        </div>   



            </div><!--PRIMER COL-MD-6-->
            <?php
              if ($datos['estado_pago']=='Pagado') {                         

              ?>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <center><a id="boton_desbloquear" type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#desbloquear">Autorizaci&oacute;n</a></center>
            </div>

            <?php 
              }
             ?>
            
            <div class="col-md-6 col-sm-6 col-xs-12" 
              <?php
              if ($datos['estado_pago']=='Pagado') {
              ?>
            style="display: none;" 
               <?php 
              }
             ?>
            id="seccion_pagos"><!--SEGUNDO COL-MD-6-->
                        <center><h4>Control de Pagos</h4></center>

                <div class="form-group">
                               <?php 
                                    $time = strtotime($datos['fecha_inicio']);
                                    $myFormatForView = date("Y-m-d g:i A", $time);
                                 ?>
                            <label class="col-sm-2 col-md-2 col-xs-12 control-label">Fecha de Inicio</label>
                               <div class="col-sm-10 col-md-10 col-xs-12">
                                    <input type="text" value="<?php  echo  $myFormatForView;?>" class="form-control" disabled>
                                </div>
                 </div>

              <div class="form-group">

                                <label class="col-sm-2 col-md-2 col-xs-12 control-label">Pago</label>                                
                                  <div  class="col-sm-10 col-md-10 col-xs-12">
                                       <input type="hidden" id="fecha_pago_edit" name="fecha_pago_edit" value="<?php  echo  $datos['fecha_pago'];?>">
                                       <input type="hidden" id="banco_pago_edit" value="<?php  echo  $datos['banco_pago'];?>">
                                       <input type="hidden" id="deposito_edit" value="<?php  echo  $datos['deposito'];?>">
                                    <select name="estado_pago" id="estado_pago" class="form-control" onchange="estadopago_edit(this.value)" required>
                                      
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


                            <div id="respuesta_pago_edit"><!--CAMPOS A LLENAR-->     

                                <?php 
                                    if($datos['estado_pago']=='Pagado'){
                                 ?>
                                        <div class="form-group" >
                                  <label class="col-sm-2 col-md-2 col-xs-12 control-label">Fecha de Pago</label>
                                  <div class="col-sm-10 col-md-10 col-xs-12" >
                                    <input type="date" class="form-control" name="fecha_pago" value="<?php  echo  $datos['fecha_pago'];?>">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-sm-2 col-md-2 col-xs-12 control-label">Banco</label>
                                  <div class="col-sm-10 col-md-10 col-xs-12">
                                    <select  class="form-control" name="banco_pago">
                                      <option value="<?php  echo  $datos['banco_pago'];?>" selected><?php  echo  $datos['banco_pago'];?></option>
                                      <?php 
                                        if ($datos['banco_pago']=='Costa Rica') {   
                                       ?>
                                             <option value="Nacional">Nacional</option>
                                             <option value="BAC SAN JOS&Eacute;">BAC SAN JOS&Eacute;</option>  
                                            
                                       <?php 
                                         }elseif($datos['banco_pago']=='Nacional'){

                                        ?>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="BAC SAN JOS&Eacute;">BAC SAN JOS&Eacute;</option>  

                                        <?php 
                                            }elseif ($datos['banco_pago']=='BAC SAN JOSÉ'){
                                         ?>
                                             <option value="Nacional">Nacional</option>
                                             <option value="Costa Rica">Costa Rica</option>
                                         <?php 
                                            }
                                          ?>
                                    </select>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-sm-2 col-md-2 col-xs-12 control-label">Deposito</label>
                                  <div class="col-sm-10 col-md-10 col-xs-12">
                                    <input maxlength="10" required name="deposito" class="form-control" onKeyPress="return soloNumeros(event)" onKeyUp="pierdeFoco(this)" placeholder=" Ej:1548796795" value="<?php  echo  $datos['deposito'];?>">
                                  </div>
                              </div>

                                 <?php
                                    }elseif($datos['estado_pago']=='Pendiente'){
                                   ?>
                                <div class="form-group" >
                                  <label class="col-sm-2 col-md-2 col-xs-12 control-label">Fecha de Pago</label>
                                  <div class="col-sm-10 col-md-10 col-xs-12" >
                                    <input type="date" class="form-control" disabled>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-sm-2 col-md-2 col-xs-12 control-label">Banco</label>
                                  <div class="col-sm-10 col-md-10 col-xs-12">
                                    <select  class="form-control" disabled>
                                       <option value="">Seleccione</option>
                                       <option value="Costa Rica">Costa Rica</option>
                                       <option value="Nacional">Nacional</option>
                                       <option value="BAC SAN JOS&Eacute;">BAC SAN JOS&Eacute;</option>                                     
                                    </select>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-sm-2 col-md-2 col-xs-12 control-label">Deposito</label>
                                  <div class="col-sm-10 col-md-10 col-xs-12">
                                    <input type="text" class="form-control" disabled placeholder=" Ej:1548796795">
                                  </div>
                              </div>
                                    <?php 
                                        }
                                     ?>

                              


                            </div>  <!--CAMPOS A LLENAR-->          

            </div> <!--SEGUNDO COL-MD-6-->  
               
</div><!--ROW PRIMERO-->       

                    








            <div class="row"><!--ROW SEGUNDO-->
                      <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 2em;">
                      	<?php 
                      		if (empty($datos['img_emple'])) {                      	/////////////////////CONDICIONAL PARA LAS FOTOS	
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
     
               
          <div class="row"><!--ROW TERCERO--> 

                      <div class="col-md-12  col-sm-12  col-xs-12">
                        <center>
                            <input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
                            <a href="home.php" class="btn btn-sm btn-danger">Cancelar</a>
                        </center>
                    </div>
           </div><!--ROW TERCERO--> 


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