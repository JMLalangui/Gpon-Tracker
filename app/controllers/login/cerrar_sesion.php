<?php
include('../../config.php');

session_start(); // se inicia la session 

//se hace condicional para verificar que haya una session activa
if(isset($_SESSION['session_email'])){
    session_destroy(); //se destruye la session en caso de haber una abierta
    header('Location: '.$URL.'login/'); //se redirecciona al login
}


?>