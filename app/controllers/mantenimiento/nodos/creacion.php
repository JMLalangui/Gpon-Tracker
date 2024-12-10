<?php 
include('../../../config.php');
$nombres = $_POST['nombre'];
$direccion = $_POST['direccion'];
$coordenada = $_POST['coordenada'];
$referencia_uno = $_POST['referenciauno'];
$contacto_uno = $_POST['contactouno'];
$referencia_dos = $_POST['referenciados'];
$contacto_dos = $_POST['contactodos'];

$sql_nodos_creation = $pdo->prepare("INSERT INTO gpon.nodo 
(nombre_nod, direccion_nod, coordenada_nod, nombre_referencia_uno_nod, numero_referencia_uno_nod, nombre_referencia_dos_nod, numero_referencia_dos_nod) 
VALUES (:nombre, :direccion, :coordenada, :referenciauno, :contactouno, :referenciados, :contactodos);");

$sql_nodos_creation->bindParam('nombre', $nombres);
$sql_nodos_creation->bindParam('direccion', $direccion);
$sql_nodos_creation->bindParam('coordenada', $coordenada);
$sql_nodos_creation->bindParam('referenciauno', $referencia_uno);
$sql_nodos_creation->bindParam('contactouno', $contacto_uno);
$sql_nodos_creation->bindParam('referenciados', $referencia_dos);
$sql_nodos_creation->bindParam('contactodos', $contacto_dos);
$sql_nodos_creation->execute();

header('Location: '.$URL.'/view/mantenimiento/nodos/index.php');
?>