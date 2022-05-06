<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

$provincia= $_POST['provincia'];
$idUsuario= $_POST['idUsuario'];

if($provincia==NULL){
    echo "Campo nulo";
}else if(!preg_match("/(A Coruña|La Coruña|Álava|Albacete|Alicante|Almería|Asturias|Ávila|Badajoz|Baleares|Barcelona|Burgos|Cáceres|Cádiz|Cantabria|Castellón|Ceuta|Ciudad Real|Córdoba|Cuenca|Girona|Granada|Guadalajara|Gipuzkoa|Huelva|Huesca|Jaén|La Rioja|Las Palmas|León|Lérida|Lugo|Madrid|Málaga|Melilla|Murcia|Navarra|Ourense|Palencia|Pontevedra|Salamanca|Segovia|Sevilla|Soria|Tarragona|Santa Cruz de Tenerife|Teruel|Toledo|Valencia|Valladolid|Vizcaya|Zamora|Zaragoza)/",$provincia)){
    echo "patronIncorrecto";
}else{
    editarProvincia($conexion,$idUsuario, $provincia);
}



?>