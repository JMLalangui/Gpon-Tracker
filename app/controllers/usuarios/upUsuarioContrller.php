<?php 
include ('../../config.php');
$id = $_POST['id'];
$nombres = $_POST['nombres'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$password_user = $_POST['password_user'];
$password_user_verificacion = $_POST['password_user_verificacion'];

if ($password_user == ""){
    if($password_user == $password_user_verificacion){
        //ENCRIPTACION DE PASSWORD
        $password_user = password_hash($password_user, PASSWORD_DEFAULT);

        //SQL GUARDADO DE INFORMACION
        $sql_users_creation =$pdo->prepare( "UPDATE gpon.users SET
        nombres= :nombres, email= :email, telefono= :telefono, fh_actualizacion= :fh_actualizacion
        WHERE id_nod = :id");

        $sql_users_creation->bindParam('id',$id);
        $sql_users_creation->bindParam('nombres',$nombres);
        $sql_users_creation->bindParam('email',$email);
        $sql_users_creation->bindParam('telefono',$telefono);
        $sql_users_creation->bindParam('fh_actualizacion',$fechaHora);
        $sql_users_creation->execute();

        session_start();
        $_SESSION['mensaje_contraseñas'] = "Informacion actualizada";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/view/mantenimiento/usuarios/');

}else{
        session_start();
        $_SESSION['mensaje_contraseñas'] = "Error las contraseñas no son iguales";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/view/mantenimiento/usuarios/update.php?id='.$id);
    }

}else{
    if($password_user == $password_user_verificacion){
            //ENCRIPTACION DE PASSWORD
            $password_user = password_hash($password_user, PASSWORD_DEFAULT);

            //SQL GUARDADO DE INFORMACION
            $sql_users_creation =$pdo->prepare( "UPDATE gpon.users SET
            nombres= :nombres, email= :email, telefono= :telefono, password_user= :password_user, fh_actualizacion= :fh_actualizacion
            WHERE id = :id");

            $sql_users_creation->bindParam('id',$id);
            $sql_users_creation->bindParam('nombres',$nombres);
            $sql_users_creation->bindParam('email',$email);
            $sql_users_creation->bindParam('telefono',$telefono);
            $sql_users_creation->bindParam('password_user',$password_user);
            $sql_users_creation->bindParam('fh_actualizacion',$fechaHora);
            $sql_users_creation->execute();

            session_start();
            $_SESSION['mensaje_contraseñas'] = "Informacion actualizada";
            $_SESSION['icono'] = "success";
            header('Location: '.$URL.'/view/mantenimiento/usuarios/');

    }else{
            session_start();
            $_SESSION['mensaje_contraseñas'] = "Error las contraseñas no son iguales";
            $_SESSION['icono'] = "error";
            header('Location: '.$URL.'/view/mantenimiento/usuarios/update.php?id='.$id);
        }
}
?>