<?php
session_start();
if (isset($_SESSION['session_email'])) {
    $email_sesion = $_SESSION['session_email'];

    // Preparar y ejecutar la consulta de forma segura
    $sql = "SELECT nombres FROM gpon.users WHERE email = :email";
    $query = $pdo->prepare($sql);
    $query->bindParam(':email', $email_sesion, PDO::PARAM_STR);
    $query->execute();

    // Obtener el resultado
    $usuario = $query->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        $nombres_session = $usuario['nombres'];
    } else {
        // Si el email no existe en la BD, destruir la sesión y redirigir
        session_destroy();
        header('Location: ' . $URL . 'login/');
        exit();
    }
} else {
    // Si no hay sesión iniciada, redirigir al login
    header('Location: ' . $URL . 'login/');
    exit();
}
?>