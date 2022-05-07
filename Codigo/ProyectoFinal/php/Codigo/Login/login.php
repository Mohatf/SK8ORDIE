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

            <form action="comprobarLogin.php" class="col-md-3" method="POST" id="formularioLogin">
                <legend class="tituloLogin text-center">Login</legend>
                <div class="form-group">
                    
                    <input type="text" class="form-control" placeholder="Usuario" name="usuario" id="usuario" required >
                    <p class="mensaje-error"  id="errorUsuario"> <i class="fas fa-exclamation-circle"></i> El usuario introducido no cumple los requisitos</p>
                </div>        
               
                <div class="grupo_password ">
                    <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required><br>
                        <div class="input-group-append">
                            <button id="show_password" class="btn btn-outline-light" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon1"></span> </button>
                        </div>
                    </div><br>
                    <p class="mensaje-error" id="errorPassword">&nbsp;<i class="fas fa-exclamation-circle"></i> La contraseña introducida no cumple los requisitos</p>
                </div>
                    <p class="mensaje-error-campos text-center" id="errorFormulario"> <i class="fas fa-exclamation"></i>&nbsp;&nbsp;Completa todos los campos.</p> 
                <div class="form-group">
                    <input class=" botonEnviar btn btn-outline-success col-md-12" type="submit" value="Enviar">
                </div>
                <div class="enlacesLogin form-group">
                    <a class="" href="registro.php" style="text-decoration: none;">Crear usuario</a>
                    <a class="" href="recuperarContraseña.php" style="text-decoration: none;">Recuperar <br>contraseña</a>
                </div>
                <p class="mensajeErrorPhp text-center">
                    <?php 
                        if(isset($_GET['error']) && $_GET['error'] == "ContraseñaIncorrecta"){ echo '<i class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;'."La contraseña es incorrecta.";}
                        if(isset($_GET['error']) && $_GET['error'] == "usuarioNoEncontrado"){ echo '<i class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;'."El usuario no existe.";  } 
                    ?>
                </p>
                <?php
                    if(isset($_GET['accion']) && $_GET['accion'] == "passwordCambiada"){ 
                    echo "<script>swal('SK8 OR DIE', 'Su contraseña se ha actualizado correctamenta.', 'success');</script>";
                        
                }?>
                <?php
                    if(isset($_GET['accion']) && $_GET['accion'] == "emailEnviado"){ 
                    echo "<script>swal('SK8 OR DIE', 'Se ha enviado un email a su correo electronico para cambiar la contraseña.', 'info');</script>";
                        
                }?>
                </form>
              
        </div>
        
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-a11y="true"></script>
    <script src="../../../js/login.js"></script>
</body>

</html>


