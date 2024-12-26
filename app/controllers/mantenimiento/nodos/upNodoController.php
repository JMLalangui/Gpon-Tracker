<?php 
include('../../../config.php');
$id = $_POST['id'];
$nombres = $_POST['nombre'];
$direccion = $_POST['direccion'];
$coordenada = $_POST['coordenada'];
$referencia_uno = $_POST['referenciauno'];
$contacto_uno = $_POST['contactouno'];
$referencia_dos = $_POST['referenciados'];
$contacto_dos = $_POST['contactodos'];

$sql_nodos_update = $pdo->prepare("UPDATE gpon.nodo SET
nombre_nod= :nombre, direccion_nod= :direccion, coordenada_nod= :coordenada, nombre_referencia_uno_nod= :referenciauno, numero_referencia_uno_nod= :contactouno, nombre_referencia_dos_nod= :referenciados, numero_referencia_dos_nod= :contactodos
WHERE id_nod= :id");

$sql_nodos_update->bindParam('id',$id);
$sql_nodos_update->bindParam('nombre', $nombres);
$sql_nodos_update->bindParam('direccion', $direccion);
$sql_nodos_update->bindParam('coordenada', $coordenada);
$sql_nodos_update->bindParam('referenciauno', $referencia_uno);
$sql_nodos_update->bindParam('contactouno', $contacto_uno);
$sql_nodos_update->bindParam('referenciados', $referencia_dos);
$sql_nodos_update->bindParam('contactodos', $contacto_dos);
$sql_nodos_update->execute();

header('Location: '.$URL.'/view/mantenimiento/nodos/index.php');
?>