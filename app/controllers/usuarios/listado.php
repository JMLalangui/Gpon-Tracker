<?php 
    $sql_users = "SELECT id, nombres, email, telefono, fh_creacion, fh_actualizacion FROM gpon.users order by fh_creacion desc;";
    $query_users = $pdo->prepare($sql_users);
    $query_users->execute();
    $bd_users = $query_users->fetchAll(PDO::FETCH_ASSOC);

?>