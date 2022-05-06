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
$cantidad=$_POST['cantidad']+1;

if($comprobarCantidad>=$stock){
    echo "CantidadExcedida";
}else if($stock==0){
    echo "SinStock";
}else{
    addUnProductoCarrito($conexion, $idProducto,$cantidad);
    $calcularPrecioTotal=mysqli_fetch_assoc(sumarPrecioTotalCarrito($conexion,$idCarrito));
    $precioTotal=$calcularPrecioTotal['SUM(PrecioProducto*Cantidad)'];
    insertarPrecioTotalCarrito($conexion,$idCarrito,$idUsuario, $precioTotal);
}


?>