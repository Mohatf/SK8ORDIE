<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

$ciudad= $_POST['ciudad'];
$idUsuario= $_POST['idUsuario'];

if($ciudad==NULL){
    echo "Campo nulo";
}else if(!preg_match("/^[A-Z][A-Za-z ]{2,254}/",$ciudad)){
    echo "patronIncorrecto";
}else{
    editarCiudad($conexion,$idUsuario, $ciudad);
}



?>