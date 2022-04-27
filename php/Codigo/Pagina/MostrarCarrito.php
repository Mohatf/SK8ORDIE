<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOProductos.php';

$conexion = conectar(true);
session_start();
$idCarrito=$_SESSION['idUsuarios'];

$listarCarrito=mostrarProductosCarrito($conexion,$idCarrito);


$json= array();
while($productos=mysqli_fetch_array($listarCarrito)){
    $mostrarDetallesProducto=mysqli_fetch_assoc(mostrarNombreProductosCarrito($conexion,$productos['idProductos_TP']));
    $json[] = array(
        'id' => $productos['idProductosCarrito'],
        'nombreProducto' => $mostrarDetallesProducto['NombreProducto'],
        'cantidad' => $productos['Cantidad'],
        'stock' => $mostrarDetallesProducto['Stock'],
        'precio' => $productos['PrecioProducto'],
        'nombreCategoria' => $mostrarDetallesProducto['NombreCategoria'],

    );
}
$jasonstring= json_encode($json);
echo $jasonstring;
?>