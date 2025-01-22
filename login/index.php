<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gpon Tracker | Log in</title>
    <link rel="icon" href="../public/images/gpon-tracker-icon.ico" type="image/ico"> <!-- Se inserta una icono en la pestaña con forma del logo del sistema -->

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/templates/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../public/templates/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/templates/AdminLTE/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../public/css/additional-styles.css">
    <!--Libreria Sweet Alert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition login-page" style="background-color: #ffffff;">

    <div class="login-container ">
        <img src="../public/images/gpon tracker.png" alt=""> <!-- Se inserta una imagen del logotipo del sistema -->
        <div class="login-form">
            <div class="login-box">

                <!-- Session para mostrar una notificacion de error de inicio de seccion en caso de ingresar datos errores o nulos -->
                 <?php
                 session_start();
                 if(isset($_SESSION['mensaje_error_ingreso'])){
                    $respuesta_error = $_SESSION['mensaje_error_ingreso'];?>
                    <script>
                        Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "<?php echo $respuesta_error; ?>"});
                    </script>
                <?php
                unset($_SESSION['mensaje_error_ingreso']);
                 }
                 ?><!-- Session -->

                <!-- /.login-logo -->
                <div >
                    <center>
                    <div>
                        <a href="#" class="h1">Bienvenido</a><hr class="gradient-line">
                    </div>
                    </center>
                    <div class="card-body">
                        <p class="login-box-msg h5" >Ingrese sus credenciales de acceso</p><br>

                        <form action="../app/controllers/login/Ingreso.php" method="post">
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <input type="password" name="password_user" class="form-control" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block" style="background-color: #004aad;">Ingresar</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>

                        <!-- /.social-auth-links -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../public/templates/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../public/templates/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../public/templates/AdminLTE/dist/js/adminlte.min.js"></script>
</body>

</html>