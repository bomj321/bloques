<?php 
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

 $sql=("SELECT * FROM empleados INNER JOIN notas ON (empleados.id=notas.id_empleado)");
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
  <body class="nav-md" onload="provi('0')">
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
        $Nota_nueva= mysqli_real_escape_string($con,(strip_tags($_POST["nota_editar"],ENT_QUOTES)));//Escanpando caracteres 
        $Cita_nueva= mysqli_real_escape_string($con,(strip_tags($_POST["cita_nueva"],ENT_QUOTES)));//Escanpando caracteres 
        $Id_unico= mysqli_real_escape_string($con,(strip_tags($_POST["id"],ENT_QUOTES)));//Escanpando caracteres 

       if(empty($Cita_nueva)){
       		$insert = mysqli_query($con, "UPDATE notas SET nota='$Nota_nueva' WHERE id_nota='$Id_unico' ") or die(mysqli_error());
       }elseif(empty($Nota_nueva)){

       	$insert = mysqli_query($con, "UPDATE notas SET fecha_nota='$Cita_nueva' WHERE id_nota='$Id_unico'
				") or die(mysqli_error());
       }else{
       		$insert = mysqli_query($con, "UPDATE notas SET fecha_nota='$Cita_nueva',nota='$Nota_nueva' WHERE id_nota='$Id_unico'
				") or die(mysqli_error());
       }
			
				         if($insert){
				              echo '<script language="javascript">alert("MODIFICADO CON EXITO");
							 window.location.href="notas.php";</script>';
				         }else{
				              echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo Editar los Datos !</div>';
				           }
       
				           
				     
				      }
				      ?>
	
						<!--SCRIPT CIERRE-->

					<form class="form-horizontal" enctype="multipart/form-data" class="form-horizontal" action="" method="post">

            <input type="hidden" value="<?php  echo  $datos['id_nota'];?>" name="id" id="id" class="form-control" placeholder="Cedula" required>


						<div class="form-group">
						    <label for="inputEmail1" class="col-sm-2 col-md-2 col-xs-2 control-label">Numero de Cliente</label>
    							<div class="col-sm-7 col-md-7 col-xs-7">
     								 <input disabled type="text" class="form-control" id="inputEmail1" value="<?php  echo  $datos['numero_cliente'];?>" name="Numero_Cliente" placeholder="Numero de Cliente">
							   </div>
						</div>		


					  <div class="form-group">
						    <label for="inputEmail2" class="col-sm-2 col-md-2 col-xs-2 control-label">C&eacute;dula</label>
    							<div class="col-sm-7 col-md-7 col-xs-7">
     								 <input disabled type="text" class="form-control" id="inputEmail2" value="<?php  echo  $datos['Cedula'];?>" name="Cedula" placeholder="C&eacute;dula">
							   </div>
						</div>	


						<div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 col-md-2 col-xs-2 control-label">Nombre Completo</label>
    							<div class="col-sm-7 col-md-7 col-xs-7">
     								 <input disabled name="Nombre" value="<?php  echo $datos['Nombre'];?>" type="text" class="form-control" id="inputEmail3" placeholder="Nombre Completo">
							   </div>
						</div>	


						<div class="form-group">
						    <label for="inputEmail4" class="col-sm-2 col-md-2 col-xs-2 control-label">T&eacute;lefono</label>
    							<div class="col-sm-7 col-md-7 col-xs-7">
     								 <input disabled name="Telefono" value="<?php  echo  $datos['Telefono'];?>" type="emtextail" class="form-control" id="inputEmail4" placeholder="Telefono">
							   </div>
						</div>	


						<div class="form-group">
						    <label for="inputEmail5" class="col-sm-2 col-md-2 col-xs-2 control-label">Email</label>
    							<div class="col-sm-7 col-md-7 col-xs-7">
     								 <input disabled name="Email" value="<?php  echo  $datos['Email'];?>" type="text" class="form-control" id="inputEmail5" placeholder="Email">
							   </div>
						</div>


						<div class="form-group">
						    <label for="proviv" class="col-sm-2 col-md-2 col-xs-2 control-label">Provincia</label>
    							<div class="col-sm-7 col-md-7 col-xs-7">
							            <select disabled name="Provincia" class="form-control" id="proviv" onchange="provi(this.value)" required>
							            <option value="<?php  echo  $datos['Provincia'];?>"><?php  echo  $datos['Provincia'];?></option>
							             <?php
							        while($datos1=mysqli_fetch_array($provi)){ ?>
							              <option value="<?php  echo  $datos1['nom_provi'];?>"><?php  echo $datos1['nom_provi'];?></option>
							              <?php } ?>
							            </select>
							   </div>
						</div>


						

						
					         <div class="form-group ">
					         	<label class="col-sm-2 col-md-2 col-xs-2 control-label" style="margin-right: 0.8em;">Bloque</label>
					                  <?php if($datos['Bloque'] == '1'){
					                echo '<span class="label label-success">Bloque1</span>';
					              }
					                            else if ($datos['Bloque'] == '2' ){
					                echo '<span class="label label-danger">Bloque2</span>';
					              }
					                            else if ($datos['Bloque'] == '3' ){
					                echo '<span class="label label-warning">Bloque3</span>';
					              }
					                            else if ($datos['Bloque'] == '4' ){
					                echo '<span class="label label-info">Bloque4</span>';
					              } ?>
					          </div>

						 <div class="form-group">
				          		<label class="col-sm-2 col-md-2 col-xs-2 control-label">CLAVE ATV</label>
					          <div class="col-sm-7 col-md-7 col-xs-7">
					            <input disabled type="text" name="ClaveATV" value="<?php  echo  $datos['ClaveATV'];?>" class="form-control" placeholder="ClaveATV" required>
					          </div>
       					 </div>

       					 <div class="form-group">
				          		<label class="col-sm-2 col-md-2 col-xs-2 control-label">Fecha de Agendado</label>
					          <div class="col-sm-7 col-md-7 col-xs-7">
					            <input disabled value="<?php  echo $datos['fecha_agregada'];?>" type="text" name="cita_agendado"  class="form-control" placeholder="Agregue Cita" required>
					          </div>
       					 </div>

       					 <div class="form-group">
				          		<label class="col-sm-2 col-md-2 col-xs-2 control-label"> Nueva Fecha de la Cita</label>
					          <div class="col-sm-7 col-md-7 col-xs-7">
					            <input type="date" name="cita_nueva"  class="form-control" placeholder="Agregue Cita" >
					          </div>
       					 </div>

       					 <div class="form-group">
				          		<label class="col-sm-2 col-md-2 col-xs-2 control-label">Editar Nota</label>
					          <div class="col-sm-7 col-md-7 col-xs-7">
					            <textarea type="text" name="nota_editar"  class="form-control" placeholder="Agrega tu Nota"><?php  echo   htmlspecialchars($datos['nota']);?></textarea>
					          </div>
       					 </div>

       					 <div class="form-group">
				          		<label class="col-sm-2 col-md-2 col-xs-2 control-label">Fecha de la Cita</label>
					          <div class="col-sm-7 col-md-7 col-xs-7">
					            <input disabled value="<?php  echo $datos['fecha_nota'];?>" type="text" name="cita_nota"  class="form-control" placeholder="Agregue Cita" required>
					          </div>
       					 </div>

       					 
		       		

        			 
        
		       

		          <div class="form-group">
			          <label class="col-sm-4 col-xs-3 control-label col-lg-4 col-md-4">&nbsp;</label>
			          <div class="col-sm-6">
			            <input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
			            <a href="notas.php" class="btn btn-sm btn-danger">Cancelar</a>
			          </div>
        		</div>
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
    <script src="build/js/custom.min.js"></script>
   

  </body>
  <?php
}else{
echo '<script language="javascript">alert("No tiene permisos para este modulo");
 window.location.href="index.php";</script>'; }
}else{
echo '<script language="javascript">alert("Debe proporcionar un dato valido");
 window.location.href="home.php";</script>'; }
?>
</html>