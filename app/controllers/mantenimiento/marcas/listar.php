<?php 
    $sql_marcas = "SELECT id_mar, marca_mar FROM gpon.marca ORDER BY id_mar ASC;";
    $query_marcas = $pdo->prepare($sql_marcas);
    $query_marcas->execute();
    $bd_marcas = $query_marcas->fetchAll(PDO::FETCH_ASSOC);
?>