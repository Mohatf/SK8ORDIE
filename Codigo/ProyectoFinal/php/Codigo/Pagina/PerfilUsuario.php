<?php 

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';
require '../../DAOS/Config.php';

$conexion = conectar(true);

session_start();

$buscarUsuario=buscarUsuarioID($conexion, $_SESSION['idUsuarios']);
$usuario= mysqli_fetch_assoc($buscarUsuario);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SK8 OR DIE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="../../../imagenes/icono-ventana1.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../../../css/PeriflUsuario.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body style="background:#23252B ;">
    <?php include 'menu.php'; ?>
    <?php include 'ModalDeleteMe.php'; ?>
  
    <div class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div  class="perfil-usuario-avatar">
                    <span id="fotoPerfil" style="height:100%;"></span>
                    <button type="button" data-toggle="modal" data-target="#actualizarFotoPerfil" class="boton-avatar">
                        <i class="far fa-image"></i>
                    </button>
                </div>>
            </div>
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo"><span id="nombre-titulo"></span> <span id="primerApellido-titulo"></span> <span id="segundoApellido-titulo"></span></h3>
                
            </div>
            <div class="perfil-usuario-footer">
                <ul class="lista-datos">
                    <li><i class="icono fas fa-user-tie"></i> Usuario: <span  id="usuarioAj" ></span> <a href="#" data-usuario="<?php echo $usuario['Usuario'];?>" class="boton-editarUsuario"><i class="fas fa-edit"></i></a></li>
                    <li><i class="icono fas fa-signature"></i></i>Nombre: <span  id="nombreAj" ></span> <a href="#" data-nombre="<?php echo $usuario['Nombre'];?>" class="boton-editarNombre"><i class="fas fa-edit"></i></a></li>
                    <li><i class="icono fas fa-signature"></i></i>Primer apellido: <span  id="primerApellidoAj" ></span> <a href="#" data-primerApellido="<?php echo $usuario['PrimerApellido'];?>" class="boton-editarPrimerApellido"><i class="fas fa-edit"></i></a></li>
                    <li><i class="icono fas fa-signature"></i></i>Segundo apellido: <span  id="segundoApellidoAj" ></span> <a href="#" data-segundoApellido="<?php echo $usuario['SegundoApellido'];?>" class="boton-editarSegundoApellido"><i class="fas fa-edit"></i></a></li>
                </ul>
                <ul class="lista-datos">
                    <li><i class="icono fas fa-phone-alt"></i>Telefono: <span  id="telefonoAj" ></span> <a href="#" data-telefono="<?php echo $usuario['Telefono'];?>" class="boton-editarTelefono"><i class="fas fa-edit"></i></a></li>
                    <li><i class="icono fas fa-envelope"></i>Email: <span  id="emailAj" ></span><a href="#" data-Email="<?php echo $usuario['Email'];?>" class="boton-editarEmail"><i class="fas fa-edit"></i></a></li>
                    <li><i class="icono fas fa-id-card"></i>DNI: <span  id="dniAj" ></span> <a href="#" data-dni="<?php echo $usuario['Dni'];?>" class="boton-editarDni"><i class="fas fa-edit"></i></a></li>
                    <li data-toggle="modal" data-target="#darseDeBaja"><i class="icono fas fa-user-minus"></i>Darse de baja</li>
                </ul>
            </div>
           
        </div>
    </div>
    <!-- ESTA ES LA VENTANA EMERGENTE PARA CAMBIAR LA FOTO DE PERFIL -->
    <?php include 'ModalFotoPerfilUsuario.php'; ?>
   
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../../js/menu.js"></script>
    <script src="../../../js/Perfil.js"></script>
    <script src="../../../js/Deleteme.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  
</body>

</html>