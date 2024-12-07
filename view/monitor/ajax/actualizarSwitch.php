<?php
include ('../../../app/config.php');
include ("../../../app/controllers/switch/listarController.php");


// Inicia el contenedor de la fila
echo '<div class="row">';

foreach ($bd_switchInfo as $bd_ip){ 
    $ip = $bd_ip['ip'];
    $nombre = $bd_ip['nombre'];
    $modelo = $bd_ip['modelo'];
    $componentes = $bd_ip['componentes'];
    $observacion = $bd_ip['observacion'];
    $nombrenodo = $bd_ip['nombrenodo'];
    $direccion = $bd_ip['direccion'];
    $coordenada = $bd_ip['coordenada'];
    $referencia = $bd_ip['referencia'];
    $numero = $bd_ip['numero'];
    
    
    // Ejecutar el comando ping
    $ping = exec("ping -n 1 $ip", $output, $status);
    $resultado = $status;

    // Definir el color y el icono en función del resultado del ping
    if (substr($ping, -2) == 'ms') {
        $respuesta = "info-box bg-success";
        $icon = 'far fa-thumbs-up';
    } else {
        $respuesta = "info-box bg-danger";
        $icon = 'fa fa-exclamation';
    }
?>

    <!-- Cada card será una columna dentro de la fila, ajustada para diferentes tamaños de pantalla -->
    <div class="col-md-2 col-sm-6 col-12 mb-4">
    <div class="<?php echo $respuesta; ?>" data-ip="<?php echo $ip; ?>" data-nombre="<?php echo $nombre; ?>" data-modelo="<?php echo $modelo; ?>" data-componentes="<?php echo $componentes; ?>" data-observacion="<?php echo $observacion; ?>" data-nombrenodo="<?php echo $nombrenodo; ?>"
                                    data-direccion="<?php echo $direccion; ?>" data-coordenada="<?php echo $coordenada; ?>" data-referencia="<?php echo $referencia; ?>" data-numero="<?php echo $numero; ?>" onclick="openModal(this)">
        <span class="info-box-icon"><i class="<?php echo $icon; ?>"></i></span>
        <div class="info-box-content">
            <span class="info-box-text"><?php echo $ip; ?></span>
            <span class="info-box-number"><?php echo $nombre; ?></span>
            <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
            </div>
            <span class="progress-description"><?php echo $modelo; ?></span>
        </div>
    </div>
</div>


<?php
}

// Cierra el contenedor de la fila
echo '</div>';
?>


