<?php 
    $sql_estados = "SELECT id_est, estado_est FROM gpon.estado ORDER BY id_est ASC;";
    $query_estados = $pdo->prepare($sql_estados);
    $query_estados->execute();
    $bd_estados = $query_estados->fetchAll(PDO::FETCH_ASSOC);
?>