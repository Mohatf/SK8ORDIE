<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

$idUsuario=$_POST['idUsuario'];
eliminarUsuario($conexion, $idUsuario);

?>