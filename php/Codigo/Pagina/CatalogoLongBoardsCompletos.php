<?php 

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';
require '../../DAOS/DAOProductos.php';
$conexion = conectar(true);

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/SkateBoardsCompletos.css">
    <!-- <link rel="stylesheet" href="CSS/Normalize.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="../../../imagenes/icono-ventana1.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>SK8 OR DIE</title>
</head>

<body class="body" style="background:url('https://media.istockphoto.com/vectors/skateboard-seamless-pattern-background-vector-id688841062?k=20&m=688841062&s=170667a&w=0&h=YoBfKDBdgp4J081mdjuIkIIQg1KufRlsKFxmTUXVm1I=');">

  <!-- //Llamamos al menú -->
    <?php include 'menu.php'; ?>

        <div class="container contenedor rounded" >
            <div class="row tituloCatalogo">
                
                <p >LONGBOARDS COMPLETOS </p>
            </div>
            <div class="row px-5">
            <div class="form-group col-md-4">
                    <div class="input-group ">
                            <select class="custom-select" id="filtroPrecio">
                                <option selected>Todos</option>
                                <option value="5">0-5€</option>
                                <option value="10">0-10€</option>
                                <option value="50">0-50€</option>
                                <option value="100">0-100€</option>
                                <option value="500">0-500€</option>
                                <option value="1000">0-1000€</option>
                               
                            </select>
                            <div class="input-group-append">
                                <button class="btn" style="background-color:#23252b; color:white;"  id="filtroPrecioBtn" type="button">Filtrar<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                                <path d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                                </svg></button>
                            </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form >
                        <input class="form-control search" type="search" id="search" placeholder="Buscar..." aria-label="Search">
                    </form>
                </div>
            </div>
            
            <div id="listaProductos" class="row ml-5 mb-5 pb-5  contenedorCards"></div>
        </div>



  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../../js/menu.js"></script>
    <script src="../../../js/CatalogoLongBoardsCompleto.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>