<?php
require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOProductos.php';
require '../../DAOS/DAOUsuario.php';
$conexion = conectar(true);
session_start();
$idUsuario= $_SESSION['idUsuarios'];

$buscarEnCarrito= mysqli_fetch_assoc(obtenerPrecioTotalCarrito($conexion, $idUsuario));
$precioTotal= $buscarEnCarrito['PrecioTotal'];


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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>SK8 OR DIE</title>
</head>

<body class="body">

  <!-- //Llamamos al menú -->
    <?php include 'menu.php'; ?>
    <section class="section-adminUsers">
        <div>
            <div class="jumbotron text-center ">
                <div class="container">
                    <h1 class="display-4" style="font-size: 4.5vw;">Compra realizada con exito. </h1>
                    <hr>
                    <br>
                    <h2>Total pagado <?php echo $precioTotal; ?> €</h2>
                    <br>
                    <a href="home.php" class="btn btn-success btn-lg">Ir al home</a>
                    <div class="d-block d-sm-block d-md-none"><br></div>
                    <a href="Carrito.php" class="btn btn-primary btn-lg">Volver al carrito</a>
                </div>
            </div>
            
        </div><br>
    </section>

    <script src="../../../js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>