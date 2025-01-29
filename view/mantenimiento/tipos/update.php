<?php
include ('../../../app/config.php');
include ('../../../layout/sesion.php');
include ('../../../layout/parte1.php'); 
include ('../../../app/controllers/mantenimiento/tipos/upController.php');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Informacion de tipos</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <div class="card card-success">

                      <div class="card-header">
                        <h3 class="card-title">Tipos</h3>
                      </div>


                      <form action="../../../app/controllers/mantenimiento/tipos/upTipoController.php" method="post">
                        <div class="card-body">
                        <input type="text" name="id" value="<?php echo $idTipoGet?>" hidden>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Tipo</label>
                              <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo $tipos_show?>" required>
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


</div>
<?php
include ('../../../layout/parte2.php');
?>