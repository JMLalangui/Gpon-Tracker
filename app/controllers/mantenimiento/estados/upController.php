<?php
//Controlador para obtener la informacion que existe en la tabla de marcas 
//el id se obtiene de la plantilla index al seleccionar el boton ver

$idEstadoGet = $_GET['id'];
$sql_estados = "SELECT * FROM gpon.estado WHERE id_est = '$idEstadoGet'";
$query_estados = $pdo->prepare($sql_estados);
$query_estados->execute();
$bd_estados = $query_estados->fetchAll(PDO::FETCH_ASSOC);

foreach($bd_estados as $bd_id){
    $estados_show = $bd_id['estado_est'];
}
?>