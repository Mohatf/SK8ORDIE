
<?php

// En este documento comprobaremos los datos introducidos en la pestaña recuperarContraseña para comprobar que los datos coinciden con el usuario


require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';
require '../../DAOS/Config.php';
//Nos conectamos a la BD de AWS

$conexion=conectar(true);


$usuario = $_POST['usuario'];
$email = $_POST['email'];
$dni = $_POST['dni'];


use PHPMailer\PHPMailer\PHPMailer;
$validarUsuario = validarUsuario($conexion, $usuario);
$validarEmail = validarEmail($conexion, $email, $usuario);
$validarDni = validarDni($conexion, $dni, $usuario);

if(mysqli_num_rows($validarUsuario)==0){
    header ('Location: recuperarContraseña.php?error=usuarioNoEncontrado');
    
}else if(mysqli_num_rows($validarEmail)==0){
    header ('Location: recuperarContraseña.php?error=emailIncorrecto');
}else if(mysqli_num_rows($validarDni)==0){
    header ('Location: recuperarContraseña.php?error=dniIncorrecto');
}else{
    // SI EXISTEN SE ENVIA EL EMAIL
    $NomUsuario = openssl_encrypt($_POST['usuario'],COD,KEY);
    $name = "SK8 OR DIE";
    $subject = "Recuperar contraseña SK8 OR DIE";
    $texto= "aquí";
    $url="http://localhost/ProyectoFinal/php/Codigo/Login/nuevaPassword.php?user=$NomUsuario";
    $body ="Pulsa "."<a href='$url'>$texto</a>"." para cambiar tu contraseña.";

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";
    $subject = utf8_decode($subject);
    $body = utf8_decode($body);
    $mail = new PHPMailer();

    // CONFIGURACION SMTP 
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "sk8ordie7983@gmail.com";
    $mail->Password = 'gragrgjrzqdxghgt';
    $mail->Port = 465; //587
    $mail->SMTPSecure = "ssl"; //tls

    //CONFIGURACION EMAIL
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->Body = $body;

    if ($mail->send()) {
        header('Location: login.php?accion=emailEnviado');
    } else {

    
    }
}

?>

