<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gpon Tracker</title>
  <link rel="icon" href="<?php echo $URL?>public/images/gpon-tracker-icon.ico" type="image/ico">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo $URL;?>public/templates/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $URL;?>public/templates/AdminLTE/dist/css/adminlte.min.css">
  <!-- Data table-->
  <link rel="stylesheet" href="<?php echo $URL;?>public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL;?>public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL;?>public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Estilos personalizados-->
  <link rel="stylesheet" href="<?php echo $URL;?>public/css/additional-styles.css">
  <!--Libreria Sweet Alert2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    
    <!--============================================ NOMBRE SISTEMA EN NAV BAR ============================================-->
      <ul class="navbar-nav">
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Gpon tracker</a>
          </li>
      </ul>
    <!--============================================ NOMBRE SISTEMA EN NAV BAR ============================================-->      
    <!--============================================ TABLA DE NOTAS PERSONALIZADAS ============================================-->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
    <!--============================================ TABLA DE NOTAS PERSONALIZADAS ============================================-->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!--============================================ SECCION DE LOGO ============================================-->
    <a href="<?php echo $URL?>" class="brand-link">
      <img src="<?php echo $URL?>public/images/gpon-tracker-icon.ico" alt="Gpon Tracker Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Gpon tracker</span>
    </a>
    <!--============================================ SECCION DE LOGO ============================================-->

    <!-- Sidebar -->
    <div class="sidebar">
      <!--============================================ IMAGEN Y NOMBRE DE USUARIO (optional) ============================================-->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $URL;?>public/templates/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> <!-- PENDIENTE EDITAR IMAGEN-->
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $nombres_session?></a>
        </div>
      </div>
      <!--============================================ IMAGEN Y NOMBRE DE USUARIO (optional) ============================================-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!--============================================ OPCION DE MENU CON ITEM DESPLEGABLES ============================================-->
          
          <!--GPON-->
          <!--
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                GPON 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"> -->
              <!--ADMINISTRACION-->
              <!--
              <li class="nav-item">
                <a href="<?php echo $URL;?>view/monitor/servidores" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Administracion</p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo $URL;?>view/administracion/panel.php" class="nav-link">
                      <i class="far fa-circle nav-icon text-danger"></i>
                      <p>prueba Trafico</p>
                    </a>
                  </li>
                </ul>-->
                <!--ADMINISTRACION-->
                <!--
              </li>
            </ul>
          </li>--> <!-- END GPON-->


          <!--MONITOREO-->
          <li class="nav-item"><!--menu-open-->
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                MONITOREO 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!--OLT-->
              <li class="nav-item">
                <a href="<?php echo $URL;?>view/monitor/olt/" class="nav-link">
                  <i class="fas fa-network-wired"></i>
                  <p>OLT</p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo $URL;?>view/monitor/olt/index.php" class="nav-link">
                      <i class="far fa-circle nav-icon text-danger"></i>
                      <p>Monitoreo</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!--OLT-->
              <!--Servidores-->
              <li class="nav-item">
                <a href="<?php echo $URL;?>view/monitor/servidores" class="nav-link">
                  <i class="fas fa-server"></i>
                  <p>SERVIDORES</p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo $URL;?>view/monitor/servidores/index.php" class="nav-link">
                      <i class="far fa-circle nav-icon text-danger"></i>
                      <p>Monitoreo</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!--Servidores-->
              <!--Servidores-->
              <li class="nav-item">
                <a href="<?php echo $URL;?>view/monitor/servidores" class="nav-link">
                  <i class="fas fa-cogs"></i>
                  <p>SWITCH ADMINISTRABLE</p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo $URL;?>view/monitor/switch/index.php" class="nav-link">
                      <i class="far fa-circle nav-icon text-danger"></i>
                      <p>Monitoreo</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!--Servidores-->
            </ul>
          </li> <!-- END MONITOREO-->
          <!--============================================ OPCION DE MENU CON ITEM DESPLEGABLES ============================================-->
          <!--============================================ OPCION DE MENU CON ITEM DESPLEGABLES MANTENIMIENTO ============================================-->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                MANTENIMIENTO
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
            <!--START USER-->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Usuarios</p>
                </a>
                <ul class="nav nav-treeview">

                  <li class="nav-item">
                    <a href="<?php echo $URL;?>view/mantenimiento/usuarios/" class="nav-link">
                      <i class="far fa-circle nav-icon text-danger"></i>
                      <p>Lista</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo $URL;?>view/mantenimiento/usuarios/create.php" class="nav-link">
                      <i class="far fa-circle nav-icon text-danger"></i>
                      <p>Nuevo</p>
                    </a>
                  </li>

                </ul>
              </li><!--END USER-->
              
              <!--START NODOS-->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-broadcast-tower"></i>
                  <p>Nodos</p>
                </a>
                <ul class="nav nav-treeview">

                  <li class="nav-item">
                    <a href="<?php echo $URL;?>view/mantenimiento/nodos/" class="nav-link">
                      <i class="far fa-circle nav-icon text-danger"></i>
                      <p>Lista</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo $URL;?>view/mantenimiento/nodos/create.php" class="nav-link">
                      <i class="far fa-circle nav-icon text-danger"></i>
                      <p>Nuevo</p>
                    </a>
                  </li>

                </ul>
              </li><!-- END NODOS-->

              <!--START MARCAS-->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-pen-nib"></i>
                  <p>Marcas</p>
                </a>
                <ul class="nav nav-treeview">

                  <li class="nav-item">
                    <a href="<?php echo $URL;?>view/mantenimiento/marcas/" class="nav-link">
                      <i class="far fa-circle nav-icon text-danger"></i>
                      <p>Lista</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo $URL;?>view/mantenimiento/marcas/create.php" class="nav-link">
                      <i class="far fa-circle nav-icon text-danger"></i>
                      <p>Nuevo</p>
                    </a>
                  </li>

                </ul>
              </li><!--END MARCAS-->

            </ul>
          </li>
          <!--============================================ OPCION DE MENU CON ITEM DESPLEGABLES MANTENIMIENTO ============================================-->
        <!--============================================ CERRARA SESION ============================================-->
          <li class="nav-item">
          <a href="<?php echo $URL;?>/app/controllers/login/cerrar_sesion.php" class="nav-link" style="background-color: #781616;">
            <i class="far fa-circle text-danger"></i>
            <p>
                Cerrar sesion
            </p>
          </a>
          </li>
        <!--============================================ CERRARA SESION ============================================-->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
