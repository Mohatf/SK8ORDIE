<?php

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

$conexion = conectar(true);
session_start();
$fotoPerfil = addslashes(file_get_contents($_FILES['imgPerfil']['tmp_name']));
$idUsuario = $_SESSION['idUsuarios'];

echo $idUsuario;

// //REALIZAMOS LA CONSULTA PARA ACTUALIZAR LA FOTO DE PERFIL
$actualizarFotoPerfil= actualizarFotoPerfil($conexion, $fotoPerfil, $idUsuario);

header('Location: PerfilUsuario.php');



?>