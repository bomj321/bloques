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

  </head>

<?php
include('conexion.php');


  if(@$privilegios=$_SESSION['privilegios']=="1"){ ?>
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
                <h3>Estad&iacute;sticas<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Visualizar Datos Estad&iacute;sticos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <!--CONSULTAS SQL-->
                                  <?php 
                       $pendiente = mysqli_query($con, "SELECT * FROM empleados WHERE estado_pago='Pendiente'");
                              $pendiente_row= mysqli_num_rows($pendiente);

                        $pagado = mysqli_query($con, "SELECT * FROM empleados WHERE estado_pago='Pagado'");
                              $pagado_row= mysqli_num_rows($pagado);

                        $costa_rica = mysqli_query($con, "SELECT * FROM empleados WHERE banco_pago='Costa Rica' AND estado_pago='Pagado'");
                              $costa_rica_row= mysqli_num_rows($costa_rica);

                        /*$costa_rica_nopago = mysqli_query($con, "SELECT * FROM empleados WHERE banco_pago='Costa Rica' AND estado_pago='Pendiente'");
                              $costa_rica_nopago_row= mysqli_num_rows($costa_rica_nopago);   */   

                       $nacional = mysqli_query($con, "SELECT * FROM empleados WHERE banco_pago='Nacional' AND estado_pago='Pagado'");
                              $nacional_row= mysqli_num_rows($nacional);

                         /*$nacional_nopago = mysqli_query($con, "SELECT * FROM empleados WHERE banco_pago='Nacional' AND estado_pago='Pendiente'");
                              $nacional_nopago_row= mysqli_num_rows($nacional_nopago);  */    

                        $san_jose = mysqli_query($con, "SELECT * FROM empleados WHERE banco_pago='BAC San José' AND estado_pago='Pagado'");
                              $san_jose_row= mysqli_num_rows($san_jose);

                        /*$san_jose_nopago = mysqli_query($con, "SELECT * FROM empleados WHERE banco_pago='BAC San José' AND estado_pago='Pendiente'");
                              $san_jose_nopago_row= mysqli_num_rows($san_jose_nopago); */

                              /*MES ACTUAL*/
								$mesactual = date("m");
								$clientes_mes= ("SELECT * FROM empleados WHERE MONTH(fecha_inicio)='$mesactual'");
								$clientes_mes = mysqli_query($con,$clientes_mes);
								$clientes_mes_row = mysqli_num_rows($clientes_mes);

							/*MES ACTUAL*/
							$total_clientes= $costa_rica_row+$nacional_row+$san_jose_row;
                            $porcentaje_costa_rica =($costa_rica_row/$total_clientes)*100;

                            $porcentaje_nacional =($nacional_row/$total_clientes)*100;


                            $porcentaje_san_jose =($san_jose_row/$total_clientes)*100;
                       
                      /*$total=  $bloque1_row+ $bloque2_row+ $bloque3_row+ $bloque4_row+ $bloque5_row+ $bloque6_row; */



                    /*SQL PARA BUSCAR TODOS LOS CLIENTES*/
                            $costa_rica_todo = mysqli_query($con, "SELECT * FROM empleados WHERE banco_pago='Costa Rica'");
                              $costa_rica_todo_row= mysqli_num_rows($costa_rica_todo);

                            $nacional_todo = mysqli_query($con, "SELECT * FROM empleados WHERE banco_pago='Nacional'");
                              $nacional_todo_row= mysqli_num_rows($nacional_todo);

                             $san_jose_todo = mysqli_query($con, "SELECT * FROM empleados WHERE banco_pago='BAC San José'");
                              $san_jose_todo_row= mysqli_num_rows($san_jose_todo);  

                            $total_clientes_todo= $costa_rica_todo_row+$nacional_todo_row+$san_jose_todo_row;
                            $porcentaje_costa_rica_todo =($costa_rica_todo_row/$total_clientes_todo)*100;
                            $porcentaje_nacional_todo =($nacional_todo_row/$total_clientes_todo)*100;
                            $porcentaje_san_jose_todo =($san_jose_todo_row/$total_clientes_todo)*100;  
                    /*SQL PARA BUSCAR TODOS LOS CLIENTES*/
                                   
                      ?>
                          <!--CONSULTAS SQL-->

                      <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money" style="margin-right: 2px;"></i>Pendiente</span>
              <div style="color:red;" class="count"><?php echo $pendiente_row; ?></div>
              <span class="count_top">Clientes</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span  class="count_top"><i class="fa fa-money" style="margin-right: 2px;"></i>Pagado</span>
              <div style="color:blue;" class="count"><?php echo $pagado_row; ?></div>
              <span class="count_top">Clientes</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-handshake-o" style="margin-right: 2px;"></i>Costa Rica</span>
              <div class="count"><?php echo round($porcentaje_costa_rica_todo).'%'; ?></div>
              <span class="count_top">Clientes</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-handshake-o" style="margin-right: 2px;"></i>Nacional</span>
              <div class="count"><?php echo round($porcentaje_nacional_todo).'%'; ?></div>
              <span class="count_top">Clientes</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-handshake-o" style="margin-right: 2px;"></i>BAC San Jos&eacute;</span>
              <div class="count"><?php echo round($porcentaje_san_jose_todo).'%'; ?></div>
              <span class="count_top">Clientes</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user" style="margin-right: 2px;"></i>Clientes del Mes</span>
              <div class="count"><?php echo $clientes_mes_row; ?></div>
              <span class="count_top">Clientes</span>
            </div>
          </div>
          <!-- /top tiles -->

          <!--INPUT OCULTOS-->
                            <input type="hidden" value=" <?php echo $pendiente_row; ?>" id="pendiente_row"> 
                            <input type="hidden" value="<?php echo $pagado_row; ?>" id="pagado_row"> 
                            

          <!--INPUT OCULTOS CIERRO -->

             <!--CHARTS-->
                        <div class="col-md-12 col-sm-12 col-xs-12 ">

              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Porcentaje por Bancos</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>                    
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">                    
                      </th>
                      <th>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-7">
                          <p class="">Banco</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5" style="margin-left: -1.5em;">
                          <p class="">Porcentaje</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas class="canvasDoughnut_pago" height="154" width="154" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info">
                          <tr>
                            <td>
                              <p><i class="fa fa-square aero"></i>Pagado Costa Rica</p>
                            </td>
                            <td><?php echo round($porcentaje_costa_rica); ?>%</td>
                          </tr>
                           
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Pagado Nacional</p>
                            </td>
                            <td><?php echo round($porcentaje_nacional); ?>%</td>
                          </tr>
                         

                          <tr>
                            <td>
                              <p><i class="fa fa-square red"></i>Pagado San Jos&eacute;</p>
                            </td>
                            <td><?php echo round($porcentaje_san_jose); ?>%</td>
                          </tr>
                           
                         
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
             <!--CHARTS CLOSE-->
						
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
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.js"></script>
 

  </body>
  <?php
}else{
echo '<script language="javascript">alert("No tiene permisos para este modulo");
 window.location.href="login.php";</script>'; }

?>
</html>