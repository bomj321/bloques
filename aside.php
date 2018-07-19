<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Sistema FACTO!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="image/avatar5.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo $_SESSION['nombres'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-users" aria-hidden="true"></i>Clientes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="home.php">Lista de Clientes</a></li>
                      <li><a href="add.php">Agregar Clientes</a></li>
                    </ul>
                  </li>
                  <li><a href="estadistica.php"><i class="fa fa-bar-chart-o"></i>Estad&iacute;sticas</a>
                    
                  </li>
                  <li><a href="reportes_clientes.php"><i class="fa fa-edit"></i>Reportes</a>
                    
                  </li> 
                  <li><a><i class="fa fa-book" aria-hidden="true"></i>Notas<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="notas.php">Ver Notas</a></li>
                      <li><a href="add_notas.php">Agregar Notas</a></li>
                    </ul>
                  </li>
                </ul>
              </div>              
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
           
            <!-- /menu footer buttons -->
          </div>
        </div>