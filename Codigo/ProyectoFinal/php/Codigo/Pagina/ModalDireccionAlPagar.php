
<!--  VENTANA EMERGENTE PARA  DIRECCIONES AL REALIZAR EL PAGO-->



<div class="modal fade " id="emergenteDireccionesAlPagar" tabindex="-1" aria-labelledby="emergenteDireccionesAlPagarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="emergenteDireccionesAlPagarLabel">SK8 OR DIE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="Pagar.php" id="formDireccionEnvio" method="post">
            <legend>Dirección de envio</legend>
                <div class="form-row">
                    <div class="col-md-6 form-group">   
                        <input type="text" class="form-control" placeholder="Dirección. Ej: C/Chile, Nº 5" name="direccion" id="direccion" value="<?php echo $usuarioDireccion['Direccion'];?>" required >
                        <p class="mensaje-error"  id="errorDireccion"> <i class="fas fa-exclamation-circle"></i> La dirección que ha introducido no cumple el formato. Ej: (C/Peru, Nº 38).</p>
                    </div>
                    <div class="col-md-6 form-group">   
                        <input type="number" min="10000" max="52999" class="form-control" placeholder="Código Postal" name="codPost" id="codPost" value="<?php echo $usuarioDireccion['CodigoPostal'];?>" required >
                        <p class="mensaje-error"  id="errorCodPost"> <i class="fas fa-exclamation-circle"></i> Código postal incorrecto.</p>
                    </div>
                    <div class="col-md-6 form-group">   
                        <input type="text" class="form-control" placeholder="Ciudad" name="ciudad" id="ciudad" value="<?php echo $usuarioDireccion['Ciudad'];?>" required >
                        <p class="mensaje-error"  id="errorCiudad"> <i class="fas fa-exclamation-circle"></i> Parece que el nombre de tu ciudad es incorrecto o no existe.</p>
                    </div>
                    <div class="col-md-6 form-group">   
                        <input type="text" class="form-control" placeholder="Provincia" name="provincia" id="provincia" value="<?php echo $usuarioDireccion['Provincia'];?>" required >
                        <p class="mensaje-error"  id="errorProvincia"> <i class="fas fa-exclamation-circle"></i> Parece que el nombre de tu provincia es incorrecto o no coincide con el código postal.</p>
                    </div>
                    <div class="col-md-12 form-group">   
                        <input type="text" class="form-control" placeholder="Comunidad Autónoma" name="comAuto" id="comAuto" value="<?php echo $usuarioDireccion['ComunidadAutonoma'];?>" required >
                        <p class="mensaje-error"  id="errorComAuto"> <i class="fas fa-exclamation-circle"></i> Parece que el nombre de tu comunidad autónoma es incorrecto o no coincide con el código postal.</p>
                    </div>
                    <p class="mensaje-error-campos text-center" id="errorFormulario"> <i class="fas fa-exclamation"></i>&nbsp;&nbsp;Completa todos los campos.</p> 
                </div>
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-success" name="btnDireccionEnvio" value="Aceptar">
            </form> 
            </div>
        </div>
    </div>
</div>