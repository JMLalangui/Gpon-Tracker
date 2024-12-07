<?php 

$idUsuarioGet = $_GET['id'];
$sql_users = "SELECT * FROM gpon.users where id = '$idUsuarioGet'";
$query_users = $pdo->prepare($sql_users);
$query_users->execute();
$bd_users = $query_users->fetchAll(PDO::FETCH_ASSOC);

foreach($bd_users as $bd_id){
    $nombres_show       = $bd_id['nombres'];
    $email_show         = $bd_id['email'];
    $fechaCreacion_show         = $bd_id['fh_creacion'];
    $fechaActulizacion_show         = $bd_id['fh_actualizacion'];
}
?>