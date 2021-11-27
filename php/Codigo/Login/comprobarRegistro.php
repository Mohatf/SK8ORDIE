<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';


$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$primerapellido  = $_POST['primerapellido'];
$segundoapellido = $_POST['segundoapellido'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$fotoperfil = addslashes(file_get_contents($_FILES['fotoperfil']['tmp_name']));
$password = $_POST['password'];
$repetirpassword = $_POST['repetirpassword'];
$captcha = $_POST['g-recaptcha-response'];

 //Nos conectamos a la BD de AWS

 $conexion=conectar(true);

 //Iniciamos la sesión

 session_start();

//hacer la consulta de buscar usuario y posteriormente registrarlo 


//Clave secreta que proporciona google para el captcha

$secret = '6LdsyhkcAAAAAKmUi0oUAzWzTngKGrIhdIemMcGF';

if(!$captcha){
  header ('Location: registro.php?error=captchaNoVerificado');
}

  //Enviamos la clave secreta a la pagina de captcha para comprobar la clave secreta
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
    $arr=json_decode($response, true);

    if($arr['success']){

      


$existeUsuario = validarUsuario($conexion, $usuario); 
$existeDni = comprobarDni($conexion, $dni); 
$existeEmail = comprobarEmail($conexion, $email); 




if(mysqli_num_rows($existeUsuario)!=0){
 
    header ('Location: registro.php?error=usuarioExiste');
    } else if(mysqli_num_rows($existeDni)!=0){
    
      header ('Location: registro.php?error=dniExiste');
    } else if(mysqli_num_rows($existeEmail)!=0){
    
    header ('Location: registro.php?error=emailExiste');
  } else {
    if($fotoperfil==null){
      registroSinFoto($conexion, $nombre, $usuario, $password, $primerapellido, $segundoapellido, $dni, $email, $telefono);
    } else{
      registro($conexion, $nombre, $usuario, $password, $primerapellido, $segundoapellido, $dni, $email, $telefono, $fotoperfil);
    }
    $ultimoId = mysqli_insert_id($conexion);

    $idCarrito = $ultimoId;
    $idUsuarios = $ultimoId;
    
    crearCarrito($conexion, $idCarrito, $idUsuarios);
    
    header ("Location: ../Pagina/home.php?user=$idUsuarios");
  
  }

    }else{
      header ("Location: registro.php?error=captchaMalVerificado");
    }

 







?>