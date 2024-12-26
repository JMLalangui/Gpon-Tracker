<?php 
$idMarcaGet = $_GET['id'];
$sql_marcas = "SELECT * FROM gpon.marca WHERE id_mar = '$idMarcaGet'";
$query_marcas = $pdo->prepare($sql_marcas);
$query_marcas->execute();
$bd_marcas = $query_marcas->fetchAll(PDO::FETCH_ASSOC);

foreach($bd_marcas as $bd_id){
    $marcas_show = $bd_id['marca_mar'];
}
?>