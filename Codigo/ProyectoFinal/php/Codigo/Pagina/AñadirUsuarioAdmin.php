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
$fotoperfil=imagenDefault($conexion);
$foto=mysqli_fetch_assoc($fotoperfil);
$imagenDef=$foto['imagenDefault'];

$conexion=conectar(true);

//Iniciamos la sesión

session_start();

$existeUsuario = validarUsuario($conexion, $usuario); 
$existeDni = comprobarDni($conexion, $dni); 
$existeEmail = comprobarEmail($conexion, $email); 




if(mysqli_num_rows($existeUsuario)!=0){
 
} else if(mysqli_num_rows($existeDni)!=0){


} else if(mysqli_num_rows($existeEmail)!=0){
    
   
} else {
  
      registroSinFoto($conexion, $nombre, $usuario, $password, $primerapellido, $segundoapellido, $dni, $email, $telefono,$imagenDef);
   
    $ultimoId = mysqli_insert_id($conexion);

    $idCarrito = $ultimoId;
    $idUsuarios = $ultimoId;
    
    crearCarrito($conexion, $idCarrito, $idUsuarios);
    
  
  }

  

 



?>