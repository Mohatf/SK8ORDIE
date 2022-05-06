<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

session_start();
$primerApellido= $_POST['primerApellido'];

$idUsuario= $_SESSION['idUsuarios'];


if($primerApellido==null){
    echo "Campo nulo";
}else if(!preg_match("/^[A-Za-záéíóúáéíóúÁÉÍÓÚàèìòùÀÈÌÒÙ ]{1,45}$/",$primerApellido)){
    echo "patronIncorrecto";
}else{
    editarPrimerApellido($conexion,$idUsuario, $primerApellido);
}

?>