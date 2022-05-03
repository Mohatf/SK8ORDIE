<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);
$variableBusqueda=$_POST['search'];
$listarUsuarios=buscarUsuarios($conexion,$variableBusqueda);
$json= array();
if(mysqli_num_rows($listarUsuarios)==0){
    echo "0";
}else{
    while($usuarios=mysqli_fetch_array($listarUsuarios)){
        $json[] = array(
            'id' => $usuarios['idUsuarios'],
            'usuario' => $usuarios['Usuario'],
            'nombre' => $usuarios['Nombre'],
            'primerApellido' => $usuarios['PrimerApellido'],
            'segundoApellido' => $usuarios['SegundoApellido'],
            'dni' => $usuarios['Dni'],
            'telefono' => $usuarios['Telefono'],
            'email' => $usuarios['Email'],
            'direccion' => $usuarios['Direccion'],
            'comunidadAutonoma' => $usuarios['ComunidadAutonoma'],
            'provincia' => $usuarios['Provincia'],
            'ciudad' => $usuarios['Ciudad'],
            'codigoPostal' => $usuarios['CodigoPostal'],
            'rol' => $usuarios['Rol']
        );
    }
        $jasonstring= json_encode($json);
         echo $jasonstring;
    }
?>