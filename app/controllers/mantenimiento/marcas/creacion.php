<?php 
include('../../../config.php');
$marca = $_POST['marca'];

$sql_marcas_creation = $pdo->prepare("INSERT INTO gpon.marca 
                                             (marca_mar) 
                                             VALUES (:marca);");

$sql_marcas_creation->bindParam('marca',$marca);
$sql_marcas_creation->execute();

header('Location: '.$URL.'/view/mantenimiento/marcas/index.php');
?>