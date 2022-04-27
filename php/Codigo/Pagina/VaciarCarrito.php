<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOProductos.php';

$conexion = conectar(true);
session_start();
$idCarrito=$_SESSION['idUsuarios'];
$idUsuario=$_SESSION['idUsuarios'];

$idCarrito=$_SESSION['idUsuarios'];
$comprobarProductosCarrito= mostrarProductosCarrito($conexion,$idCarrito);
if(mysqli_num_rows($comprobarProductosCarrito)==0){
    echo "Vacio";
}else{
    
    vaciarCarrito($conexion, $idCarrito);
    $precioTotal=0;
    insertarPrecioTotalCarrito($conexion,$idCarrito,$idUsuario, $precioTotal);
    echo "0";
}


?>