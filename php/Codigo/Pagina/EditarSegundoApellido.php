<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

session_start();
$segundoApellido= $_POST['segundoApellido'];

$idUsuario= $_SESSION['idUsuarios'];


if($segundoApellido==null){
    echo "Campo nulo";
}else if(!preg_match("/^[A-Za-záéíóúáéíóúÁÉÍÓÚàèìòùÀÈÌÒÙ ]{1,45}$/",$segundoApellido)){
    echo "patronIncorrecto";
}else{
    editarSegundoApellido($conexion,$idUsuario, $segundoApellido);
}
?>