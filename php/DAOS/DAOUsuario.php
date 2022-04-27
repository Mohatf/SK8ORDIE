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

function comprobarDireccion($conexion, $direccion){

    $consulta = "SELECT * FROM Usuarios where Direccion = '$direccion'";

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

function editarUsuario($conexion,$idUsuario, $usuario){
    $consulta = "UPDATE Usuarios SET Usuario = '$usuario' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function editarNombre($conexion,$idUsuario, $nombre){
    $consulta = "UPDATE Usuarios SET Nombre = '$nombre' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function editarPrimerApellido($conexion,$idUsuario, $primerApellido){
    $consulta = "UPDATE Usuarios SET PrimerApellido = '$primerApellido' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function editarSegundoApellido($conexion,$idUsuario, $segundoApellido){
    $consulta = "UPDATE Usuarios SET SegundoApellido = '$segundoApellido' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function editarDireccion($conexion,$idUsuario, $direccion){
    $consulta = "UPDATE Usuarios SET Direccion = '$direccion' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function editarCa($conexion,$idUsuario, $ca){
    $consulta = "UPDATE Usuarios SET ComunidadAutonoma = '$ca' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function editarProvincia($conexion,$idUsuario, $provincia){
    $consulta = "UPDATE Usuarios SET Provincia = '$provincia' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function editarCiudad($conexion,$idUsuario, $ciudad){
    $consulta = "UPDATE Usuarios SET Ciudad = '$ciudad' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function editarCodPost($conexion,$idUsuario, $codPost){
    $consulta = "UPDATE Usuarios SET CodigoPostal = '$codPost' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function editarTelefono($conexion,$idUsuario, $telefono){
    $consulta = "UPDATE Usuarios SET Telefono = '$telefono' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function editarEmail($conexion,$idUsuario, $email){
    $consulta = "UPDATE Usuarios SET Email = '$email' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function editarDni($conexion,$idUsuario, $dni){
    $consulta = "UPDATE Usuarios SET Dni = '$dni' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function editarRol($conexion,$idUsuario, $rol){
    $consulta = "UPDATE Usuarios SET Rol = '$rol' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function actualizarFotoPerfil($conexion, $fotoPerfil, $idUsuario){
    $consulta = "UPDATE Usuarios SET FotoPerfil = '$fotoPerfil' WHERE (`idUsuarios` = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function listarUsuarios($conexion){

    $consulta = "SELECT * FROM Usuarios";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}
function eliminarUsuario($conexion, $idUsuario){

    $consulta = "DELETE FROM Usuarios WHERE idUsuarios = '$idUsuario'";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}


function buscarUsuarios($conexion,$variableBusqueda){

    $consulta = "SELECT * FROM Usuarios where idUsuarios like '%$variableBusqueda%' 
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

    $consulta = "SELECT * FROM Usuarios WHERE Rol='$categoria'";
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