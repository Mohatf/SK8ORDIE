<?php 
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
                <h1 class="titleAdminUser">MAPA DEL SITIO SK8 OR DIE <i class="fa-solid fa-sitemap"></i></h1>
            </div>
            <div class="row">
                <ul>
                    
                    <li> <a href="home.php">Inicio</a> </li>
                    <li> <a href="CatalogoSkateBoardsCompleto.php">Skateboards Completos</a> </li>
                    <li> <a href="CatalogoSkateBoardsTablas.php">Skateboards Tablas</a> </li>
                    <li> <a href="CatalogoSkateBoardsEjes.php">Skateboards Ejes</a> </li>
                    <li> <a href="CatalogoSkateBoardsRuedas.php">Skateboards Ruedas</a> </li>
                    <li> <a href="CatalogoLongBoardsCompletos.php">Longboards Completos</a> </li>
                    <li> <a href="CatalogoLongBoardsTablas.php">Longboards Tablas</a> </li>
                    <li> <a href="CatalogoLongBoardsEjes.php">Longboards Ejes</a> </li>
                    <li> <a href="CatalogoLongBoardsRuedas.php">Longboards Ruedas</a> </li>
                    <li> <a href="CatalogoWaveboards.php">Waveboards</a> </li>
                    <li> <a href="CatalogoAccesorios.php">Accesorios</a> </li>
                    <li> <a href="SobreNosotros.php">Sobre Nosotros</a> </li>
                 
                        
                </ul> 
        </div>
       
    </section>  
    <script src="../../../js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>