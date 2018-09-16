<?php 
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
    <link href="vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">

  </head>
<?php 
include ('conexion.php');
$sql=("SELECT * FROM pre_registro");
$user =mysqli_query($con,$sql);

 $codic = rand(10000000,20000000);   
 
  if(@$privilegios=$_SESSION['privilegios']=="1"){ 


      if(isset($_GET['aksi']) == 'delete'){

        $cedula=$_GET['nik'];
$ce=base64_decode($cedula);
$id_user=$_SESSION['id_usu'];
$url = explode(".", $ce);
  $n=$url[0];
        // escaping, additionally removing everything that could be (html/javascript-) code
        $nik = mysqli_real_escape_string($con,(strip_tags($n,ENT_QUOTES)));
        $cek = mysqli_query($con, "SELECT * FROM pre_registro WHERE id_pre_registro='$nik'");
        if(mysqli_num_rows($cek) == 0){
          echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
        }else{
          $delete = mysqli_query($con, "DELETE FROM empleados WHERE id_pre_registro='$nik'");
          if($delete){
           echo '<script language="javascript">alert("ELIMINADO CON EXITO");
 window.location.href="home.php";</script>';
          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
          }
        }
      }
 ?>
  <body class="nav-md">
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
                <h3>Lista de Clientes<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Filtrar Clientes</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">  
                    <table id="example1" class="table table-bordered table-hover bulk_action dt-responsive nowrap" style="width: 100%;"> 
              
                <thead>
                <tr>
                  <th>Nombre Legal</th>
                  <th>C&eacute;dula</th> 
                  <th>Celular</th>
                  <th>Email</th>
                  <th>Metodo de Pago</th>
                  <th>Fecha Inicio</th>
                  <th>Pago</th>
                  <th>Fecha del Pago</th>                 
                  <th>Banco</th>
                  <th>#N Deposito</th> 
                  <th>Tipo de Comercio</th>                  
                  <th>Nombre del Comercio</th>
                  <th>Actividad</th>
                  <th>Provincia</th>
                  <th>Cant&oacute;n</th>
                  <th>Distrito</th>
                  <th>Bloque</th>
                  <th>Tiempo</th>
                  <th>Plan</th>
                  <th>ClaveATV</th>
                  <th>Direcci&oacute;n</th>
                  <th>#N de Facturas</th>
          <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php
              while($datos=mysqli_fetch_array($user)){
              if($datos['fecha_inicio']=='No Pagado'){
                  $myFormatForView= 'No Pagado';
              }else{
                    $time = strtotime($datos['fecha_inicio']);
                      $myFormatForView = date("Y-m-d g:i A", $time);
              }
                      ?>
                <tr <?php 
                    if ($datos['fecha_pago']=='No Pagado') {
                   ?>
                   style="background-color: #ffd9cc;"
                    <?php 
                      }else{
                     ?>
                        style="background-color: #ccffe6;"
                     <?php 
                        }
                      ?>>
                 <td ><?php  echo  $datos['nombre'];?></td> 
                  <td ><?php  echo  $datos['cedula'];?></td> 
                  <td ><?php  echo  $datos['celular'];?></td>
                  <td ><?php  echo  $datos['email'];?></td>
                  <td ><?php  echo  $datos['metodo_pago'];?></td>
                  <td ><?php  echo  $myFormatForView?></td>
                  <td ><?php  echo  $datos['estado_pago'];?></td>                  
                  <td ><?php  echo  $datos['fecha_pago'];?></td>                  
                  <td ><?php  echo  $datos['banco_pago'];?></td>
                  <td ><?php  echo  $datos['deposito'];?></td>    
                  <td ><?php  echo  $datos['tipo_registro'];?></td>                 
                  <td ><?php  echo  $datos['nombre_comercio'];?></td>
                  <td ><?php  echo  $datos['actividad'];?></td> 
                  <td ><?php  echo  $datos['provincia'];?></td>
                  <td ><?php  echo  $datos['canton'];?></td>
                  <td ><?php  echo  $datos['distrito'];?></td>
                   <td ><?php if($datos['Bloque'] == '1'){
                echo '<span class="label label-success">Bloque1</span>';
              }
                            else if ($datos['Bloque'] == '2' ){
                echo '<span class="label label-success">Bloque2</span>';
              }
                            else if ($datos['Bloque'] == '3' ){
                echo '<span class="label label-success">Bloque3</span>';
              }
                            else if ($datos['Bloque'] == '4' ){
                echo '<span class="label label-success">Bloque4</span>';
 }
                            else if ($datos['Bloque'] == 'Pendiente'){
                echo '<span class="label label-warning">Pendiente</span>';
              } else if ($datos['Bloque'] == 'Cancelado' ){
                echo '<span class="label label-danger">Cancelado</span>';
              }  
              ?></td>
                  <td ><?php  echo  $datos['Tiempo'];?></td>
                  <td ><?php  echo  $datos['Plan'];?></td>
                  <td ><?php  echo  $datos['ClaveATV'];?></td>
                  <td ><?php  echo  $datos['direccion'];?></td>
                  <td ><?php  echo  $datos['facturas_mensual'];?></td>
                 
<td>
<?php 
$codic = rand(10000000,20000000);
$id_unico=$datos['id_pre_registro'];
$v=$datos['id_pre_registro'].'.'.$codic;

if($datos['activado']=='0'){
  echo 
                '<a href="activar_pre_registro.php?nik='.base64_encode($v).'" title="Activar Cuenta" class="btn btn-primary btn-sm">ACTIVAR</a>

                <button  data-toggle="modal" data-target="#'.$datos['id_pre_registro'].'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></button>
              </td>';
          }else{
echo 
                '<a href="edit_pre_registro.php?nik='.base64_encode($v).'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

                <a  title="Activado" class="btn btn-primary btn-sm">ACTIVADO</a>
                <a  onclick="enviar_correo('.$id_unico.')" title="Enviar Correo" class="btn btn-warning btn-sm">B</a>

                <a  target="_blank" href="ajax/descargar_correo_pre.php?id_usuario='.$id_unico.'" title="Descargar Bienvenida" class="btn btn-danger btn-sm">BIENVENIDA</a>

                <button  data-toggle="modal" data-target="#'.$datos['id_pre_registro'].'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></button>
              </td>';

          }


              ?>
</td>

                </tr>

                <div class="modal fade" id="<?php echo $datos['id_pre_registro']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Datos del Cliente Pre-registrado</h4>
          </div>

          <div class="modal-body">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <h4 ><?php  echo  $datos['nombre'];?></h4>
              </div>

              <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-12">
                  <a href="https://es-la.facebook.com/" target="_blank" type="button" class="btn btn-primary"><i class="fa fa-newspaper-o pull-right" aria-hidden="true"></i>N1</a>
                   <a href="https://www.google.co.ve" target="_blank" type="button" class="btn btn-primary"><i class="fa fa-group pull-right" ></i>N2</a>
              </div>
            </div>
            
            <form>

              <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" disabled class="form-control" id="exampleInputEmail1" value="<?php  echo  $datos['email'];?>" >
                </div>

              <div class="form-group">
                  <label for="provincia">Provincia</label>
                  <input type="text" disabled class="form-control" id="provincia" value="<?php  echo  $datos['provincia'];?>" >
                </div>  


              <div class="form-group">
                    <label for="exampleInputEmail1">ClaveATV</label>
                    <input type="text" disabled class="form-control" id="exampleInputEmail1" value="<?php  echo  $datos['ClaveATV'];?>" >
                </div>

                 <div class="form-group">
                 <?php if($datos['Bloque'] == '1'){
                echo '<span class="label label-success">Bloque1</span>';
              }
                            else if ($datos['Bloque'] == '2' ){
                echo '<span class="label label-success">Bloque2</span>';
              }
                            else if ($datos['Bloque'] == '3' ){
                echo '<span class="label label-success">Bloque3</span>';
              }
                            else if ($datos['Bloque'] == '4' ){
                echo '<span class="label label-success">Bloque4</span>';
 }
                            else if ($datos['Bloque'] == 'Pendiente'){
                echo '<span class="label label-warning">Pendiente</span>';
              } else if ($datos['Bloque'] == 'Cancelado' ){
                echo '<span class="label label-danger">Cancelado</span>';
              }  
              ?>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Credenciales</label>



          <?php 
                            if (empty($datos['img_emple'])) {                       /////////////////////CONDICIONAL PARA LAS FOTOS 
                         ?>

                     <a href="img-credenciales/<?php echo $datos['img_emple']; ?>"><img id="" src="img-credenciales/atvpendiente.jpg" alt="Credenciales" style="width: 100%;" height="300"></a>

                      <?php 
                        }else{
                       ?>
                         <a href="img-credenciales/<?php echo $datos['img_emple']; ?>"><img id="" src="img-credenciales/<?php echo $datos['img_emple']; ?>" alt="Credenciales" style="width: 100%;" height="300"></a>

                       <?php 
                            }
                        ?>
                </div>


            </form>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
      </div>
    </div>
 <?php
}
                ?>
                    </tbody>
                  </table>




                   
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
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.js"></script>
    <script>
  $(function () {
   table = $("#example1").DataTable({
       "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "bSort": true,


     language: {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
},
"aaSorting": [[ 0, "asc" ]]
    });



   table = $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "bSort": false,



      
    });
  });
</script>

  </body>
  <?php
}else{
echo '<script language="javascript">alert("No tiene permisos para este modulo");
 window.location.href="login.php";</script>'; }
?>
</html>