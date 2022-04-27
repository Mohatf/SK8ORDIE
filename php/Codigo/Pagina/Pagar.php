<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOProductos.php';
require '../../DAOS/DAOUsuario.php';
$conexion = conectar(true);
session_start();
$idUsuario= $_SESSION['idUsuarios'];
$buscarEnCarrito= mysqli_fetch_assoc(obtenerPrecioTotalCarrito($conexion, $idUsuario));
$precioTotal= $buscarEnCarrito['PrecioTotal'];
$direccion= $_POST['direccion'];
$codPost= $_POST['codPost'];
$ciudad= $_POST['ciudad'];
$provincia= $_POST['provincia'];
$comAuto= $_POST['comAuto'];

$registrarDireccion=registrarDireccionDeEnvio($conexion, $idUsuario, $direccion, $comAuto, $provincia, $ciudad, $codPost);

$idCarrito=$_SESSION['idUsuarios'];

$listarProductos=pagoFinalListaProductosCarrito($conexion);

while($productos=mysqli_fetch_array($listarProductos)){
    
    if($productos['Cantidad'] > $productos['Stock']){
        header('Location: Carrito.php?error=01x32');
    }else{
        restarStockProducto($conexion, $productos['idProductos_TP'], $productos['Cantidad']);
    }
  
    
}

header('Location: PagoFinalizado.php');







?>