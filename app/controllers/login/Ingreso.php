<?php
// CONTROLADOR PARA VALIDACIÓN DE ACCESO (LOGIN)

// Incluir archivo de configuración
include('../../config.php');

// Recibir valores del formulario
$email = trim($_POST['email']);
$password_user = $_POST['password_user'];

session_start(); // Iniciar sesión antes de usar $_SESSION

// Preparación de consulta segura con parámetros
$sql = "SELECT email, password_user FROM gpon.users WHERE email = :email LIMIT 1";
$query = $pdo->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
$usuario = $query->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($password_user, $usuario['password_user'])) {
    // Regenerar la sesión para evitar ataques de session fixation
    session_regenerate_id(true);
    
    $_SESSION['session_email'] = $email;
    header('Location: ' . $URL . 'index.php');
    exit();
} else {
    $_SESSION['mensaje_error_ingreso'] = "Datos incorrectos";
    header('Location: ' . $URL . 'login/');
    exit();
}
?>