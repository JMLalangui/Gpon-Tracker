<?php
session_start();
if(isset($_SESSION['session_email'])){
  $email_sesion = $_SESSION['session_email'];
  $sql = "SELECT nombres FROM gpon.users WHERE email = '$email_sesion'";
  $query = $pdo->prepare($sql);
  $query->execute();
  $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

  foreach($usuarios as $usuario){
      $nombres_session = $usuario['nombres'];
}
}else{
  header('Location: '.$URL.'login/');
}
?>