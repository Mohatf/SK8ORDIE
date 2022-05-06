<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

$telefono= $_POST['telefono'];

$idUsuario= $_POST['idUsuario'];


if($telefono==null){
    echo "Campo nulo";
}else if(!preg_match("/^[0-9]{9}$/",$telefono)){
    echo "patronIncorrecto";
}else{
    editarTelefono($conexion,$idUsuario, $telefono);
}

?>