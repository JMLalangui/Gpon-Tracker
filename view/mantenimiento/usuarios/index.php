<?php
include ('../../../app/config.php');
include ('../../../layout/sesion.php');
include ('../../../layout/parte1.php'); 
include ("../../../app/controllers/usuarios/listado.php"); 

if (isset($_SESSION['mensaje_registro_ok'])){
  $respuesta = $_SESSION['mensaje_registro_ok'];?>
  <script>
      Swal.fire({
      icon: "success",
      title: "<?php echo $respuesta ?>",
      showConfirmButton:false,
      timer: 1500
    });
  </script>
<?php
unset($_SESSION['mensaje_registro_ok']);
}
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
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
                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Usuario registrados</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                        </div>
                        <div class="card-body" >
                            <table id="table_datos" class="table table-bordered table-striped table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Fecha de creacion</th>
                                        <th scope="col">Fecha de actualizacion</th>
                                        <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cont = 0;
                                    foreach ($bd_users as $bd_usu){ 
                                      $idUsuario = $bd_usu['id'];
                                      ?>
                                        <tr>
                                            <td><?php echo $cont+=1;?></td>
                                            <td><?php echo $bd_usu['nombres']?></td>
                                            <td><?php echo $bd_usu['email']?></td>
                                            <td><?php echo $bd_usu['telefono']?></td>
                                            <td><?php echo $bd_usu['fh_creacion']?></td>
                                            <td><?php echo $bd_usu['fh_actualizacion']?></td>
                                            <td>
                                              <center>
                                                <div class="btn-group">
                                                  <a href="show.php?id=<?php echo $idUsuario; ?>" type="button" class="btn btn-info"><i class="fa fa-eye"></i> Ver</a>
                                                  <a href="update.php?id=<?php echo $idUsuario; ?>" type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Editar</a>
                                                  <a href="delete.php?id=<?php echo $idUsuario; ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</a>
                                                </div>
                                              </center>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

      </div>
    </div>
    <!--============================================  colocar los card para referencia de los equipos ============================================ -->

</div>
<!-- Page specific script -->

<?php
include('../../../layout/mensajes.php');
include ('../../../layout/parte2.php');
?>
<script src="../../../public/js/pagination.js"></script>