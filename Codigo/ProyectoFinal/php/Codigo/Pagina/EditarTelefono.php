<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

session_start();
$telefono= $_POST['telefono'];

$idUsuario= $_SESSION['idUsuarios'];


if($telefono==null){
    echo "Campo nulo";
}else if(!preg_match("/^[0-9]{9}$/",$telefono)){
    echo "patronIncorrecto";
}else{
    editarTelefono($conexion,$idUsuario, $telefono);
}

?>