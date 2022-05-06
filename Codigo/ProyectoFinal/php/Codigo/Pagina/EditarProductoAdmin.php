<?php
require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';
require '../../DAOS/DAOCategorias.php';
require '../../DAOS/DAOProductos.php';
$conexion = conectar(true);
$listarCategorias=listarCategorias($conexion);
$idProducto=$_GET['idProducto'];
$listarProductos=listarProductoId($conexion, $idProducto);
$producto=mysqli_fetch_assoc($listarProductos);
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/AdminUsuarios.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="../../../imagenes/icono-ventana1.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>SK8 OR DIE</title>
</head>

<body class="body">

  <!-- //Llamamos al menú -->
    <?php include 'menu.php'; ?>
    <section class="section-adminUsers">
    <div class="container">
            <div class="row mb-4 ">
                <h1 class="titleAdminUser">EDITAR PRODUCTO <i class="fas fa-cogs"></i></h1>
            </div>
            <div class="row mb-2">
                <form action="ConfirmarEdicionProductoAdmin.php?idProducto=<?php echo $idProducto?>" id="formularioEditarProductoAdmin" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                        <div class="col-md-12 form-group" style="display:flex; justify-content:center; align-items: center;">
                            <img  src="data:image/jpeg;base64,<?php echo base64_encode($producto['Imagen']);?>" width="40px" heigth="40px">
                            </div>
                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" placeholder="Nombre del producto." name="nombreProducto" id="nombreProducto" value="<?php echo $producto['NombreProducto'] ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <input class="form-control" type="number" step="0.01" min="0"  placeholder="Precio del producto." name="precioProducto" id="precioProducto" value="<?php echo $producto['Precio'] ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea class="form-control" id="descripcionProducto" name="descripcionProducto" placeholder="Descripción del producto." rows="3"><?php echo $producto['Descripcion'] ?></textarea>
                            </div>
                            <div class="col-md-6 form-group">
                                <input class="form-control" type="number" min="0"  placeholder="Stock del producto." name="stockProducto" id="stockProducto" value="<?php echo $producto['Stock'] ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <select class="custom-select" id="categoriaProducto" name="categoriaProducto">
                                <option value="<?php echo $producto["idCategoriaFK"];?>"><?php echo $producto["NombreCategoria"];?></option>
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
                                        <input type="file" class="custom-file-input" id="imagenProducto" name="imagenProducto" aria-describedby="imagenProducto" value="<?php echo $producto[''] ?>">
                                        <label class="custom-file-label" for="imagenProducto">Selecciona una imagen para el producto.</label>
                                    </div>
                                </div>          
                            </div>
                        </div>  
                        <div class="col-md-12 ">
                            <input type="submit" class=" btn btn-success col-md-12" name="botonEnviar" value="Guardar cambios">
                            <button class=" btn btn-danger col-md-12 mt-2 botonVolver" name="botonVolver"><a href="AdministracionProductos.php" style="color:white;text-decoration:none;">Volver al panel de administración</a></button>
                        </div>
                        
                </form>

             
            </div>
           
        </div>
    </section>
    <script src="../../../js/AdministrarProductos.js"></script>   
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../../js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>