<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOProductos.php';

$conexion = conectar(true);
session_start();
$idCarrito=$_SESSION['idUsuarios'];
$idUsuario=$_SESSION['idUsuarios'];

$idProducto=$_POST['idProducto'];
$stock=$_POST['stock'];
$comprobarCantidad=$_POST['cantidad'];
$cantidad=$_POST['cantidad']-1;

if($comprobarCantidad==1){
echo "Error";
}else{
    eliminarUnProductoCarrito($conexion, $idProducto,$cantidad);
    $calcularPrecioTotal=mysqli_fetch_assoc(sumarPrecioTotalCarrito($conexion,$idCarrito));
    $precioTotal=$calcularPrecioTotal['SUM(PrecioProducto*Cantidad)'];
    insertarPrecioTotalCarrito($conexion,$idCarrito,$idUsuario, $precioTotal);
}






?>