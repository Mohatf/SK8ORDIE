<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

$email= $_POST['email'];
$idUsuario= $_POST['idUsuario'];
$validarEmail= comprobarEmail($conexion, $email);


if(mysqli_num_rows($validarEmail)!=0){
    echo "Error";
}else if($email==NULL){
    echo "Campo nulo";
}else if(!preg_match("/\S{1,}@\S{2,}\.\S{2,}/i",$email)){
    echo "patronIncorrecto";
}else{
    editarEmail($conexion,$idUsuario, $email);
}



?>