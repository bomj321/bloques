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
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
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
                       $bloque1 = mysqli_query($con, "SELECT * FROM empleados WHERE Bloque='1'");
                              $bloque1_row= mysqli_num_rows($bloque1);

                        $bloque2 = mysqli_query($con, "SELECT * FROM empleados WHERE Bloque='2'");
                              $bloque2_row= mysqli_num_rows($bloque2);

                        $bloque3 = mysqli_query($con, "SELECT * FROM empleados WHERE Bloque='3'");
                              $bloque3_row= mysqli_num_rows($bloque3);

                        $bloque4 = mysqli_query($con, "SELECT * FROM empleados WHERE Bloque='4'");
                              $bloque4_row= mysqli_num_rows($bloque4);

                        $bloque5 = mysqli_query($con, "SELECT * FROM empleados WHERE Bloque='Pendiente'");
                              $bloque5_row= mysqli_num_rows($bloque5);

                        $bloque6= mysqli_query($con, "SELECT * FROM empleados WHERE Bloque='Cancelado'");
                              $bloque6_row= mysqli_num_rows($bloque6);
                       
                      $total=  $bloque1_row+ $bloque2_row+ $bloque3_row+ $bloque4_row+ $bloque5_row+ $bloque6_row; 


                      if($total ==0){


                        $total = 1;
                      }       
                                   
                      ?>
                          <!--CONSULTAS SQL-->

                      <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user" style="margin-right: 2px;"></i>Bloque 1</span>
              <div class="count"><?php echo $bloque1_row; ?></div>
              <span class="count_top">Clientes</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user" style="margin-right: 2px;"></i>Bloque 2</span>
              <div class="count"><?php echo $bloque2_row; ?></div>
              <span class="count_top">Clientes</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user" style="margin-right: 2px;"></i>Bloque 3</span>
              <div class="count"><?php echo $bloque3_row; ?></div>
              <span class="count_top">Clientes</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user" style="margin-right: 2px;"></i>Bloque 4</span>
              <div class="count"><?php echo $bloque4_row; ?></div>
              <span class="count_top">Clientes</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user" style="margin-right: 2px;"></i>Pendiente</span>
              <div class="count"><?php echo $bloque5_row; ?></div>
              <span class="count_top">Clientes</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user" style="margin-right: 2px;"></i>Cancelado</span>
              <div class="count"><?php echo $bloque6_row; ?></div>
              <span class="count_top">Clientes</span>
            </div>
          </div>
          <!-- /top tiles -->

          <!--INPUT OCULTOS-->
                            <input type="hidden" value=" <?php echo $bloque1_row; ?>" id="bloque_1"> 
                            <input type="hidden" value="<?php echo $bloque2_row; ?>" id="bloque_2"> 
                            <input type="hidden" value="<?php echo $bloque3_row; ?>" id="bloque_3">
                            <input type="hidden" value="<?php echo $bloque4_row; ?>" id="bloque_4">
                            <input type="hidden" value="<?php echo $bloque5_row; ?>" id="bloque_5">
                            <input type="hidden" value="<?php echo $bloque6_row; ?>" id="bloque_6"> 

          <!--INPUT OCULTOS CIERRO -->

             <!--CHARTS-->
                        <div class="col-md-12 col-sm-12 col-xs-12 ">

              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Porcentaje por Bloques</h2>
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
                          <p class="">Bloque</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5" style="margin-left: -1.5em;">
                          <p class="">Porcentaje</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas class="canvasDoughnut" height="154" width="154" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info">
                          <tr>
                            <td>
                              <p><i class="fa fa-square aero"></i>Bloque 1</p>
                            </td>
                            <td><?php echo round(($bloque1_row/$total)*100); ?>%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Bloque 2</p>
                            </td>
                            <td><?php echo round(($bloque2_row/$total)*100); ?>%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square red"></i>Bloque 3</p>
                            </td>
                            <td><?php echo round(($bloque3_row/$total)*100); ?>%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square green"></i>Bloque 4</p>
                            </td>
                            <td><?php echo round(($bloque4_row/$total)*100); ?>%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square blue"></i>Pendiente</p>
                            </td>
                            <td><?php echo round(($bloque5_row/$total)*100); ?>%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square black"></i>Cancelado</p>
                            </td>
                            <td><?php echo round(($bloque6_row/$total)*100); ?>%</td>
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
 window.location.href="index.php";</script>'; }

?>
</html>