<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);

$listarUsuarios=listarUsuarios($conexion);

$json= array();
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
?>