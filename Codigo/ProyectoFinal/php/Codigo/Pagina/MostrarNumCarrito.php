<?php
require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOProductos.php';
$conexion = conectar(true);
session_start();
$idCarrito=$_SESSION['idUsuarios'];
if($_SESSION['usuarioConectado']==false){
    echo "No conectao";
      
}elseif($_SESSION['usuarioConectado']){
    $buscarProductos=mysqli_fetch_assoc(sumarCantidadProductosCarrito($conexion,$idCarrito));
    if($buscarProductos['SUM(Cantidad)']==0){
        echo "0";
    }else{

        echo $buscarProductos['SUM(Cantidad)'];
    }
}

?>