<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

$primerApellido= $_POST['primerApellido'];

$idUsuario= $_POST['idUsuario'];


if($primerApellido==null){
    echo "Campo nulo";
}else if(!preg_match("/^[A-Za-záéíóúáéíóúÁÉÍÓÚàèìòùÀÈÌÒÙ ]{1,45}$/",$primerApellido)){
    echo "patronIncorrecto";
}else{
    editarPrimerApellido($conexion,$idUsuario, $primerApellido);
}

?>