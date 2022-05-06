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
    <title>SK8 OR DIE</title>
</head>
<body>
    <div class="container">
        
        <div class="contenidoFormulario ">

            <form action="comprobarDatosRecCon.php" class="col-md-3" method="POST" id="formularioRecuperarPassword">
                <legend class="tituloLogin text-center">Recuperar Contraseña</legend>
                <div class="form-group">  
                    <input type="text" class="form-control" placeholder="Usuario" name="usuario" id="usuario" required >
                    <p class="mensaje-error"  id="errorUsuario"> <i class="fas fa-exclamation-circle"></i> El usuario introducido no cumple los requisitos.</p>
                </div>        
               
                <div class="form-group"> 
                    <input type="text" class="form-control" placeholder="Email" name="email" id="email" required>
                    <p class="mensaje-error"  id="errorEmail"> <i class="fas fa-exclamation-circle"></i> El email no cumple el formato.</p>
                </div>
                <div class="form-group">  
                    <input type="text" class="form-control" placeholder="Dni" name="dni" id="dni" required >
                    <p class="mensaje-error"  id="errorDni"> <i class="fas fa-exclamation-circle"></i> El dni no cumple el formato.</p>
                </div>
                <p class="mensaje-error-campos text-center" id="errorFormulario"> <i class="fas fa-exclamation"></i>&nbsp;&nbsp;Completa todos los campos.</p> 
                <div class="form-group">
                    <input class=" botonEnviar btn btn-outline-success col-md-12" type="submit" value="Enviar">
                    
                </div>
                <div class="enlacesLogin form-group">
                    <a class="" href="#" style="text-decoration: none;"><i class="fas fa-arrow-left"></i> Volver al login</a>
                    <a class="" href="registro.php" style="text-decoration: none;">Crear usuario</a>   
                </div>
                
                <p class="mensajeErrorPhp text-center">
                    <?php 
                         if(isset($_GET['error']) && $_GET['error'] == "emailIncorrecto"){ echo '<i class="fas fa-exclamation"></i>&nbsp;&nbsp;'."El email no corresponde con el usuario.";}
                         if(isset($_GET['error']) && $_GET['error'] == "usuarioNoEncontrado"){ echo '<i class="fas fa-exclamation"></i>&nbsp;&nbsp;'."El usuario no existe.";  } 
                         if(isset($_GET['error']) && $_GET['error'] == "dniIncorrecto"){ echo '<i class="fas fa-exclamation"></i>&nbsp;&nbsp;'."El dni no corresponde con el usuario.";  } 
                    ?>
                </p>
                </form>
              
        </div>
        
    </div>

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-a11y="true"></script>
    <script src="../../../js/RecuperarPassword.js"></script>
</body>

</html>


