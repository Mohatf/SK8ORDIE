<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOProductos.php';

$conexion = conectar(true);
session_start();
$idCarrito=$_SESSION['idUsuarios'];
$idUsuario=$_SESSION['idUsuarios'];
$idProducto=$_POST['idProducto'];
eliminarProductoCarrito($conexion, $idProducto);
$calcularPrecioTotal=mysqli_fetch_assoc(sumarPrecioTotalCarrito($conexion,$idCarrito));
$precioTotal=$calcularPrecioTotal['SUM(PrecioProducto*Cantidad)'];
insertarPrecioTotalCarrito($conexion,$idCarrito,$idUsuario, $precioTotal);


?>