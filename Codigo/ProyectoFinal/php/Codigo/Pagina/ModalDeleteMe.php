<div class="modal fade" id="darseDeBaja" tabindex="-1" aria-labelledby="darseDeBajaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="darseDeBajaLabel">SK8 OR DIE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="DarseDeBaja.php" id="FormularioDarseDeBaja" method="post" >      
                    <!-- imagen -->
                    <div class="form-group grupo_ col-md-12 " >
                        <div class="form-group">
                        <label for="deleteme">Escriba lo siguiente para confirmar la eliminación: "DeleteMe"(escribalo sin comillas).</label><br>
                        <input type="text" name="deleteme" id="deleteme" placeholder="Escriba aquí..." class="form-control" required><br>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-success" value="Aceptar">
                        
                </form>

                </div>
                </div>
        </div>
    </div>