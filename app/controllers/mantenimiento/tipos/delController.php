<?php 
include ('../../../config.php');
$id = $_POST['id'];

    //SQL ELIMINACION DE INFORMACION
    $sql_tipos_creation =$pdo->prepare( "DELETE FROM gpon.tipo WHERE id_ti = :id");

    $sql_tipos_creation->bindParam('id',$id);
    $sql_tipos_creation->execute();

    session_start();
    $_SESSION['mensaje_contraseñas'] = "Registro eliminado";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/view/mantenimiento/tipos/index.php');

?>