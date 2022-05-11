<?php

function consultaLogin($conexion, $usuario, $password){

    $consulta = "SELECT * FROM usuarios where Usuario = '$usuario' AND Password = '$password'";

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

    $consulta = "SELECT * FROM usuarios where Usuario = '$usuario'";

    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function buscarUsuarioID($conexion, $idUsuario){

    $consulta = "SELECT * FROM usuarios where idUsuarios = '$idUsuario'";

    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function darseDeBaja($conexion, $idUsuario){

    $consulta = "DELETE FROM usuarios where idUsuarios = '$idUsuario'";

    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}


// Para validar individualmente Email y dni para determinar que el error es porque alguno de esos campos ya existen 
//******************************* */
function comprobarDni($conexion, $dni){

    $consulta = "SELECT * FROM usuarios where Dni = '$dni'";

    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function comprobarEmail($conexion, $email){

    $consulta = "SELECT * FROM usuarios where Email = '$email'";

    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function comprobarDireccion($conexion, $direccion){

    $consulta = "SELECT * FROM usuarios where Direccion = '$direccion'";

    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

//******************************* */

function validarEmail($conexion, $email, $usuario){

    $consulta = "SELECT * FROM usuarios where Email = '$email' AND Usuario = '$usuario'";

    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function validarDni($conexion, $dni, $usuario){

    $consulta = "SELECT * FROM usuarios where Dni = '$dni' AND Usuario = '$usuario'";

    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
 
function registro($conexion, $nombre, $usuario, $password, $primerapellido, $segundoapellido, $dni, $email, $telefono, $fotoperfil){

     $consulta = "INSERT INTO `usuarios` (`Nombre`, `Usuario`, `Password`, `PrimerApellido`, `SegundoApellido`, `Dni`, `Email`, `Telefono`, `Rol`, `FotoPerfil`, `Direccion`,`ComunidadAutonoma`,`Provincia`, `Ciudad`, `CodigoPostal`) VALUES ('$nombre', '$usuario', '$password', '$primerapellido', '$segundoapellido', '$dni', '$email', '$telefono', 'Usuario', '$fotoperfil','','','','','')";


    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function registroSinFoto($conexion, $nombre, $usuario, $password, $primerapellido, $segundoapellido, $dni, $email, $telefono){

    $consulta = "INSERT INTO usuarios (`Nombre`, `Usuario`, `Password`, `PrimerApellido`, `SegundoApellido`, `Dni`, `Email`, `Telefono`, `Rol`, `Direccion`,`ComunidadAutonoma`,`Provincia`, `Ciudad`, `CodigoPostal` ) VALUES ('$nombre', '$usuario', '$password', '$primerapellido', '$segundoapellido', '$dni', '$email', '$telefono', 'Usuario','','','','','')";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function crearCarrito($conexion, $idCarrito, $idUsuarios){
    $consulta ="INSERT INTO `carrito` (`idCarrito`, `idUsuarios`) VALUES ('$idCarrito', '$idUsuarios')";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function updatePassword($conexion,$idUsuario, $password){
    $consulta = "UPDATE usuarios SET Password = '$password' WHERE (idUsuarios = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function editarUsuario($conexion,$idUsuario, $usuario){
    $consulta = "UPDATE usuarios SET Usuario = '$usuario' WHERE (`idu` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function editarNombre($conexion,$idUsuario, $nombre){
    $consulta = "UPDATE usuarios SET Nombre = '$nombre' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function editarPrimerApellido($conexion,$idUsuario, $primerApellido){
    $consulta = "UPDATE usuarios SET PrimerApellido = '$primerApellido' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function editarSegundoApellido($conexion,$idUsuario, $segundoApellido){
    $consulta = "UPDATE usuarios SET SegundoApellido = '$segundoApellido' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function editarDireccion($conexion,$idUsuario, $direccion){
    $consulta = "UPDATE usuarios SET Direccion = '$direccion' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function editarCa($conexion,$idUsuario, $ca){
    $consulta = "UPDATE usuarios SET ComunidadAutonoma = '$ca' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function editarProvincia($conexion,$idUsuario, $provincia){
    $consulta = "UPDATE usuarios SET Provincia = '$provincia' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function editarCiudad($conexion,$idUsuario, $ciudad){
    $consulta = "UPDATE usuarios SET Ciudad = '$ciudad' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function editarCodPost($conexion,$idUsuario, $codPost){
    $consulta = "UPDATE usuarios SET CodigoPostal = '$codPost' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function editarTelefono($conexion,$idUsuario, $telefono){
    $consulta = "UPDATE usuarios SET Telefono = '$telefono' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function editarEmail($conexion,$idUsuario, $email){
    $consulta = "UPDATE usuarios SET Email = '$email' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function editarDni($conexion,$idUsuario, $dni){
    $consulta = "UPDATE usuarios SET Dni = '$dni' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function editarRol($conexion,$idUsuario, $rol){
    $consulta = "UPDATE usuarios SET Rol = '$rol' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function actualizarFotoPerfil($conexion, $fotoPerfil, $idUsuario){
    $consulta = "UPDATE usuarios SET FotoPerfil = '$fotoPerfil' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function listarUsuarios($conexion){

    $consulta = "SELECT * FROM usuarios";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
function eliminarUsuario($conexion, $idUsuario){

    $consulta = "DELETE FROM usuarios WHERE idUsuarios = '$idUsuario'";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}


function buscarUsuarios($conexion,$variableBusqueda){

    $consulta = "SELECT * FROM usuarios where idUsuarios like '%$variableBusqueda%' 
        or Usuario like '%$variableBusqueda%'
        or Nombre like '%$variableBusqueda%'
        or PrimerApellido like '%$variableBusqueda%'
        or SegundoApellido like '%$variableBusqueda%'
        or Telefono like '%$variableBusqueda%'
        or Email like '%$variableBusqueda%'
        or DNI like '%$variableBusqueda%'
        or Direccion like '%$variableBusqueda%'
        or ComunidadAutonoma like '%$variableBusqueda%'
        or Provincia like '%$variableBusqueda%'
        or Ciudad like '%$variableBusqueda%'
        or CodigoPostal like '%$variableBusqueda%'
        or ROL like '%$variableBusqueda%';";

    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
function filtrarUsuario($conexion, $categoria){

    $consulta = "SELECT * FROM usuarios WHERE Rol='$categoria'";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function imagenDefault($conexion){

    $consulta = "SELECT * FROM ImagenDefault WHERE idImagenDefault='1'";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
//! MMMMM ¿?
function comprobarPrecioTotalCarrito($conexion){

    $consulta = "SELECT * FROM carrito";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function registrarDireccionDeEnvio($conexion, $idUsuario, $direccion, $comAuto, $provincia, $ciudad, $codPost){

    $consulta = "UPDATE usuarios SET `Direccion` = '$direccion', `ComunidadAutonoma` = '$comAuto', `Provincia` = '$provincia', `Ciudad` = '$ciudad', `CodigoPostal` = '$codPost' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

?>