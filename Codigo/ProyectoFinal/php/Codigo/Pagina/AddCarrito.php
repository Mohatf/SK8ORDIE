<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';
require '../../DAOS/DAOProductos.php';
$conexion = conectar(true);
session_start();  


if($_SESSION['usuarioConectado']==false){
    echo "No conectao";
      
}elseif($_SESSION['usuarioConectado']){
    $idProducto=$_POST['idProducto'];
    $precio= $_POST['precio'];
    $cantidad=1;
    $stock= $_POST['stock'];
    $idCarrito=$_SESSION['idUsuarios'];
    $idUsuario=$_SESSION['idUsuarios'];

    $comprobarProducto=buscarProductosCarrito($conexion, $idProducto,$idCarrito);
    $productoCarrito=mysqli_fetch_assoc($comprobarProducto);
 
    if($productoCarrito['Cantidad']>=$stock){
        echo "CantidadExcedida";
    }
    elseif($stock==0){
      echo "SinStock";
    }else{
        //COMPROBAMOS SI EL PRODUCTO YA EXISTE EN EL CARRITO 
        if(mysqli_num_rows($comprobarProducto)!=0 ){
      
          $idItem=$productoCarrito['idProductosCarrito'];
          $cantidadP=$productoCarrito['Cantidad'];
          $actualizar=actualizarCantidadProductosEnElCarrito($conexion, $idItem, $cantidadP);
          $calcularPrecioTotal=mysqli_fetch_assoc(sumarPrecioTotalCarrito($conexion,$idCarrito));
          $precioTotal=$calcularPrecioTotal['SUM(PrecioProducto*Cantidad)'];
          insertarPrecioTotalCarrito($conexion,$idCarrito,$idUsuario, $precioTotal);
          
        }
        else{
          $añadirProductosAlCarrito= addProductosAlCarrito($conexion,$cantidad, $precio, $idCarrito, $idProducto);
            $calcularPrecioTotal=mysqli_fetch_assoc(sumarPrecioTotalCarrito($conexion,$idCarrito));
            $precioTotal=$calcularPrecioTotal['SUM(PrecioProducto*Cantidad)'];

            insertarPrecioTotalCarrito($conexion,$idCarrito,$idUsuario, $precioTotal);
        }

        
        
    } 
}

?>