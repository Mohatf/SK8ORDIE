<?php
function listarProductos($conexion){

    $consulta = "SELECT * FROM productos";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
function listarProductosSegunCategoria($conexion, $categoria){

    $consulta = "SELECT * FROM tiendaskate.productos where idCategoriaFK='$categoria';";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function listarProductoId($conexion, $idProducto){

    $consulta = "SELECT * FROM productos where idProductos ='$idProducto'";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
function comprobarNombreProducto($conexion, $nombreProducto){

    $consulta = "SELECT * FROM productos where NombreProducto ='$nombreProducto'";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
function buscarProductos($conexion,$variableBusqueda, $categoria){

    $consulta = "SELECT * FROM tiendaskate.productos where idCategoriaFK='$categoria' and NombreProducto like '%$variableBusqueda%'";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function filtrarPrecioProductos($conexion, $valor1,$valor2,$categoria){

    $consulta = "SELECT * FROM tiendaskate.productos where idCategoriaFK='$categoria' and Precio BETWEEN '$valor1' and '$valor2';";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
function buscarProductosAdmin($conexion,$variableBusqueda){

    $consulta = "SELECT * FROM productos where idProductos like '%$variableBusqueda%' 
    or NombreProducto like '%$variableBusqueda%'
    or Precio like '%$variableBusqueda%'
    or Descripcion like '%$variableBusqueda%'
    or NombreCategoria like '%$variableBusqueda%'";

    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function filtrarProductos($conexion, $categoria){

    $consulta = "SELECT * FROM productos WHERE idCategoriaFK='$categoria'";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
function eliminarProducto($conexion, $idProducto){

    $consulta = "DELETE FROM productos WHERE idProductos = '$idProducto'";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function addProducto($conexion,$nombreProducto,$precioProducto,$descripcionProducto,$stockProducto,$categoriaProducto,$idCategoria,$imagenProducto){

    $consulta = "INSERT INTO productos (`NombreProducto`, `Stock`, `Precio`,`Descripcion`, `Imagen`,`idCategoriaFK`, `NombreCategoria`) VALUES ('$nombreProducto', '$stockProducto', '$precioProducto','$descripcionProducto', '$imagenProducto','$idCategoria', '$categoriaProducto');";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
function editarProductoSinImagen($conexion,$nombreProducto,$precioProducto,$descripcionProducto,$stockProducto,$categoriaProducto,$idCategoria,$idProducto){

    $consulta = "UPDATE `tiendaskate`.`productos` SET `NombreProducto` = '$nombreProducto', `Stock` = '$stockProducto', `Precio` = '$precioProducto', `Descripcion` = '$descripcionProducto', `idCategoriaFK` = '$idCategoria', `NombreCategoria` = '$categoriaProducto' WHERE (`idProductos` = '$idProducto');";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
function editarProductoConImagen($conexion,$nombreProducto,$precioProducto,$descripcionProducto,$stockProducto,$categoriaProducto,$idCategoria, $imagenProducto,$idProducto){

    $consulta = "UPDATE `tiendaskate`.`productos` SET `NombreProducto` = '$nombreProducto', `Stock` = '$stockProducto', `Precio` = '$precioProducto', `Descripcion` = '$descripcionProducto', `idCategoriaFK` = '$idCategoria', `NombreCategoria` = '$categoriaProducto', `Imagen`='$imagenProducto' WHERE (`idProductos` = '$idProducto');";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function buscarProductosCarrito($conexion, $idProducto,$idCarrito){

    $consulta = "SELECT * FROM tiendaskate.productoscarrito where idProductos_TP='$idProducto' and idCarrito_TC='$idCarrito'";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function actualizarCantidadProductosEnElCarrito($conexion, $idItem, $cantidadP){
    $consulta = "UPDATE productoscarrito SET Cantidad = '$cantidadP'+1 WHERE (idProductosCarrito = '$idItem');";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function addProductosAlCarrito($conexion,$cantidad, $precio, $idCarrito, $idProducto){
    $consulta = "INSERT INTO `tiendaskate`.`productoscarrito` (`Cantidad`, `PrecioProducto`, `idCarrito_TC`, `idProductos_TP`) VALUES ('$cantidad', '$precio', '$idCarrito', '$idProducto');";
    $resultado= mysqli_query($conexion,$consulta);
    return $resultado;
}
function sumarPrecioTotalCarrito($conexion,$idCarrito){

    $consulta = "SELECT SUM(PrecioProducto*Cantidad)FROM tiendaskate.productoscarrito where idCarrito_TC='$idCarrito' ";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function insertarPrecioTotalCarrito($conexion,$idCarrito,$idUsuario, $precioTotal){

    $consulta = "UPDATE `tiendaskate`.`carrito` SET `PrecioTotal` = '$precioTotal' WHERE `idCarrito` = '$idCarrito' and idUsuarios='$idUsuario'";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
function insertarPrecioTotalCarritoPagoFinal($conexion,$idCarrito){

    $consulta = "UPDATE `tiendaskate`.`carrito` SET `PrecioTotal` = '0.00' WHERE `idCarrito` = '$idCarrito'";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function sumarCantidadProductosCarrito($conexion,$idCarrito){

    $consulta = "SELECT SUM(Cantidad)FROM tiendaskate.productoscarrito where idCarrito_TC='$idCarrito' ";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
function mostrarProductosCarrito($conexion,$idCarrito){

    $consulta = "SELECT * FROM productoscarrito where idCarrito_TC='$idCarrito'";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
function mostrarNombreProductosCarrito($conexion,$idProducto){

    $consulta = "SELECT * FROM productos where idProductos='$idProducto'";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function eliminarProductoCarrito($conexion,$idProducto){

    $consulta = "DELETE FROM productoscarrito where idProductosCarrito='$idProducto'";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
function eliminarUnProductoCarrito($conexion, $idProducto,$cantidad){

    $consulta = "update tiendaskate.productoscarrito set `Cantidad`='$cantidad' where idProductosCarrito='$idProducto'";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
function addUnProductoCarrito($conexion, $idProducto,$cantidad){

    $consulta = "update tiendaskate.productoscarrito set `Cantidad`='$cantidad' where idProductosCarrito='$idProducto'";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function vaciarCarrito($conexion, $idCarrito){

    $consulta = "DELETE FROM `tiendaskate`.`productoscarrito` WHERE (`idCarrito_TC` = '$idCarrito');";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
function mostrarPrecioTotalCarrito($conexion, $idCarrito){

    $consulta = "SELECT * FROM tiendaskate.carrito where idCarrito='$idCarrito';";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
function buscarProductosRandom($conexion){
    $consulta = "SELECT DISTINCT * FROM productos 
    where idCategoriaFK='1' 
    or idCategoriaFK='2'  
    or idCategoriaFK='5'
    or idCategoriaFK='6'
    or idCategoriaFK='9'
    order by rand() Limit 6;";
    $resultado= mysqli_query($conexion,$consulta);
    return $resultado;
}
function buscarProductosRandomEjes($conexion){
    $consulta = "SELECT DISTINCT * FROM productos 
    where idCategoriaFK='3' 
    or idCategoriaFK='7'  
    order by rand() Limit 6;";
    $resultado= mysqli_query($conexion,$consulta);
    return $resultado;
}
function buscarProductosRandomRuedas($conexion){
    $consulta = "SELECT DISTINCT * FROM productos 
    where idCategoriaFK='4' 
    or idCategoriaFK='8'  
    order by rand() Limit 6;";
    $resultado= mysqli_query($conexion,$consulta);
    return $resultado;
}

function obtenerPrecioTotalCarrito($conexion, $idUsuario){

    $consulta = "SELECT * FROM carrito where idUsuarios='$idUsuario'";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
function restarStockProducto($conexion, $idProducto, $cantidad){

    $consulta = "UPDATE `tiendaskate`.`productos` SET `Stock` = Stock-'$cantidad' WHERE (`idProductos` = '$idProducto');";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
function pagoFinalListaProductosCarrito($conexion){

    $consulta = "SELECT * from productos inner join productoscarrito where productos.idProductos = productoscarrito.idProductos_TP;";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}




?>