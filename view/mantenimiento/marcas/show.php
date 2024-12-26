<?php
include ('../../../app/config.php');
include ('../../../layout/sesion.php');
include ('../../../layout/parte1.php');
include ('../../../app/controllers/mantenimiento/marcas/showController.php');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Informacion de las marcas</h1>
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
            <div class="card card-info">

                      <div class="card-header">
                        <h3 class="card-title">Marcas</h3>
                      </div>


                      <form action="../../../app/controllers/mantenimiento/marcas/creacion.php" method="post">
                        <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nombre del Marca</label>
                              <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $marcas_show?>" disabled>
                            </div>

                            <div class="card-footer">
                              <a href="index.php" class="btn btn-secondary">Regresar</a>
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