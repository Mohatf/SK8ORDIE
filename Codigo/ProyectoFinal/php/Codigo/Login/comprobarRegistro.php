<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion=conectar(true);
session_start();

$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$primerapellido  = $_POST['primerapellido'];
$segundoapellido = $_POST['segundoapellido'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

$password = $_POST['password'];

if($fotoPerfil=addslashes(file_get_contents($_FILES['fotoPerfil']['tmp_name']))==NULL){
  echo "No hay nada";
}else{
  echo "Hay Algo";
}








      


// $existeUsuario = validarUsuario($conexion, $usuario); 
// $existeDni = comprobarDni($conexion, $dni); 
// $existeEmail = comprobarEmail($conexion, $email); 




// if(mysqli_num_rows($existeUsuario)!=0){
 
//     header ('Location: registro.php?error=usuarioExiste');
//     } else if(mysqli_num_rows($existeDni)!=0){
    
//       header ('Location: registro.php?error=dniExiste');
//     } else if(mysqli_num_rows($existeEmail)!=0){
    
//     header ('Location: registro.php?error=emailExiste');
//   } else {
//     if($fotoperfil==null){
//       registroSinFoto($conexion, $nombre, $usuario, $password, $primerapellido, $segundoapellido, $dni, $email, $telefono);
//     } else{
//       registro($conexion, $nombre, $usuario, $password, $primerapellido, $segundoapellido, $dni, $email, $telefono, $fotoperfil);
//     }
//     $ultimoId = mysqli_insert_id($conexion);

//     $idCarrito = $ultimoId;
//     $idUsuarios = $ultimoId;
    
//     crearCarrito($conexion, $idCarrito, $idUsuarios);
    
//     header ("Location: ../Pagina/home.php?user=$idUsuarios");
  
//   }

 







?>