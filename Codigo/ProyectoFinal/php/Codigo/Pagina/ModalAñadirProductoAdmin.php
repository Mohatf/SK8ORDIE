<!-- Este es el modal para añadir productos -->
<?php
require '../../DAOS/DAOCategorias.php';
$listarCategorias=listarCategorias($conexion);
?>
<div class="modal fade " id="modalAñadirProductoAdmin" tabindex="-1" aria-labelledby="modalAñadirProductoAdminLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalAñadirProductoAdminLabel">SK8 OR DIE</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body px-4 py-4">
            <form action="AddProductoAdmin.php" id="formularioAñadirProductoAdmin" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <input class="form-control" type="text" placeholder="Nombre del producto." name="nombreProducto" id="nombreProducto" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <input class="form-control" type="number" step="0.01" min="0"  placeholder="Precio del producto." name="precioProducto" id="precioProducto" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <textarea class="form-control" id="descripcionProducto" name="descripcionProducto" placeholder="Descripción del producto." rows="3" required></textarea>
                        </div>
                        <div class="col-md-6 form-group">
                            <input class="form-control" type="number" min="0"  placeholder="Stock del producto." name="stockProducto" id="stockProducto" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <select class="custom-select" id="categoriaProducto" name="categoriaProducto" required>
                            <option value="">Elige una categoría</option>
                                <?php
                                    while($cat=mysqli_fetch_assoc($listarCategorias)){
                                ?>
                                <option value="<?php echo $cat["idCategoria"];?>"><?php echo $cat["NombreCategoria"];?></option>
                                <?php
                                    }
                                ?>
                              </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="input-group mb-3">
                            
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imagenProducto" name="imagenProducto" aria-describedby="imagenProducto" required>
                                    <label class="custom-file-label" for="imagenProducto">Selecciona una imagen para el producto.</label>
                                </div>
                            </div>          
                        </div>
                    </div>

                    <?php
                        if(isset($_GET['error']) && $_GET['error'] == "nombreExiste"){ 
                        echo "<script>$(document).ready(function(){swal('SK8 OR DIE', 'El nombre que ha introducido ya pertenece a un producto.', 'error');})</script>";
                            
                    }?>
                       
        
                <div class="modal-footer">
                    <button class="botonEnviar btn btn-success" name="botonEnviar">Añadir</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    
            </form>

            </div>
        </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>