<?php 

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

session_start();

$buscarUsuario=buscarUsuarioID($conexion, $_SESSION['idUsuarios']);
$usuario= mysqli_fetch_assoc($buscarUsuario);

echo $usuario['PrimerApellido'];


?>