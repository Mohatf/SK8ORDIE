<?php
function listarCategorias($conexion){

    $consulta = "SELECT * FROM categoria";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function buscarCategoriasAdmin($conexion,$variableBusqueda){

    $consulta = "SELECT * FROM categoria where idCategoria like '%$variableBusqueda%' 
    or NombreCategoria like '%$variableBusqueda%'";

    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function filtrarCategoria($conexion, $categoria){

    $consulta = "SELECT * FROM categoria WHERE idCategoria='$categoria'";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}



?>