<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOProductos.php';

$conexion = conectar(true);
session_start();
$idCarrito=$_SESSION['idUsuarios'];
$idProducto=$_POST['idProducto'];
eliminarProducto($conexion, $idProducto,$idCarrito)

?>