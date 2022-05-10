<?php
require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOProductos.php';
require '../../DAOS/DAOCategorias.php';
$conexion = conectar(true);
$idProducto=$_GET['idProducto'];
$nombreProducto=$_POST['nombreProducto'];
$precioProducto=$_POST['precioProducto'];
$descripcionProducto=$_POST['descripcionProducto'];
$stockProducto=$_POST['stockProducto'];
$idCategoriaProducto=$_POST['categoriaProducto'];

$buscarCategoria=filtrarCategoria($conexion, $idCategoriaProducto);
$categorias=mysqli_fetch_assoc($buscarCategoria);
$categoriaProducto=$categorias['NombreCategoria'];
$idCategoria=$categorias['idCategoria'];


if($imagenProducto==NULL){
    editarProductoSinImagen($conexion,$nombreProducto,$precioProducto,$descripcionProducto,$stockProducto,$categoriaProducto,$idCategoria,$idProducto);

}else{
    editarProductoConImagen($conexion,$nombreProducto,$precioProducto,$descripcionProducto,$stockProducto,$categoriaProducto,$idCategoria,$imagenProducto,$idProducto);
}

header('Location: EditarProductoAdmin.php?idProducto='.$idProducto);
?>