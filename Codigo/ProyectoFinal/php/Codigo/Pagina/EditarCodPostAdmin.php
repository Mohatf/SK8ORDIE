<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

$codPost= $_POST['codPost'];
$idUsuario= $_POST['idUsuario'];

if($codPost==NULL){
    echo "Campo nulo";
}else if(!preg_match("/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/",$codPost)){
    echo "patronIncorrecto";
}else{
    editarCodPost($conexion,$idUsuario, $codPost);
}



?>