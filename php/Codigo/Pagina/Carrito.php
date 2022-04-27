<?php 

require '../../DAOS/conectorBD.php';

require '../../DAOS/DAOProductos.php';

require '../../DAOS/DAOUsuario.php';
$conexion = conectar(true);
session_start();

$buscarUsuarioDireccion=buscarUsuarioID($conexion, $_SESSION['idUsuarios']);
$usuarioDireccion= mysqli_fetch_assoc($buscarUsuarioDireccion);

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
        <div class="container">
            <div class="row mb-5">
                <h1 class="titleAdminUser">ESTE ES TU CARRITO DE COMPRAS<i class="fas fa-cart-arrow-down"></i></h1>
            </div>
            <div class="row mt-5">
                <div class="table-responsive rounded col-md-12">
                    <table class="table" id="tabla">
                        <thead class="bg-light text-center">
                            <tr>
                            <th scope="col">NOMBRE DEL PRODUCTO</th>
                            <th scope="col">CANTIDAD</th>
                            <th scope="col">STOCK</th>
                            <th scope="col">PRECIO</th>
                            <th scope="col">CATEGORÍA</th>
                            <th scope="col">ACCIONES</th>
                            </tr>
                        </thead>
                        
                        <tbody  id='listaProductos' class="bg-light rounded text-center">
                            
                        </tbody>
                        <tbody class="bg-light rounded text-center">
                        <tr>
                                <td><strong>Precio Total:</strong> </td>
                                <td><span id="precioTotal"></span> €</td>
                                <td id="filaRealizarPago"><td>
                                <td><button class="btn btn-danger btnVaciarCarrito">Vaciar el carrito <i class="fas fa-times"></i></button><td>
                            <tr>
                        </tbody>
                    </table>

                   
                </div>
            </div>
        </div>
        <?php
            if(isset($_GET['error']) && $_GET['error'] == "01x32"){ 
            echo "<script>swal('SK8 OR DIE', '¡Upss! Parece que algunos de tus productos están fuera de stock o la cantidad es mayor que el stock. Compruebalos y vuelve a intentarlo.', 'error');</script>";
                        
        }?>
        <?php include 'ModalDireccionAlPagar.php'; ?>
    </section>
    <script src="../../../js/CarritoCompras.js"></script>   
    <script src="../../../js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>