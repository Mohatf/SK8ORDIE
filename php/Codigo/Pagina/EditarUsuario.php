<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

session_start();
$usuario= $_POST['usuario'];
$idUsuario= $_SESSION['idUsuarios'];
$validarUsuario=validarUsuario($conexion, $usuario);


if(mysqli_num_rows($validarUsuario)!=0){
    echo "Error";
}else if($usuario==NULL){
    echo "Campo nulo";
}else if(!preg_match("/\w{4,30}/",$usuario)){
    echo "patronIncorrecto";
}else{
    editarUsuario($conexion,$idUsuario, $usuario);
}



?>
