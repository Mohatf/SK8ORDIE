<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

session_start();
$nombre= $_POST['nombre'];

$idUsuario= $_SESSION['idUsuarios'];


if($nombre==null){
    echo "Campo nulo";
}else if(!preg_match("/^[A-Za-záéíóúáéíóúÁÉÍÓÚàèìòùÀÈÌÒÙ ]{1,40}$/",$nombre)){
    echo "patronIncorrecto";
}else{
    editarNombre($conexion,$idUsuario, $nombre);
}



?>