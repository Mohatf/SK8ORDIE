<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';
require '../../DAOS/DAOProductos.php';

$conexion = conectar(true);

$idUsuario=$_POST['idUsuario'];
$idCarrito=$_POST['idUsuario'];
vaciarCarrito($conexion, $idCarrito);
eliminarCarrito($conexion, $idCarrito);
eliminarUsuario($conexion, $idUsuario);


?>