<?php 
include('../../../config.php');
$estado = $_POST['estado'];

$sql_marcas_creation = $pdo->prepare("INSERT INTO gpon.estado 
                                             (estado_est) 
                                             VALUES (:estado);");

$sql_marcas_creation->bindParam('estado',$estado);
$sql_marcas_creation->execute();

header('Location: '.$URL.'/view/mantenimiento/estados/index.php');
?>