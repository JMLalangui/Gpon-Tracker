<?php 
    $sql_olt = "SELECT ip.ip_ip AS ip, equipo.nombre_eq AS nombre, equipo.modelo_eq AS modelo, equipo.componentes_eq AS componentes, equipo.observacion_eq AS observacion, nodo.nombre_nod AS nombrenodo, nodo.direccion_nod AS direccion, nodo.coordenada_nod AS coordenada, nodo.nombre_referencia_uno_nod AS referencia, nodo.numero_referencia_uno_nod AS numero
                        FROM gpon.ip AS ip, gpon.equipo AS equipo, gpon.nodo AS nodo
                        WHERE ip.id_eq = equipo.id_eq AND equipo.id_nod = nodo.id_nod AND equipo.id_ti = 1;";
    $query_olt = $pdo->prepare($sql_olt);
    $query_olt->execute();
    $bd_olt = $query_olt->fetchAll(PDO::FETCH_ASSOC);

?>