<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';
$conexion=conectar(true);

$usuario= $_POST['usuario'];
$password= $_POST['password'];


$validarUsuario= validarUsuario($conexion, $usuario);

var_dump($validarUsuario);

// if(mysqli_num_rows($validarUsuario)!=0){
//     // SI EXISTE CAMBIAMOS LA CONTRASEÑA
//     $fila=mysqli_fetch_assoc($validarUsuario);
//     $idUsuario= $fila['idUsuarios'];
//     updatePassword($conexion,$idUsuario, $password);

//     header('Location: login.php?accion=passwordCambiada');

// }
// else{
//     //SI NO EXISTE HACEMOS UNA CONSULTA BUSCANDO AL USUARIO 
//     $validarUsuario2= validarUsuario($conexion, $usuario);
//     if(mysqli_num_rows($validarUsuario2)!=0){
//         // SI  EXISTE EL USUARIO ES QUE LA CONTRASEÑA ES INCORRETA  Y LE MANDAMOS UN ERROR
//     header('Location: nuevaPassword.php?error=ContraseñaIncorrecta');
    
//     }else{
//     // SI NO EXISTE EL USUARIO ES QUE EL USUARIO NO ESTA REGISTRADO Y LE MANDAMOS UN ERROR
//     header('Location: nuevaPassword.php?error=usuarioNoEncontrado');
//     }

// }


?>