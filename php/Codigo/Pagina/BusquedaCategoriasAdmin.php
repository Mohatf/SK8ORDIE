<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOCategorias.php';

$conexion = conectar(true);
$variableBusqueda=$_POST['search'];
$listarCategorias=buscarCategoriasAdmin($conexion,$variableBusqueda);
$json= array();
if(mysqli_num_rows($listarCategorias)==0){
    echo "0";
}else{
    while($categorias=mysqli_fetch_array($listarCategorias)){
        $json[] = array(
            'id' => $categorias['idCategoria'],
            'nombreCategoria' => $categorias['NombreCategoria']
        );
    }
        $jasonstring= json_encode($json);
         echo $jasonstring;
    }
?>