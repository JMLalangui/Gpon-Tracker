<?php
include ('../../config.php');
$nombres = $_POST['nombres'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$password_user = $_POST['password_user'];
$password_user_verificacion = $_POST['password_user_verificacion'];

//COMPARACION DE CONTRASEÑAS
if($password_user == $password_user_verificacion){
    //ENCRIPTACION DE PASSWORD
    $password_user = password_hash($password_user, PASSWORD_DEFAULT);

    //SQL GUARDADO DE INFORMACION
    $sql_users_creation =$pdo->prepare( "INSERT INTO gpon.users 
    (nombres, email, telefono, password_user, fh_creacion) 
    VALUES (:nombres, :email, :telefono, :password_user, :fh_creacion);");

    $sql_users_creation->bindParam('nombres',$nombres);
    $sql_users_creation->bindParam('email',$email);
    $sql_users_creation->bindParam('telefono', $telefono);
    $sql_users_creation->bindParam('password_user',$password_user);
    $sql_users_creation->bindParam('fh_creacion',$fechaHora);
    $sql_users_creation->execute();

    session_start();
    $_SESSION['mensaje_registro_ok'] = "Registro Exitoso";
    header('Location: '.$URL.'/view/mantenimiento/usuarios/index.php');

}else{
    session_start();
    $_SESSION['mensaje_contraseñas'] = "Error las contraseñas no son iguales";
    header('Location: '.$URL.'/view/mantenimiento/usuarios/create.php');
}








?>