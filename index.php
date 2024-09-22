<!--
VALIDACION DE SEGURIDAD DE ACCESO A SISTEMA MEDIANTE EL USO DE SESSIONES
-->
<?php
include ('app/config.php');
session_start();
if(isset($_SESSION['session_email'])){
  $email_sesion = $_SESSION['session_email'];
  $sql = "SELECT nombres FROM gpon.users WHERE email = '$email_sesion'";
  $query = $pdo->prepare($sql);
  $query->execute();
  $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

  foreach($usuarios as $usuario){
      $nombres_session = $usuario['nombres'];
}
}else{
  header('Location: '.$URL.'login/');
}
?>
<!--
VALIDACION DE SEGURIDAD DE ACCESO A SISTEMA MEDIANTE EL USO DE SESSIONES
-->
<!--
******************************************************************************************************************************
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gpon Tracker</title>
  <link rel="icon" href="<?php echo $URL?>public/images/gpon-tracker-icon.ico" type="image/ico">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="public/templates/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/templates/AdminLTE/dist/css/adminlte.min.css">
  <!-- Estilos personalizados-->
   <link rel="stylesheet" href="public/css/additional-styles.css">
  <!--Libreria Sweet Alert2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition sidebar-mini">
<script>
  Swal.fire({
  title: "Bienvenido!",
  text: "<?php echo $email_sesion ?>",
  icon: "success"
});
</script>
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
          <img src="public/templates/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> <!-- PENDIENTE EDITAR IMAGEN-->
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
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                MONITOREO 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>OLT</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>EQUIPOS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TRAFICO</p>
                </a>
              </li>
            </ul>
          </li>
          <!--============================================ OPCION DE MENU CON ITEM DESPLEGABLES ============================================-->
          <!--============================================ OPCION DE MENU CON ITEM DESPLEGABLES MANTENIMIENTO ============================================-->
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                MANTENIMIENTO
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>USUARIOS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>EQUIPOS</p>
                </a>
              </li>
            </ul>
          </li>
          <!--============================================ OPCION DE MENU CON ITEM DESPLEGABLES MANTENIMIENTO ============================================-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        <!--============================================ CERRARA SESION ============================================-->
          <li class="nav-item">
          <a href="<?php echo $URL;?>/app/controllers/login/cerrar_sesion.php" class="nav-link">
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">SISTEMA DE MONITOREO DE RED</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>

                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="public/templates/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/templates/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/templates/AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
