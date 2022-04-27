<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

session_start();
$dni=strtoupper($_POST['dni']);
$idUsuario= $_SESSION['idUsuarios'];
$validarDni= comprobarDni($conexion, $dni);

function validar_dni($dni){
    
	$letra = substr($dni, -1);
	$numeros = substr($dni, 0, -1);
	if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
		return true;
	}else{
		return false;
	}
}
 
if(mysqli_num_rows($validarDni)!=0){
    echo "Error";
}else if($dni==NULL){
    echo "Campo nulo";
}else if(validar_dni($dni)==false){
    echo "patronIncorrecto";
}else{
    editarDni($conexion,$idUsuario, $dni);
}



?>