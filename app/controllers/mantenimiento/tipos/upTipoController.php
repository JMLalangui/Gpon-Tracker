<?php 
include('../../../config.php');
$id = $_POST['id'];
$tipo = $_POST['tipo'];

$sql_tipos_update = $pdo->prepare("UPDATE gpon.tipo SET
tipo_ti= :tipo
WHERE id_ti= :id");

$sql_tipos_update->bindParam('id',$id);
$sql_tipos_update->bindParam('tipo', $tipo);
$sql_tipos_update->execute();

header('Location: '.$URL.'/view/mantenimiento/tipos/index.php');
?>