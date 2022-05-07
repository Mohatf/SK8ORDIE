
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/registro.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="../../../imagenes/icono-ventana1.png">
    <title>SK8 OR DIE</title>
</head>
<body>
    <div class="container">
        <div class="row contenidoFormulario mt-5">
            <div class="col-md-5">
                <form action="comprobarRegistro.php" method="POST" id="formularioRegistro" enctype="multipart/form-data">
                    <legend class="tituloRegistro text-center">Registro</legend>
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <input class="form-control" type="text" placeholder="Usuario" name="usuario" id="usuario">
                            <p class="mensaje-error" id="errorUsuario"> <i class="fas fa-exclamation-circle"></i> El usuario introducido no cumple los requisitos</p>
                        </div>
                        <div class="col-md-6 form-group">
                            <input class="form-control" type="text" placeholder="Nombre" name="nombre" id="nombre">
                            <p class="mensaje-error" id="errorNombre"> <i class="fas fa-exclamation-circle"></i> El nombre introducido es incorrecto.</p>
                        </div> 
                        <div class="col-md-6 form-group">
                            <input class="form-control" type="text" placeholder="Primer Apellido" name="primerapellido" id="primerapellido">
                            <p class="mensaje-error" id="errorPrimerApellido"> <i class="fas fa-exclamation-circle"></i> El primer apellido es incorrecto.</p>
                        </div> 
                        <div class="col-md-6 form-group">
                            <input class="form-control" type="text" placeholder="Segundo Apellido" name="segundoapellido" id="segundoapellido">
                            <p class="mensaje-error" id="errorSegundoApellido"> <i class="fas fa-exclamation-circle"></i> El segundo apellido es incorrecto.</p>
                        </div> 
                        <div class="col-md-6 form-group">
                            <input class="form-control" type="text" placeholder="Dni" name="dni" id="dni">
                            <p class="mensaje-error" id="errorDni"> <i class="fas fa-exclamation-circle"></i> El dni no cumple el formato.</p>
                        </div> 
                        
                        <div class="col-md-6 form-group">
                            <input class="form-control" type="text" placeholder="Telefono" name="telefono" id="telefono">
                            <p class="mensaje-error" id="errorTelefono"> <i class="fas fa-exclamation-circle"></i> El número de teléfono no cumple el formato.</p>
                        </div>  
                                 
                        <div class="col-md-6">
                            <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required><br>
                                <div class="input-group-append">
                                    <button id="show_password" class="btn btn-outline-light" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                </div>
                            </div><br>
                            <p class="mensaje-error" id="errorPassword"> <i class="fas fa-exclamation-circle"></i> La contraseña introducida no cumple los requisitos.</p>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                            <input type="password" name="repetirPassword" id="repetirPassword" class="form-control" placeholder="Repetir contraseña" required ><br>
                                <div class="input-group-append">
                                    <button id="show_repetirPassword" class="btn btn-outline-light" type="button" onclick="mostrarRepetirPassword()"> <span class="fa fa-eye-slash iconR"></span> </button>
                                </div>
                            </div><br>
                            <p class="mensaje-error" id="errorRepetirPassword"> <i class="fas fa-exclamation-circle"></i> Las contraseñas no coinciden.</p>
                        </div>

                        <div class="col-md-12 form-group">
                            <input class="form-control" type="text" placeholder="Email" name="email" id="email">
                            <p class="mensaje-error" id="errorEmail"> <i class="fas fa-exclamation-circle"></i> El email no cumple el formato.</p>
                        </div> 
                        
                        //! ESTA MEDIO PUTO ESTE WEE
                        <div class="col-md-12 form-group">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file"  class="custom-file-input" placeholder="Foto Perfil" name="fotoPerfil" id="fotoPerfil">
                                  <label class="custom-file-label" for="fotoPerfil">Selecciona una foto de perfil.</label>
                                </div>
                            </div> 
                        </div>
                    </div>  
                    <p class="mensaje-error-campos text-center" id="errorFormulario"> <i class="fas fa-exclamation"></i>&nbsp;&nbsp;Completa todos los campos.</p> 

                        <div class="form-group">
                            
                            <input class=" botonEnviar btn btn-outline-success col-md-12" type="submit" value="Enviar">
                        </div>
                        
                        <p class="mensajeErrorPhp">
                            <?php 
                                if(isset($_GET['error']) && $_GET['error'] == "usuarioExiste"){ echo '<i class="fas fa-exclamation"></i>&nbsp;&nbsp;'."El usuario introducido ya existe.";}
                                if(isset($_GET['error']) && $_GET['error'] == "dniExiste"){ echo '<i class="fas fa-exclamation"></i>&nbsp;&nbsp;'."El dni introducido ya existe.";  } 
                                if(isset($_GET['error']) && $_GET['error'] == "emailExiste"){ echo '<i class="fas fa-exclamation"></i>&nbsp;&nbsp;'."El email introducido ya existe.";}
                                if(isset($_GET['error']) && $_GET['error'] == "captchaNoVerificado"){ echo '<i class="fas fa-exclamation"></i>&nbsp;&nbsp;'."El captcha no ha sido verificado correctamente";}
                                if(isset($_GET['error']) && $_GET['error'] == "captchaMalVerificado"){ echo '<i class="fas fa-exclamation"></i>&nbsp;&nbsp;'."El captcha no ha sido verificado";}
                                
                            ?>
                        </p>
                        <div class="enlacesRegistro form-group">
                            <a href="../Login/login.php" style="text-decoration: none;"> <i class="fas fa-arrow-left"></i> Volver al login</a>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
      
        
    </div>
    
    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-a11y="true"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    
    <script src="../../../js/registro.js"></script>

</body>

</html>