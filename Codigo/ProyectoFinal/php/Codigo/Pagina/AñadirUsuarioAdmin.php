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
$password = $_POST['password'];
$conexion=conectar(true);

//Iniciamos la sesión

session_start();

$existeUsuario = validarUsuario($conexion, $usuario); 
$existeDni = comprobarDni($conexion, $dni); 
$existeEmail = comprobarEmail($conexion, $email); 




if(mysqli_num_rows($existeUsuario)!=0){
 echo "UsuarioExistente";
} else if(mysqli_num_rows($existeDni)!=0){

  echo "DniExistente";
} else if(mysqli_num_rows($existeEmail)!=0){
    
  echo "EmailExistente";
} else {
  
  registroSinFoto($conexion, $nombre, $usuario, $password, $primerapellido, $segundoapellido, $dni, $email, $telefono);
   
    $ultimoId = mysqli_insert_id($conexion);

    $idCarrito = $ultimoId;
    $idUsuarios = $ultimoId;
    
    crearCarrito($conexion, $idCarrito, $idUsuarios);
  
  }

  

 



?>