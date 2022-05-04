<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';


$usuario = $_POST['usuario'];
$password = $_POST['password'];

echo $usuario;
echo $password;
  //Nos conectamos a la BD de AWS

//   $conexion=conectar(true);

//   //Iniciamos la sesión

//   session_start();

//   //Comprobamos si el usuario y la contraseña existen

//   $comprobarDatos= consultaLogin($conexion,$usuario,$password);

//   // Si existe

//   if(mysqli_num_rows($comprobarDatos)!=0){
//       $fila=mysqli_fetch_assoc($comprobarDatos);
//       //Y ambos datos coinciden, iniciamos sesión
//       crearSesion($fila);

//       header('Location: ../Pagina/home.php');

//   }
//   else{

//       //Si no existe 

//       $comprobarUsuario= validarUsuario($conexion, $usuario);
//       if(mysqli_num_rows($comprobarUsuario)!=0){
//           // Comprobamos si el usuario existe, y la contraseña está mal, se le indicará que la contraseña es incorrecta
//           header('Location: login.php?error=ContraseñaIncorrecta');

//       }else{
//           // Si no existe el usuario ni la contraseña, se le indicará que el usuario no existe
//           header('Location: login.php?error=usuarioNoEncontrado');
//       }

//   }

?>

