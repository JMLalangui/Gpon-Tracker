<?php 
include('../../../config.php');
$id = $_POST['id'];
$estado = $_POST['estado'];

$sql_estado_update = $pdo->prepare("UPDATE gpon.estado SET
estado_est= :estado
WHERE id_est= :id");

$sql_estado_update->bindParam('id',$id);
$sql_estado_update->bindParam('estado', $estado);
$sql_estado_update->execute();

header('Location: '.$URL.'/view/mantenimiento/estados/index.php');
?>