<?php
include ('../../../app/config.php');
include ('../../../layout/sesion.php');
include ('../../../layout/parte1.php');
include ('../../../app/controllers/usuarios/showContrller.php');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Eliminacion de usuarios</h1>
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
            <div class="card card-danger">

                      <div class="card-header">
                        <h3 class="card-title">Confirme que el usuario sea el correcto</h3>
                      </div>
                      <form action="../../../app/controllers/usuarios/delController.php" method="post">
                        <div class="card-body">

                            <input type="text" name="id" value="<?php echo $idUsuarioGet?>" hidden>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nombre y apellido</label>
                              <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $nombres_show?>" disabled>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Correo empresarial</label>
                              <input type="email" class="form-control" id="email" name="email" value="<?php echo $email_show?>"  disabled>
                            </div>

                            <div class="card-footer">
                              <a href="index.php" class="btn btn-secondary">Regresar</a>
                              <button type="submit" class="btn btn-danger">Eliminar</button>
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
include ('../../../layout/mensajes.php');
include ('../../../layout/parte2.php');
?>