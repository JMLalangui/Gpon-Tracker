<?php 
require_once("conexion.php");
if($API->connect($ip,$username,$password)){
    $getinterfaces=$API->comm("/interface/print");
    $totalreg=count($getinterfaces);
    $response[]=array();
    for($i=0; $i<$totalreg; $i++){
        $interface = $getinterfaces[$i];
        $response[]= $interface;
    }
    print json_encode($response);
}else{
    print "error";
}
?>