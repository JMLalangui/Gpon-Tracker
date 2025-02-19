<?php 
    $sql_equipos = "SELECT equipo.id_eq, equipo.nombre_eq, equipo.modelo_eq, equipo.sn_eq, equipo.componentes_eq, equipo.observacion_eq, marca.marca_mar AS marcas, tipo.tipo_ti AS tipos, estado.estado_est AS estados, nodo.nombre_nod AS nodos
                    FROM gpon.equipo AS equipo
                    LEFT JOIN gpon.marca AS marca ON equipo.id_mar = marca.id_mar
                    LEFT JOIN gpon.tipo AS tipo ON equipo.id_ti = tipo.id_ti
                    LEFT JOIN gpon.estado AS estado ON equipo.id_est = estado.id_est
                    LEFT JOIN gpon.nodo AS nodo ON equipo.id_nod = nodo.id_nod
                    ORDER BY id_eq ASC;";
    $query_equipos = $pdo->prepare($sql_equipos);
    $query_equipos->execute();
    $bd_equipos = $query_equipos->fetchAll(PDO::FETCH_ASSOC);
?>