<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

$ca= $_POST['ca'];
$idUsuario= $_POST['idUsuario'];

if($ca==NULL){
    echo "Campo nulo";
}else if(!preg_match("/(Andalucía|Aragón|Islas Baleares|Canarias|Cantabria|Castilla-La Mancha|Castilla y León|Cataluña|Comunidad de Madrid|Comunidad Foral de Navarra|Comunidad Valenciana|Extremadura|Galicia|País Vasco|Principado de Asturias|Región de Murcia y La Rioja |Ceuta |Melilla)/",$ca)){
    echo "patronIncorrecto";
}else{
    editarCa($conexion,$idUsuario, $ca);
}



?>