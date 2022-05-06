<?php
require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOProductos.php';
require '../../DAOS/DAOCategorias.php';
$conexion = conectar(true);

$nombreProducto=$_POST['nombreProducto'];
$precioProducto=$_POST['precioProducto'];
$descripcionProducto=$_POST['descripcionProducto'];
$stockProducto=$_POST['stockProducto'];
$idCategoriaProducto=$_POST['categoriaProducto'];
$imagenProducto = addslashes(file_get_contents($_FILES['imagenProducto']['tmp_name']));

$buscarCategoria=filtrarCategoria($conexion, $idCategoriaProducto);
$categorias=mysqli_fetch_assoc($buscarCategoria);
$categoriaProducto=$categorias['NombreCategoria'];
$idCategoria=$categorias['idCategoria'];

$comrobarNombreProduco= comprobarNombreProducto($conexion, $nombreProducto);
if(mysqli_num_rows($comrobarNombreProduco)!=0){
    header('Location: AdministracionProductos.php?error=nombreExiste');
}else{
    addProducto($conexion,$nombreProducto,$precioProducto,$descripcionProducto,$stockProducto,$categoriaProducto,$idCategoria,$imagenProducto); 
    header('Location: AdministracionProductos.php'); 
}



?>