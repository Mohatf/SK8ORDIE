<?php 

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

$idUsuario=$_POST['idUsuario'];

$buscarUsuario=buscarUsuarioID($conexion, $idUsuario);
$usuario= mysqli_fetch_assoc($buscarUsuario);

echo '<img  src="data:image/jpeg;base64,'.base64_encode($usuario['FotoPerfil']).'" height="100%" width="100%"/>';


?>