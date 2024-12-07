<?php 
$ip="192.168.10.129";
$username="admin";
$password="*5imantec%";
$puerto="8728";

include_once('routeros_api.class.php');
$API = new RouterosAPI();
$API->debug=false;
$API->port=$puerto;


?>