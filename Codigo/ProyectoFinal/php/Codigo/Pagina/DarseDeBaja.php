<?php
xit;
    }
    //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOS DAO DE FUNCIONES
    require '../../DAOS/conectorBD.php';
    require '../../DAOS/DAOUsuario.php';
    //CONECTAMOS A LA BASE DE DATOS
    $conexion=conectar(true);
    //INICIAMOS SESION
    session_start();
    //RECOGEMOS  LOS DATOS PROCEDENTES DEL PHP
    $idUsuario= $_SESSION['idUsuarios']; 
    // REALIZAMOS LA CONSULTA PARA ELIMINAR AL USUARIO
    // $darseDeBaja=darseDeBaja($conexion, $idUsuario);
    // Y DESTRUIMOS LA SESION
    session_destroy();
    // FINALMENTE LO REEDIRIGIMOS AL HOME
    header("Location: home.php");

?>