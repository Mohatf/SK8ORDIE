<?php 
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: home.php");
    exit;
}
require '../../DAOS/conectorBD.php';

require '../../DAOS/DAOCategorias.php';

$conexion = conectar(true);

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
                <h1 class="titleAdminUser">LISTADO DE CATEGORÍAS <i class="fa fa-list"></i></h1>
            </div>
            <div class="row mb-2">
                <div class="form-group col-md-3">
                    <div class="input-group mb-3">
                            <select class="custom-select" id="categorias">
                                <option selected>Todos</option>
                                <option value="1">Skateboards Completos</option>
                                <option value="2">Skateboards Tablas</option>
                                <option value="3">Skateboards Ejes</option>
                                <option value="4">Skateboard Ruedas</option>
                                <option value="5">Longboards Completos</option>
                                <option value="6">Longboards Tablas</option>
                                <option value="7">Longboards Ejes</option>
                                <option value="8">Longboards Ruedas</option>
                                <option value="9">Wabeboards</option>

                               
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary"  id="filtro" type="button">Filtrar<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                                <path d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                                </svg></button>
                            </div>
                    </div>
                </div>
                <div class="col-md-6"></div>
                
                <div class="form-group col-md-3">
                    <form >
                        <input class="form-control search" type="search" id="search" placeholder="Buscar..." aria-label="Search">
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive rounded col-md-12 text-center">
                    <table class="table" id="tabla">
                        <thead class="bg-light text-center">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">CATEGORÍA</th>
                            </tr>
                        </thead>
                        
                        <tbody id='listaCategorias' class="bg-light rounded"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="../../../js/AdministrarCategorias.js"></script>   
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../../js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>