<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOCategorias.php';

$conexion = conectar(true);
$categoria=$_POST['categoria'];
$listarCategorias='';
if($categoria=='Todos'){
    $listarCategorias=listarCategorias($conexion);
}else{
    $listarCategorias=filtrarCategoria($conexion, $categoria);
}

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

