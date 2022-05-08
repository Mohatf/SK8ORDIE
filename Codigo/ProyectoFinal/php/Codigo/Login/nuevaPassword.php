<?php
require '../../DAOS/Config.php';
$usuario= $_GET['user'];


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../imagenes/icono-ventana1.png">
    <link rel="stylesheet" href="../../../css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>SK8 OR DIE</title>
</head>
<body>
    <div class="container">
        
        <div class="contenidoFormulario ">

            <form action="updatePassword.php" class="col-md-3" method="POST" id="formularioUpdatePassword">
                <legend class="tituloLogin text-center">Nueva contraseña</legend>
                <div class="grupo_password ">
                    <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Nueva contraseña" required><br>
                        <div class="input-group-append">
                            <button id="show_password" class="btn btn-outline-light" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                        </div>
                    </div><br>
                    <p class="mensaje-error" id="errorPassword">&nbsp;<i class="fas fa-exclamation-circle"></i> La contraseña introducida no cumple los requisitos</p>
                </div>     
               
                <div class="grupo_RepetirPassword ">
                    <div class="input-group">
                    <input type="password" name="repetirPassword" id="repetirPassword" class="form-control" placeholder="Repetir contraseña" required ><br>
                        <div class="input-group-append">
                            <button id="show_repetirPassword" class="btn btn-outline-light" type="button" onclick="mostrarRepetirPassword()"> <span class="fa fa-eye-slash iconR"></span> </button>
                        </div>
                    </div><br>
                    <p class="mensaje-error" id="errorRepetirPassword"> <i class="fas fa-exclamation-circle"></i> Las contraseñas no coinciden.</p>
                </div>
                <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
                <p class="mensaje-error-campos text-center" id="errorFormulario"> <i class="fas fa-exclamation"></i>&nbsp;&nbsp;Completa todos los campos.</p> 
                <div class="form-group">
                    <input class=" botonEnviar btn btn-outline-success col-md-12" type="submit" value="Enviar">
                </div>
                <p class="mensajeErrorPhp text-center">
                    <?php 
                        if(isset($_GET['error']) && $_GET['error'] == "ContraseñaIncorrecta"){ echo '<i class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;'."La contraseña es incorrecta.";}
                        if(isset($_GET['error']) && $_GET['error'] == "usuarioNoEncontrado"){ echo '<i class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;'."El usuario no existe.";  } 
                    ?>
                </p>
                    <div class="enlacesLogin form-group">
                    <a href="../Login/login.php" style="text-decoration: none;"> <i class="fas fa-arrow-left"></i> Volver al login</a>
                        
                </div>
               
                </form>
              
        </div>
        
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-a11y="true"></script>
    <script src="../../../js/updatePassword.js"></script>
</body>

</html>


