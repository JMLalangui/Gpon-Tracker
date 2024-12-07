<?php
include(__DIR__ . '/../../config.php');
include(__DIR__ . '/../olt/listarController.php');

// Token de tu bot de Telegram y Chat ID
$telegramToken = "7911182208:AAF1qwhowoBWONBePtXlYB_I96-osHxfiUU";
$chatId = "6477493260";  // Reemplaza <TU_CHAT_ID> con tu número de chat ID

// Función para enviar un mensaje a Telegram
function enviarAlertaTelegram($mensaje, $telegramToken, $chatId) {
    $url = "https://api.telegram.org/bot$telegramToken/sendMessage?chat_id=$chatId&text=" . urlencode($mensaje);
    file_get_contents($url);  // Usa file_get_contents para enviar el mensaje
}

// Función para enviar alertas a Telegram cada 5 minutos
function enviarAlertaTelegramPeriodicamente($bd_olt, $telegramToken, $chatId) {
    foreach ($bd_olt as $bd_ip) {
        $ip = $bd_ip['ip'];
        $nombre = $bd_ip['nombre'];
        $modelo = $bd_ip['modelo'];

        // Ejecutar el comando ping
        $ping = exec("ping -n 1 $ip", $output, $status);
        $resultado = $status;

        // Definir el color y el icono en función del resultado del ping
        if (substr($ping, -2) != 'ms') {
            $mensaje = "⚠️ Alerta: El dispositivo $nombre ($ip) no responde al ping. Modelo: $modelo.";
            enviarAlertaTelegram($mensaje, $telegramToken, $chatId);
        }
    }
}

// Llamar a la función que envía las alertas a Telegram
enviarAlertaTelegramPeriodicamente($bd_olt, $telegramToken, $chatId);

?>