<?php
include ('../../../app/config.php');
include ('../../../layout/sesion.php');
include ('../../../layout/parte1.php');
include ('../../../app/controllers/usuarios/upController.php');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Actualizar datos de usuarios</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!--============================================  colocar los card para referencia de los equipos ============================================ -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <div class="card card-success">

                      <div class="card-header">
                        <h3 class="card-title">Usuario</h3>
                      </div>


                      <form action="../../../app/controllers/usuarios/upUsuarioContrller.php" method="post">
                        <div class="card-body">

                            <input type="text" name="id" value="<?php echo $idUsuarioGet?>" hidden>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nombre y apellido</label>
                              <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $nombres; ?>" placeholder="Nombre y apellido" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Correo empresarial</label>
                              <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Correo electronico" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Telefono</label>
                              <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Correo electronico" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Contraseña</label>
                              <input type="text" class="form-control" id="password_user" name="password_user" >
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Repita la contraseña</label>
                              <input type="text" class="form-control" id="password_user_verificacion" name="password_user_verificacion">
                            </div>

                            <div class="card-footer">
                              <a href="index.php" class="btn btn-secondary">Regresar</a>
                              <button type="submit" class="btn btn-success">Actualizar</button>
                            </div>
                        </div>
                      </form>


            </div>  
          </div>
        </div>
      </div>
    </div>
    <!--============================================  colocar los card para referencia de los equipos ============================================ -->

</div>

<?php
include('../../../layout/mensajes.php');
include ('../../../layout/parte2.php');
?>