<?php 

$idUsuarioGet = $_GET['id'];
$sql_users = "SELECT * FROM gpon.users where id = '$idUsuarioGet'";
$query_users = $pdo->prepare($sql_users);
$query_users->execute();
$bd_users = $query_users->fetchAll(PDO::FETCH_ASSOC);

foreach($bd_users as $bd_id){
    $nombres      = $bd_id['nombres'];
    $email         = $bd_id['email'];
}
?>