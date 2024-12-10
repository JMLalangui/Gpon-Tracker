<?php 
    $sql_nodos = "SELECT id_nod, nombre_nod, coordenada_nod, nombre_referencia_uno_nod, numero_referencia_uno_nod, nombre_referencia_dos_nod, numero_referencia_dos_nod FROM gpon.nodo ORDER BY nombre_nod ASC;";
    $query_nodos = $pdo->prepare($sql_nodos);
    $query_nodos->execute();
    $bd_nodos = $query_nodos->fetchAll(PDO::FETCH_ASSOC);

?>