<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOCategorias.php';

$conexion = conectar(true);

$categoria= $_POST['categoria'];
$idCategoria= $_POST['idCategoria'];
$validarCategoria=validarCategoria($conexion, $categoria);


if(mysqli_num_rows($validarCategoria)!=0){
    echo "Error";
}else if($categoria==NULL){
    echo "Campo nulo";
}else{
    editarCategoria($conexion,$idCategoria, $categoria);
}



?>
