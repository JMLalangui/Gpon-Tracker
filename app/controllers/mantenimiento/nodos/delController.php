<?php 
include ('../../../config.php');
$id = $_POST['id'];

    //SQL ELIMINACION DE INFORMACION
    $sql_users_creation =$pdo->prepare( "DELETE FROM gpon.nodo WHERE id_nod = :id");

    $sql_users_creation->bindParam('id',$id);
    $sql_users_creation->execute();

    session_start();
    $_SESSION['mensaje_contraseñas'] = "Nodo eliminado";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/view/mantenimiento/nodos/index.php');

?>