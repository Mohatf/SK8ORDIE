<?php 

require '../../DAOS/conectorBD.php';

require '../../DAOS/DAOProductos.php';

$conexion = conectar(true);

session_start();

$idProducto=$_GET['id'];
$producto=mysqli_fetch_assoc(listarProductoId($conexion, $idProducto));

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
        
            <div class="row">
                <div class="col-md-6">
                
                    <h2><strong><?php echo $producto['NombreProducto'];?></strong></h2><br>
                    <h4 style="margin-left: 10px;"><b>Precio: </b><?php echo $producto['Precio'];?>€</h4>
                    <h4 style="margin-left: 10px;"><b>Stock: </b><?php echo $producto['Stock'];?> ud.</h4>
                    <h4 style="margin-left: 10px;"><b>Categoría: </b><?php echo $producto['NombreCategoria'];?></h4><br>
                    <div style="margin-left: 10px;">
                    <?php if($_SESSION['usuarioConectado']==true){ ?>
                      
                        <div><a href="#" data-stock="<?php echo $producto['Stock'];?>" data-precio="<?php echo $producto['Precio'];?>" data-id="<?php echo $producto['idProductos'];?>" id="btnAñadirProducto" name="btnAñadirProducto" class="col-md-6 btn btn-addCar btn-success  btnAñadirProducto">Añadir <i class="fas fa-cart-plus"></i></a></div>
                    <?php } ?>
                    <?php if($_SESSION['usuarioConectado']==false){ ?>
                        <div><a href="#" id="btnAñadirProductoSinSesion" name="btnAñadirProductoSinSesion" class="col-md-6 btn btn-addCar btn-success  btnAñadirProducto">Añadir <i class="fas fa-cart-plus"></i></a></div>
                    <?php } ?>
                    <div class="d-block d-sm-block d-md-none"><br></div>
                    </div>
                         
                </div>
                <div class="col-md-6">
                    <span style="display: flex; justify-content: center; background: #fff; border: solid black 2px; padding:5px;">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($producto['Imagen']);?>">
                    </span></div>
            </div>
            
        </div><br><br>
        <h3>Descripción</h3><hr>
        <p><?php echo $producto['Descripcion'];?></p>
    </section>
  
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../../js/menu.js"></script>
    <script src="../../../js/CatalogoSkateBoardsCompleto.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>