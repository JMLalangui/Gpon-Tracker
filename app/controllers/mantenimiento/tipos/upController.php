<?php
//Controlador para obtener la informacion que existe en la tabla de marcas 
//el id se obtiene de la plantilla index al seleccionar el boton ver

$idTipoGet = $_GET['id'];
$sql_tipos = "SELECT * FROM gpon.tipo WHERE id_ti = '$idTipoGet'";
$query_tipos = $pdo->prepare($sql_tipos);
$query_tipos->execute();
$bd_tipos = $query_tipos->fetchAll(PDO::FETCH_ASSOC);

foreach($bd_tipos as $bd_id){
    $tipos_show = $bd_id['tipo_ti'];
}
?>