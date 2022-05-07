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
    <link rel="stylesheet" href="../../../css/Administracion.css">
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
    <section class="section-administracion">
     
      <div class="botonesAdministracion">
        <a class="enlaceUsuarios" href="#">
            <span class="span1"></span>
            <span class="span2"></span>
            <span class="span3"></span>
            <span class="span4"></span>
            Usuarios
        </a>
        <a class="enlaceProductos" href="#">
            <span class="span1"></span>
            <span class="span2"></span>
            <span class="span3"></span>
            <span class="span4"></span>
            Productos
        </a>
        <a class="enlaceCategorias" href="#">
            <span class="span1"></span>
            <span class="span2"></span>
            <span class="span3"></span>
            <span class="span4"></span>
            Categorías
        </a>
      </div>

  </section>

    <script>
        $(document).ready(function(){
            $('.enlaceUsuarios').click(function(){
                setTimeout(function(){location.href="AdministracionUsuarios.php"} , 1000)
            })
            $('.enlaceProductos').click(function(){
                setTimeout(function(){location.href="AdministracionProductos.php"} , 1000)
            })
            $('.enlaceCategorias').click(function(){
                setTimeout(function(){location.href="AdministrarCategorias.php"} , 1000)
            })
        })
    </script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../../js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>