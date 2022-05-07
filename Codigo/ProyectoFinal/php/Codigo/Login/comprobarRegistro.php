<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion=conectar(true);
session_start();

echo $usuario = $_POST['usuario'];
echo $nombre = $_POST['nombre'];
echo $primerapellido  = $_POST['primerapellido'];
echo $segundoapellido = $_POST['segundoapellido'];
echo $dni = $_POST['dni'];
echo $email = $_POST['email'];
$telefono = $_POST['telefono'];
// $fotoPerfil=addslashes(file_get_contents($_FILES['fotoPerfil']['tmp_name']));
echo $password = $_POST['password'];
echo $repetirpassword = $_POST['repetirpassword'];







      


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