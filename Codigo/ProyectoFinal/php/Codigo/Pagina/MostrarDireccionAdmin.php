<?php 

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

$idUsuario=$_GET['idUsuario'];

$buscarUsuario=buscarUsuarioID($conexion, $idUsuario);
$usuario= mysqli_fetch_assoc($buscarUsuario);

echo $usuario['Direccion'];


?>