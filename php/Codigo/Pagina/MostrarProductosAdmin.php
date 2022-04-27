<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOProductos.php';

$conexion = conectar(true);

$listarProductos=listarProductos($conexion);

$json= array();
while($productos=mysqli_fetch_array($listarProductos)){
    $json[] = array(
        'id' => $productos['idProductos'],
        'nombreProducto' => $productos['NombreProducto'],
        'stock' => $productos['Stock'],
        'precio' => $productos['Precio'],
        'descripcion' => $productos['Descripcion'],
        'idCategoriaFK' => $productos['idCategoriaFK'],
        'nombreCategoria' => $productos['NombreCategoria']
    );
}
$jasonstring= json_encode($json);
echo $jasonstring;
?>