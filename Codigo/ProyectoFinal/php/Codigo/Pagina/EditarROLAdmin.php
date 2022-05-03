<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

$rol= $_POST['rol'];

$idUsuario= $_POST['idUsuario'];


if($rol === "Usuario" || $rol == "Admin"  ){
    editarRol($conexion,$idUsuario, $rol);
}elseif($rol == null){
    echo "Campo nulo";
}else {
    echo "rolIncorrecto";
}



?>