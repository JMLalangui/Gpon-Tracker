<?php 
include('../../../config.php');
$tipo = $_POST['tipo'];

$sql_tipos_creation = $pdo->prepare("INSERT INTO gpon.tipo 
                                             (tipo_ti) 
                                             VALUES (:tipo);");

$sql_tipos_creation->bindParam('tipo',$tipo);
$sql_tipos_creation->execute();

header('Location: '.$URL.'/view/mantenimiento/tipos/index.php');
?>