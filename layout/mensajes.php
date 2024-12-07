<?php

// MENSAJE MODAL ERROR CREACION DE USUARIO NUEVO (CONTRASEÑAS DIFERENTES)
if((isset($_SESSION['mensaje_contraseñas'])) && (isset($_SESSION['icono'])) ){
    $respuesta = $_SESSION['mensaje_contraseñas'];
    $icono = $_SESSION['icono'];?>?>
    
    <script>
        Swal.fire({
        icon: "<?php echo $icono?>",
        title: "<?php echo $respuesta ?>",
        showConfirmButton:false,
        timer: 1500
      });
    </script>
  
  <?php
  unset($_SESSION['mensaje_contraseñas']);
  }
  ?>