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
            <h1 class="m-0">Ingrese un nuevo nodo</h1>
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
                        <h3 class="card-title">Registro nuevo nodo</h3>
                      </div>


                      <form action="../../../app/controllers/mantenimiento/nodos/creacion.php" method="post">
                        <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nombre</label>
                              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del nodo" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Direccion</label>
                              <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion del nodo" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Coordenadas</label>
                              <input type="text" class="form-control" id="coordenada" name="coordenada" placeholder="Coordendas del nodo" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Nombre de referencia 1</label>
                              <input type="text" class="form-control" id="referenciauno" name="referenciauno" placeholder="Nombre de la persona de refrencia" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Numero de referencia 1</label>
                              <input type="text" class="form-control" id="contactouno" name="contactouno" placeholder="Numero de la persona de refrencia" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Nombre de referencia 2</label>
                              <input type="text" class="form-control" id="referenciados" name="referenciados" placeholder="Nombre de la persona de refrencia" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Numero de referencia 2</label>
                              <input type="text" class="form-control" id="contactodos" name="contactodos" placeholder="Numero de la persona de refrencia" required>
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