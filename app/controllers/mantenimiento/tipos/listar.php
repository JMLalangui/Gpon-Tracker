<?php 
    $sql_tipos = "SELECT id_ti, tipo_ti FROM gpon.tipo ORDER BY id_ti ASC;";
    $query_tipos = $pdo->prepare($sql_tipos);
    $query_tipos->execute();
    $bd_tipos = $query_tipos->fetchAll(PDO::FETCH_ASSOC);
?>