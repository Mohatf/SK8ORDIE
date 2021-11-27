<?php

function consultaLogin($conexion, $usuario, $password){

    $consulta = "SELECT * FROM Usuarios where Usuario = '$usuario' AND Password = '$password'";

    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

// ESTA CONSULTA SE USA PARA CREAR LA SESION DE UN USUARIO
function crearSesion($usuario){
    //Asignamos el id
    session_id($usuario['Usuario']);
    //Iniciamos la sesion
    session_start();
    $_SESSION['usuarioConectado']=true;

    //Guardamos los datos en la sesion
    foreach($usuario as $indice=>$valor){
        $_SESSION[$indice] = $valor;
    }
}

function validarUsuario($conexion, $usuario){

    $consulta = "SELECT * FROM Usuarios where Usuario = '$usuario'";

    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function buscarUsuarioID($conexion, $idUsuario){

    $consulta = "SELECT * FROM Usuarios where idUsuarios = '$idUsuario'";

    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

// Para validar individualmente Email y dni para determinar que el error es porque alguno de esos campos ya existen 
//******************************* */
function comprobarDni($conexion, $dni){

    $consulta = "SELECT * FROM Usuarios where Dni = '$dni'";

    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function comprobarEmail($conexion, $email){

    $consulta = "SELECT * FROM Usuarios where Email = '$email'";

    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
//******************************* */

function validarEmail($conexion, $email, $usuario){

    $consulta = "SELECT * FROM Usuarios where Email = '$email' AND Usuario = '$usuario'";

    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function validarDni($conexion, $dni, $usuario){

    $consulta = "SELECT * FROM Usuarios where Dni = '$dni' AND Usuario = '$usuario'";

    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
 
function registro($conexion, $nombre, $usuario, $password, $primerapellido, $segundoapellido, $dni, $email, $telefono, $fotoperfil){

     $consulta = "INSERT INTO `Usuarios` (`Nombre`, `Usuario`, `Password`, `PrimerApellido`, `SegundoApellido`, `Dni`, `Email`, `Telefono`, `Rol`, `FotoPerfil`) VALUES ('$nombre', '$usuario', '$password', '$primerapellido', '$segundoapellido', '$dni', '$email', '$telefono', 'Usuario', '$fotoperfil')";


    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function registroSinFoto($conexion, $nombre, $usuario, $password, $primerapellido, $segundoapellido, $dni, $email, $telefono){

    $consulta = "INSERT INTO `Usuarios` (`Nombre`, `Usuario`, `Password`, `PrimerApellido`, `SegundoApellido`, `Dni`, `Email`, `Telefono`, `Rol`) VALUES ('$nombre', '$usuario', '$password', '$primerapellido', '$segundoapellido', '$dni', '$email', '$telefono', 'Usuario')";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function crearCarrito($conexion, $idCarrito, $idUsuarios){
    $consulta ="INSERT INTO `Carrito` (`idCarrito`, `idUsuarios`) VALUES ('$idCarrito', '$idUsuarios')";

    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function updatePassword($conexion,$idUsuario, $password){
    $consulta = "UPDATE Usuarios SET Password = '$password' WHERE (idUsuarios = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}






?>