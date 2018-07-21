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

function provi(str) {
    
          var ced=0;

    if (str == "") {
        document.getElementById("provi").innerHTML = '<input type="text" class="form-control" disabled >';
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
        xmlhttp.open("GET","provi.php?q="+str+"&"+"c="+ced,true);
        xmlhttp.send();
    }
  
}


</script> 
  </head>
<?php



 @$id_user=$_SESSION['id_usu'];
  
include('conexion.php');

$sql=("SELECT * FROM planes ORDER BY nom_plan ASC
");
$plane =mysqli_query($con,$sql);

$sql1=("SELECT * FROM provincias ORDER BY nom_provi ASC
");
$provi =mysqli_query($con,$sql1);
 ?>

<?php  if(@$privilegios=$_SESSION['privilegios']=="1"){ ?>
  <body class="nav-md" >
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
                <h3>Agregar Clientes<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Añadir Nuevo Cliente y Control de Pagos</h2>
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
       /*$fecha_pago       =    mysqli_real_escape_string($con,(strip_tags($_POST["fecha_pago"],ENT_QUOTES)));//Escanpando caracteres*/
        /*$banco_pago       =    mysqli_real_escape_string($con,(strip_tags($_POST["banco_pago"],ENT_QUOTES)));//Escanpando caracteres*/
        /*$deposito         =    mysqli_real_escape_string($con,(strip_tags($_POST["deposito"],ENT_QUOTES)));//Escanpando caracteres*/

        
        $fecha_inicio   =    date("Y-m-d H:i:s");


         if (empty( mysqli_real_escape_string($con,(strip_tags($_POST["banco_pago"],ENT_QUOTES))))) {
            $banco_pago= "No Pagado";
        }else{

        $banco_pago       =    mysqli_real_escape_string($con,(strip_tags($_POST["banco_pago"],ENT_QUOTES)));//Escanpando caracteres
        }


        if (empty(mysqli_real_escape_string($con,(strip_tags($_POST["deposito"],ENT_QUOTES))))) {
            $deposito= "No Pagado";
        }else{
        $deposito         =    mysqli_real_escape_string($con,(strip_tags($_POST["deposito"],ENT_QUOTES)));//Escanpando caracteres
        }

        
        if (empty(mysqli_real_escape_string($con,(strip_tags($_POST["fecha_pago"],ENT_QUOTES))))) {//Escanpando caracteres)) {
            $fecha_pago  = 'No Pagado'  ;
        }else{
            $fecha_pago  =    mysqli_real_escape_string($con,(strip_tags($_POST["fecha_pago"],ENT_QUOTES)));//Escanpando caracteres
        }
       
        
///imagen destacada//
if (!empty($_FILES['img_emple']['name'])) {
 $imagen=$_FILES['img_emple']['name'];
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
 window.location.href="add.php";</script>'; 

exit();

}

}else{
    $image="";
}

        $cek = mysqli_query($con, "SELECT * FROM empleados WHERE Cedula='$Cedula'");
        $numero_pago = mysqli_query($con, "SELECT * FROM empleados WHERE deposito='$deposito' AND deposito!='' AND deposito!='No Pagado'");

        if(mysqli_num_rows($cek) == 0 AND mysqli_num_rows($numero_pago)==0 ){
            $insert = mysqli_query($con, "INSERT INTO empleados(Cedula,numero_cliente, Nombre, Telefono, Email, Provincia, Canton, Tiempo, Bloque,Plan, ClaveATV,img_emple,estado_pago,fecha_inicio,banco_pago,deposito,fecha_pago)
               VALUES('$Cedula','$Numero_Cliente', '$Nombre', '$Telefono', '$Email', '$Provincia', '$Canton', '$Tiempo', '$Bloque','$Plan' ,'$ClaveATV','$image','$estado_pago','$fecha_inicio','$banco_pago','$deposito','$fecha_pago')") or die(mysqli_error());
            if($insert){
              echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con &Eacute;xito.</div>';
            }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !!!!</div>';
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
    						<div class="form-group">
    						    <label for="inputEmail1" class="col-sm-2 col-md-2 col-xs-12 control-label">Numero de Cliente</label>
        							<div class="col-sm-10 col-md-10 col-xs-12">
         								 <input type="text" class="form-control" id="inputEmail1" name="Numero_Cliente" placeholder="Numero de Cliente">
    							   </div>
    						</div>		


    					  <div class="form-group">
    						    <label for="inputEmail2" class="col-sm-2 col-md-2 col-xs-12 control-label">C&eacute;dula</label>
        							<div class="col-sm-10 col-md-10 col-xs-12">
         								 <input type="text" class="form-control" id="inputEmail2" name="Cedula" placeholder="C&eacute;dula">
    							   </div>
    						</div>	


    						<div class="form-group">
    						    <label for="inputEmail3" class="col-sm-2 col-md-2 col-xs-12 control-label">Nombre Completo</label>
        							<div class="col-sm-10 col-md-10 col-xs-12">
         								 <input name="Nombre" type="text" class="form-control" id="inputEmail3" placeholder="Nombre Completo">
    							   </div>
    						</div>	


    						<div class="form-group">
    						    <label for="inputEmail4" class="col-sm-2 col-md-2 col-xs-12 control-label">T&eacute;lefono</label>
        							<div class="col-sm-10 col-md-10 col-xs-12">
         								 <input name="Telefono" type="emtextail" class="form-control" id="inputEmail4" placeholder="Telefono">
    							   </div>
    						</div>	


    						<div class="form-group">
    						    <label for="inputEmail5" class="col-sm-2 col-md-2 col-xs-12 control-label">Email</label>
        							<div class="col-sm-10 col-md-10 col-xs-12">
         								 <input name="Email" type="text" class="form-control" id="inputEmail5" placeholder="Email">
    							   </div>
    						</div>


    						<div class="form-group">
    						    <label for="proviv" class="col-sm-2 col-md-2 col-xs-12 control-label">Provincia</label>
        							<div class="col-sm-10 col-md-10 col-xs-12">
    							            <select name="Provincia" class="form-control" id="proviv" onchange="provi(this.value)" required>
                                <option value="">Selecciona Tu Provincia</option>
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

                                            <input type="text" class="form-control" disabled >
        							  </div>
    						</div>


    						 <div class="form-group">
             					 <label class="col-sm-2 col-md-2 col-xs-12 control-label">Tiempo</label>
    						          <div class="col-sm-10 col-md-10 col-xs-12">
    						            <select name="Tiempo" class="form-control" required>
    									            <?php if($datos['Tiempo']=1) { 
    									$nom_ti="Mensual";
    									}
    									else{
    									$nom_ti="Anual";
    											}
    						              ?>
    						              <option value="Mensual">Mensual</option>
    						              <option value="Anual">Anual</option>
    						            </select>
    						          </div>  
           					 </div>


    						<div class="form-group">
    				          <label class="col-sm-2 col-md-2 col-xs-12 control-label">Bloque</label>
    				          <div class="col-sm-10 col-md-10 col-xs-12">
    				            <select name="Bloque" class="form-control" required>				            						                          
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
    					            <input type="text" name="ClaveATV" class="form-control" placeholder="ClaveATV" required>
    					          </div>
           					 </div>


    		       			<div class="form-group">
    				             <label class="col-sm-2 col-md-2 col-xs-12 control-label">Credenciales</label>
    					         <div class="col-sm-10 col-md-10 col-xs-12" >
    					            <input type="file" name="img_emple" class="form-control">
    					         </div>
            			  </div>     			 
	         </div><!--PRIMER COL-MD-6-->




                      <div class="col-md-6 col-sm-6 col-xs-12"><!--SEGUNDO COL-MD-6-->
                        <center><h4>Control de Pagos</h4></center>
                          <div class="form-group">
                                <label class="col-sm-2 col-md-2 col-xs-12 control-label">Pago</label>
                                  <div  class="col-sm-10 col-md-10 col-xs-12">
                                    <select name="estado_pago" id="estado_pago" class="form-control" onchange="estadopago(this.value)" required>
                                      <option value="Pendiente">Pendiente</option>    
                                       <option value="Pagado">Pagado</option>                                                                        
                                    </select>
                                   </div> 
                            </div>


                            <div id="respuesta_pago"><!--CAMPOS A LLENAR-->                                
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


                              


                            </div>  <!--CAMPOS A LLENAR-->
                      </div> <!--SEGUNDO COL-MD-6-->    


</div><!--ROW PRIMERO-->       




        <div class="row"><!--ROW SEGUNDO--> 
        		    
        			       <div class="col-md-12  col-sm-12  col-xs-12">
                            <center>
        			          <input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
        			          <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
                              </center>
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
 window.location.href="index.php";</script>'; }

?>
</html>