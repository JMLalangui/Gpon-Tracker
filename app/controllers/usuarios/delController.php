<?php 
include ('../../config.php');
$id = $_POST['id'];

    //SQL ELIMINACION DE INFORMACION
    $sql_users_creation =$pdo->prepare( "DELETE FROM gpon.users WHERE id = :id");

    $sql_users_creation->bindParam('id',$id);
    $sql_users_creation->execute();

    session_start();
    $_SESSION['mensaje_contraseñas'] = "Usuario eliminado";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/view/mantenimiento/usuarios/index.php');

?>