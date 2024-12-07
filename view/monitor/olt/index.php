<?php
include ('../../../app/config.php');
include ('../../../layout/sesion.php');
include ('../../../layout/parte1.php'); 
?>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0">Listado de OLTs</h1>
          </div>
        </div>
      </div>
    </div>

    <!--============================================  colocar los card para referencia de los equipos ============================================ -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Equipos registrados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                    </div>
                    <div class="card-body">
                        <!-- Aquí se cargarán los servidores mediante AJAX -->
                        <div id="olt-list">
                            <!-- El contenido se cargará aquí con AJAX -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!--============================================  colocar los card para referencia de los equipos ============================================ -->
    <!-- Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Información del Servidor</h5>
                    
                </div>
                <div class="modal-body">
                    <p><strong>IP:</strong> <span id="modal-ip"></span></p>
                    <p><strong>Nombre:</strong> <span id="modal-nombre"></span></p>
                    <p><strong>Modelo:</strong> <span id="modal-modelo"></span></p>
                    <p><strong>Componentes:</strong> <span id="modal-componentes"></span></p>
                    <p><strong>Observacion:</strong> <span id="modal-observacion"></span></p>
                    <p><strong>Nodo:</strong> <span id="modal-nombrenodo"></span></p>
                    <p><strong>Direccion:</strong> <span id="modal-direccion"></span></p>
                    <p><strong>Coordenada:</strong> <span id="modal-coordenada"></span></p>
                    <p><strong>Referencia:</strong> <span id="modal-referencia"></span></p>
                    <p><strong>Contacto:</strong> <span id="modal-numero"></span></p>

                </div>
                <div class="modal-footer">
                   
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page specific script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  function actualizarServidores() {
    $.ajax({
      url: '../ajax/actualizarOlts.php',  // La ruta al archivo PHP que devuelve el contenido
      method: 'GET',
      success: function(response) {
        // Actualizamos el contenido del div con el listado de servidores
        $('#olt-list').html(response);
      },
      error: function() {
        console.log("Error al obtener las OLTs.");
      }
    });
  }
  
  // Mostrar modal con la información del switch
  function openModal(card) {
        const ip = card.getAttribute('data-ip');
        const nombre = card.getAttribute('data-nombre');
        const modelo = card.getAttribute('data-modelo');
        const componentes = card.getAttribute('data-componentes');
        const observacion = card.getAttribute('data-observacion');
        const nombrenodo = card.getAttribute('data-nombrenodo');
        const direccion = card.getAttribute('data-direccion');
        const coordenada = card.getAttribute('data-coordenada');
        const referencia = card.getAttribute('data-referencia');
        const numero = card.getAttribute('data-numero');

        // Asignar valores al modal
        $('#modal-ip').text(ip);
        $('#modal-nombre').text(nombre);
        $('#modal-modelo').text(modelo);
        $('#modal-componentes').text(componentes);
        $('#modal-observacion').text(observacion);
        $('#modal-nombrenodo').text(nombrenodo);
        $('#modal-direccion').text(direccion);
        $('#modal-coordenada').text(coordenada);
        $('#modal-referencia').text(referencia);
        $('#modal-numero').text(numero);

        // Mostrar modal
        const modal = new bootstrap.Modal(document.getElementById('infoModal'));
        modal.show();
    }


  // Cargar los servidores cuando la página se cargue
  $(document).ready(function() {
    actualizarServidores();

    // Actualizar cada 1 segundos (opcional)
    setInterval(actualizarServidores, 1000);
  });
</script>

<?php
include ('../../../layout/parte2.php');
?>
