<?php
//CONTROLADOR PARA VALIDACION DE ACCESO (LOGIN)
//------------------------------------------------------------------------------------------//

//incluimos el archivo de consiguracion para traer a la conexion de la base de datos
include('../../config.php');


//recibimos el valor de las variables ingresadas en el formulario de login
$email = $_POST['email'];
$password_user = $_POST['password_user'];
$contador = 0;

//preparacion de consulta y ejecucion 
$sql = "SELECT * FROM gpon.users WHERE email = '$email'";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($usuarios as $usuario){
    $contador = $contador+1;
    $email_tabla = $usuario['email'];
    $password_user_tabla = $usuario['password_user'];
}

if(!($contador == 0)&& (password_verify($password_user,$password_user_tabla))){
    session_start();
    $_SESSION['session_email'] = $email;
    header('Location: '.$URL.'index.php');

}else{
    session_start();
    $_SESSION['mensaje_error_ingreso'] = "Datos incorrectos";
    header('Location:'.$URL.'login/');
}
?>