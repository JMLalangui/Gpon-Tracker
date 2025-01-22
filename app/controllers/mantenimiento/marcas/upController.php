<?php
//Controlador para obtener la informacion que existe en la tabla de marcas 
//el id se obtiene de la plantilla index al seleccionar el boton ver

$idMarcaGet = $_GET['id'];
$sql_marcas = "SELECT * FROM gpon.marca WHERE id_mar = '$idMarcaGet'";
$query_marcas = $pdo->prepare($sql_marcas);
$query_marcas->execute();
$bd_marcas = $query_marcas->fetchAll(PDO::FETCH_ASSOC);

foreach($bd_marcas as $bd_id ){
    $marca_show = $bd_id['marca_mar'];
}
?>