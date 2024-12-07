<?php
include ('../../../app/config.php');
include ('../../../layout/sesion.php');
include ('../../../layout/parte1.php'); 
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Listado de usuarios</h1>
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
                        <h3 class="card-title">Registro nuevo usuarios</h3>
                      </div>


                      <form action="../../../app/controllers/usuarios/creacion.php" method="post">
                        <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nombre y apellido</label>
                              <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombre y apellido" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Correo empresarial</label>
                              <input type="email" class="form-control" id="email" name="email" placeholder="Correo electronico" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Telefono</label>
                              <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Correo electronico" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Contraseña</label>
                              <input type="text" class="form-control" id="password_user" name="password_user" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Repita la contraseña</label>
                              <input type="text" class="form-control" id="password_user_verificacion" name="password_user_verificacion" required>
                            </div>

                            <div class="card-footer">
                              <a href="<?php echo $URL;?>" class="btn btn-secondary">Regresar</a>
                              <button type="submit" class="btn btn-success">Guardar</button>
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
include ('../../../layout/parte2.php');
?>