<?php
include ('../../../app/config.php');
include ('../../../layout/sesion.php');
include ('../../../layout/parte1.php');
include ('../../../app/controllers/mantenimiento/marcas/listar.php');
include ('../../../app/controllers/mantenimiento/tipos/listar.php');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ingrese un nuevo equipo</h1>
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
                        <h3 class="card-title">Registro un nuevo equipo</h3>
                      </div>


                      <form action="../../../app/controllers/mantenimiento/equipos/creacion.php" method="post">
                        <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Equipo</label>
                              <input type="text" class="form-control" id="equipo" name="equipo" placeholder="Nombre del equipo" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Modelo</label>
                              <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo" required>
                            </div>
                            
                            <div class="form-group">
                              <label for="exampleInputEmail1">Mac del equipo</label>
                              <input type="text" class="form-control" id="sn" name="sn" placeholder="S/N" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Componentes del equipo</label>
                              <input type="text" class="form-control" id="componente" name="componente" placeholder="Componentes" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Observacion del equipo</label>
                              <input type="text" class="form-control" id="observacion" name="observacion" placeholder="Observacion" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Marcas</label>
                              <select name="marca" id="marca" class="form-control">
                                <?php foreach($bd_marcas as $bd_mar ){ ?>
                                    <option value="<?php echo $bd_mar['id_mar'];?>"> <?php echo $bd_mar['marca_mar']; ?> </option>
                                <?php } ?>
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Tipos</label>
                              <select name="tipo" id="tipo" class="form-control">
                                <?php foreach($bd_tipos as $bd_ti) { ?>
                                    <option value="<?php echo $bd_ti['id_ti'];?>"> <?php echo $bd_ti['tipo_ti']; ?> </option>
                                <?php } ?>
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Estados</label>
                              <input type="text" class="form-control" id="estado" name="estado" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Nodos</label>
                              <input type="text" class="form-control" id="nodo" name="nodo" required>
                            </div>

                            <div class="card-footer">
                              <a href="index.php" class="btn btn-secondary">Regresar</a>
                              <button type="submit" class="btn btn-success">Guardar</button>
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