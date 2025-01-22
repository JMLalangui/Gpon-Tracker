<?php 
include ('../../../config.php');
$id = $_POST['id'];

    //SQL ELIMINACION DE INFORMACION
    $sql_users_creation =$pdo->prepare( "DELETE FROM gpon.marca WHERE id_mar = :id");

    $sql_users_creation->bindParam('id',$id);
    $sql_users_creation->execute();

    session_start();
    $_SESSION['mensaje_contraseñas'] = "Registro eliminado";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/view/mantenimiento/marcas/index.php');

?>