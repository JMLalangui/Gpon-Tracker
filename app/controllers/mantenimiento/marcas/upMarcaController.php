<?php 
include('../../../config.php');
$id = $_POST['id'];
$marca = $_POST['marca'];

$sql_marcas_update = $pdo->prepare("UPDATE gpon.marca SET
marca_mar= :marca
WHERE id_mar= :id");

$sql_marcas_update->bindParam('id',$id);
$sql_marcas_update->bindParam('marca', $marca);
$sql_marcas_update->execute();

header('Location: '.$URL.'/view/mantenimiento/marcas/index.php');
?>