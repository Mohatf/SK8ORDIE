<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOCategorias.php';

$conexion = conectar(true);

$listarCategorias=listarCategorias($conexion);

$json= array();
while($categorias=mysqli_fetch_array($listarCategorias)){
    $json[] = array(
        'id' => $categorias['idCategoria'],
        'nombreCategoria' => $categorias['NombreCategoria']
    );
}
$jasonstring= json_encode($json);
echo $jasonstring;
?>