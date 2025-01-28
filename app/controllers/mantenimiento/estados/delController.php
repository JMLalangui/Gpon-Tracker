<?php 
include ('../../../config.php');
$id = $_POST['id'];

    //SQL ELIMINACION DE INFORMACION
    $sql_estados_creation =$pdo->prepare( "DELETE FROM gpon.estado WHERE id_est = :id");

    $sql_estados_creation->bindParam('id',$id);
    $sql_estados_creation->execute();

    session_start();
    $_SESSION['mensaje_contraseñas'] = "Registro eliminado";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/view/mantenimiento/estados/index.php');

?>