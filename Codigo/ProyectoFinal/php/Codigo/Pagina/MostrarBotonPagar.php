<?php
require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOProductos.php';
$conexion =conectar(true);
session_start();
$idCarrito=$_SESSION['idUsuarios'];

$calcularPrecioTotal=mysqli_fetch_assoc(sumarPrecioTotalCarrito($conexion,$idCarrito));


echo number_format(doubleval($calcularPrecioTotal['SUM(PrecioProducto*Cantidad)']),2);

?>