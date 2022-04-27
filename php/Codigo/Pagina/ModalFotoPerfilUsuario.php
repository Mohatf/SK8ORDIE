  <!-- ESTA ES LA VENTANA EMERGENTE PARA CAMBIAR LA FOTO DE PERFIL -->
  <div class="modal fade " id="actualizarFotoPerfil" tabindex="-1" aria-labelledby="actualizarFotoPerfilLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="actualizarFotoPerfilLabel">SK8 OR DIE</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="EditarFotoPerfil.php" id="FormularioPerfil" method="post" enctype="multipart/form-data">      
                <!-- IMAGEN -->
                <div class="form-group col-md-12 ">
                  <div class="input-group mb-3">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input"  name="imgPerfil" id="imgPerfil" aria-describedby="imgPerfil">
                        <label class="custom-file-label" for="imgPerfil">Agrega una foto de perfil...</label>
                      </div>
                  </div>
                    
                </div>
                
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  <input type="submit" class="btn btn-success" name="btnFotoPerfilEditar" value="Aceptar">
          </form>

        </div>
      </div>
    </div>
  </div>