<?php 
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: home.php");
    exit;
}

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';

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
    <!-- <link rel="stylesheet" href="CSS/Normalize.css"> -->
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
                <h1 class="titleAdminUser">ADMINISTRACIÓN DE USUARIOS <i class="fas fa-cogs"></i></h1>
            </div>
            <div class="row mb-2">
                <div class="form-group col-md-3">
                    <div class="input-group mb-3">
                            <select class="custom-select" id="categorias">
                                <option selected>Todos</option>
                                <option value="Admin">Administradores</option>
                                <option value="Usuario">Usuario</option>
                               
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary"  id="filtro" type="button">Filtrar<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                                <path d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                                </svg></button>
                            </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <button data-toggle="modal" data-target="#modalAñadirUsuarioAdmin" class="btn btn-success col-md-12 mb-4"><i class="fas fa-user-plus"></i> Añadir usuario</button>
                    
                </div>
                
                <div class="form-group col-md-3">
                    <form >
                        <input class="form-control search" type="search" id="search" placeholder="Buscar..." aria-label="Search">
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive rounded col-md-12">
                    <table class="table" id="tabla">
                        <thead class="bg-light text-center">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">USUARIO</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">PRIMER APELLIDO</th>
                            <th scope="col">SEGUNDO APELLIDO</th>
                            <th scope="col">DNI</th>
                            <th scope="col">TELEFONO</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">DIRECCIÓN</th>
                            <th scope="col">COMUNIDAD AUTÓNOMA</th>
                            <th scope="col">PROVINCIA</th>
                            <th scope="col">CIUDAD</th>
                            <th scope="col">CÓDIGO POSTAL</th>
                            <th scope="col">ROL</th>
                            <th scope="col">ACCIONES</th>

                            </tr>
                        </thead>
                        
                        <tbody id='listaUsuarios' class="bg-light rounded"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <?php include 'ModalAñadirUsuarioAdmin.php'; ?>
    <?php include 'ModalEditarUsuarioAdmin.php'; ?>
    <script src="../../../js/AdministrarUsuarios.js"></script>   
    <script src="../../../js/FormularioAñadirUsuarioAdmin.js"></script>  
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../../js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>