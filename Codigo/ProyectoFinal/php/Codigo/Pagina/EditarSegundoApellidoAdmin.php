<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

$segundoApellido= $_POST['segundoApellido'];

$idUsuario= $_POST['idUsuario'];


if($segundoApellido==null){
    echo "Campo nulo";
}else if(!preg_match("/^[A-Za-záéíóúáéíóúÁÉÍÓÚàèìòùÀÈÌÒÙ ]{1,45}$/",$segundoApellido)){
    echo "patronIncorrecto";
}else{
    editarSegundoApellido($conexion,$idUsuario, $segundoApellido);
}
?>