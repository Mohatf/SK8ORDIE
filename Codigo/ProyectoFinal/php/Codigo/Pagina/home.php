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
    <link rel="stylesheet" href="../../../css/home.css">
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
    <section class="section-home">
     
      <h1>Bienvenido a SK8 OR DIE</h1>

  </section>

  <section class="section-two">
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-md-3 d-none d-sm-none d-md-block">
          <h2 class="tituloHome text-center">EJES</h2>
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <?php
                  $buscarProductosRandom = buscarProductosRandomEjes($conexion);
                  $i = 0;
                  while($productosRandom = mysqli_fetch_assoc($buscarProductosRandom)){
                ?>
                <div class="carousel-item <?php echo ($i == 0) ? 'active' : '';?>">
                      <img src="data:image/jpeg;base64,<?php echo base64_encode($productosRandom['Imagen']);?>" width="100%" height="160px">
                    </span>
                </div>
                <?php
                    $i++;
                  }
                ?>
              </div>

              <button style="background: #fff; border: none;" class="carousel-control-prev rounded" type="button" data-target="#carouselExampleControls" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </button>
              <button style="background: #fff; border: none;" class="carousel-control-next rounded" type="button" data-target="#carouselExampleControls" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </button>
            </div>
        </div>
        <div class="col-md-6">
          <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <?php
                $buscarProductosRandom =  buscarProductosRandom($conexion);
                $i = 0;
                while($productosRandom = mysqli_fetch_assoc($buscarProductosRandom)){
              ?>
              <div class="carousel-item <?php echo ($i == 0) ? 'active' : '';?>">
                  <span style="font-size:25px; display: flex; justify-content: center; background: #fff; border: none;  color:black"><?php echo $productosRandom['NombreProducto'] ?></span>
                  <span style="display: flex; justify-content: center; background: #fff; border: none;">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($productosRandom['Imagen']);?>">
                  </span>
              </div>
              <?php
                  $i++;
                }
              ?>
            </div>

            <button style="background: #fff; border: none;" class="carousel-control-prev rounded" type="button" data-target="#carouselExampleControls1" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </button>
            <button style="background: #fff; border: none;" class="carousel-control-next rounded" type="button" data-target="#carouselExampleControls1" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </button>
          </div>
          
        </div>
        
        <div class="col-md-3 d-none d-sm-none d-md-block">
        <h1 class="tituloHome text-center">RUEDAS</h1>
        <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <?php
                $buscarProductosRandom = buscarProductosRandomRuedas($conexion);
                $i = 0;
                while($productosRandom = mysqli_fetch_assoc($buscarProductosRandom)){
              ?>
              <div class="carousel-item <?php echo ($i == 0) ? 'active' : '';?>">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($productosRandom['Imagen']);?>" width="100%" height="200px">
                  </span>
              </div>
              <?php
                  $i++;
                }
              ?>
            </div>

            <button style="background: #fff; border: none;" class="carousel-control-prev rounded" type="button" data-target="#carouselExampleControls2" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </button>
            <button style="background: #fff; border: none;" class="carousel-control-next rounded" type="button" data-target="#carouselExampleControls2" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include 'Footer.php;'?>              
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../../js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>