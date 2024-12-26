<?php
//Controlador para obtener la informacion que existe en la tabla de nodos 
//el id se obtiene de la plantilla index al seleccionar el boton ver

$idNodoGet = $_GET['id'];
$sql_nodos = "SELECT * FROM gpon.nodo WHERE id_nod = '$idNodoGet'";
$query_nodos = $pdo->prepare($sql_nodos);
$query_nodos->execute();
$bd_nodos = $query_nodos->fetchAll(PDO::FETCH_ASSOC);

foreach($bd_nodos as $bd_id ){
    $nombres_show = $bd_id['nombre_nod'];
    $direccion_show = $bd_id['direccion_nod'];
    $coordenada_show = $bd_id['coordenada_nod'];
    $referencia_uno_show = $bd_id['nombre_referencia_uno_nod'];
    $contacto_uno_show = $bd_id['numero_referencia_uno_nod'];
    $referencia_dos_show = $bd_id['nombre_referencia_dos_nod'];
    $contacto_dos_show = $bd_id['numero_referencia_dos_nod'];
}
?>