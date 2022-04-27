<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

$direccion= $_POST['direccion'];
$idUsuario= $_POST['idUsuario'];
$validarDireccion= comprobarDireccion($conexion, $direccion);


if($direccion==NULL){
    echo "Campo nulo";
}else if(!preg_match("/^(c|C)\/[#.0-9a-zA-Z\s,-]+$/",$direccion)){
    echo "patronIncorrecto";
}else{
    editarDireccion($conexion,$idUsuario, $direccion);
}



?>