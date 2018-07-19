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
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
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

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/alertify.css">

  </head>
<?php 
include ('conexion.php');
$sql=("SELECT * FROM notas INNER JOIN empleados ON (empleados.id=notas.id_empleado)");
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
        $cek = mysqli_query($con, "SELECT * FROM notas WHERE id_nota='$nik'");
        if(mysqli_num_rows($cek) == 0){
          echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
        }else{
          $delete = mysqli_query($con, "DELETE FROM notas WHERE id_nota='$nik'");
          if($delete){
           echo '<script language="javascript">alert("ELIMINADO CON EXITO");
 window.location.href="notas.php";</script>';
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

                  

                   
                <div class="row" style="margin-bottom: 1em;">
					<h4>Rango de Fecha citas</h4>
				<div class="form-inline">
	                	 <div class="form-group">
	                		<label for="min">Fecha M&iacute;nima</label>
	                		<input type="date" class="form-control" id="min" name="min" type="text">
	                	</div>	
	                	 <div class="form-group">
	                		<label for="max">Fecha M&aacute;xima</label>
	                		<input type="date" class="form-control" id="max" name="max" type="text">
	                	</div>	
				</div>

                </div>
                    
                    <table id="example1" class="table table-bordered table-hover bulk_action dt-responsive nowrap" style="width: 100%;"> 
              
                <thead>
                <tr>
                  <th>C#</th>
                  <th>Nombre</th>
                  <th>Cédula</th>                  
                  <th>Fecha de Agendado</th>
                  <th>Fecha Cita</th>                  
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php
        while($datos=mysqli_fetch_array($user)){                 
        ?>
                <tr>
                  <td ><?php  echo  $datos['numero_cliente'];?></td>
                  <td ><?php  echo  $datos['Nombre'];?></td>
                  <td ><?php  echo  $datos['Cedula'];?></td>                 
                  <td ><?php  echo  $datos['fecha_agregada'];?></td>
                  <td ><?php  echo  $datos['fecha_nota'];?></td>
<td>
<?php 
$v=$datos['id_nota'].'.'.$codic;

echo 
                '

                <a href="edit_nota.php?nik='.base64_encode($v).'" title="Editar Nota" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

                <a href="notas.php?aksi=delete&nik='.base64_encode($v).'" title="Borrar Nota" onclick=" return confirm(\'¿Estas se seguro de querer eliminarlo?\');" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

                <button  data-toggle="modal" data-target="#'.$datos['id_nota'].'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></button>
              </td>'
              ?>
                </tr>

                <div class="modal fade" id="<?php echo $datos['id_nota']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      		 <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="exampleModalLabel">Datos del Cliente</h4>
		      </div>

		      <div class="modal-body">
		      	<h4 ><?php  echo  $datos['Nombre'];?></h4>
		        <form>

		          <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" disabled class="form-control" id="exampleInputEmail1" value="<?php  echo  $datos['Email'];?>" >
                </div>

                <div class="form-group">
                  <label for="provincia">Provincia</label>
                  <input type="text" disabled class="form-control" id="provincia" value="<?php  echo  $datos['Provincia'];?>" >
                </div> 		                        

                <div class="form-group">
                  <label for="telefono">T&eacute;lefono</label>
 				           <input type="text" disabled class="form-control" id="telefono" value="<?php  echo  $datos['Telefono'];?>" >
                </div>

                

                 <div class="form-group">
                  <label for="cita">Raz&oacute;n de la Cita</label>
              <textarea style="height: 200px;" type="text" disabled class="form-control" id="cita"><?php  echo htmlspecialchars($datos['nota']);?></textarea>
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

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    <script src="js/alertify.js"></script>
    <script>
  $(function () {
   table = $("#example1").DataTable({
     language: {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar Cliente:",
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

   /* Custom filtering function which will search data in column four between two values */
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = $('#min').val();
        var max = $('#max').val();
        var age = data[4]; // use data for the age column
 
        if ( ( !min  && !max ) ||
             ( !min && age <= max ) ||
             ( min <= age   && !max ) ||
             ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
    }
);
 
$(document).ready(function() {
    var table = $('#example1').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').change( function() {
        table.draw();
    } );
} );

  });
</script>

  </body>
  <?php
}else{
echo '<script language="javascript">alert("No tiene permisos para este modulo");
 window.location.href="index.php";</script>'; }
?>
</html>