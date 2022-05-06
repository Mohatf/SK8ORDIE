<!-- Este es el modal para añadir usuario -->
    <div class="modal fade " id="modalAñadirUsuarioAdmin" tabindex="-1" aria-labelledby="modalAñadirUsuarioAdminLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalAñadirUsuarioAdminLabel">SK8 OR DIE</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body px-4 py-4">
            <form id="formularioAñadirUsuarioAdmin" enctype="multipart/form-data">
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
                                    <button id="show_password" class="btn btn-outline-dark" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                </div>
                            </div><br>
                            <p class="mensaje-error" id="errorPassword"> <i class="fas fa-exclamation-circle"></i> La contraseña introducida no cumple los requisitos.</p>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                            <input type="password" name="repetirPassword" id="repetirPassword" class="form-control" placeholder="Repetir contraseña" required ><br>
                                <div class="input-group-append">
                                    <button id="show_repetirPassword" class="btn btn-outline-dark" type="button" onclick="mostrarRepetirPassword()"> <span class="fa fa-eye-slash iconR"></span> </button>
                                </div>
                            </div><br>
                            <p class="mensaje-error" id="errorRepetirPassword"> <i class="fas fa-exclamation-circle"></i> Las contraseñas no coinciden.</p>
                        </div>

                        <div class="col-md-12 form-group">
                            <input class="form-control" type="text" placeholder="Email" name="email" id="email">
                            <p class="mensaje-error" id="errorEmail"> <i class="fas fa-exclamation-circle"></i> El email no cumple el formato.</p>
                        </div> 
                        
                    </div>  
                    <p class="mensaje-error-campos text-center" id="errorFormulario"> <i class="fas fa-exclamation"></i>&nbsp;&nbsp;Completa todos los campos.</p> 

                        
                        <p class="mensajeErrorPhp">
                            <?php 
                                if(isset($_GET['error']) && $_GET['error'] == "usuarioExiste"){ echo '<i class="fas fa-exclamation"></i>&nbsp;&nbsp;'."El usuario introducido ya existe.";}
                                if(isset($_GET['error']) && $_GET['error'] == "dniExiste"){ echo '<i class="fas fa-exclamation"></i>&nbsp;&nbsp;'."El dni introducido ya existe.";  } 
                                if(isset($_GET['error']) && $_GET['error'] == "emailExiste"){ echo '<i class="fas fa-exclamation"></i>&nbsp;&nbsp;'."El email introducido ya existe.";}
                                if(isset($_GET['error']) && $_GET['error'] == "captchaNoVerificado"){ echo '<i class="fas fa-exclamation"></i>&nbsp;&nbsp;'."El captcha no ha sido verificado correctamente";}
                                if(isset($_GET['error']) && $_GET['error'] == "captchaMalVerificado"){ echo '<i class="fas fa-exclamation"></i>&nbsp;&nbsp;'."El captcha no ha sido verificado";}
                                
                            ?>
                        </p> 
        
                <div class="modal-footer">
                    <button class="botonEnviar btn btn-success" name="botonEnviar">Añadir</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    
            </form>

            </div>
        </div>
        </div>
    </div>