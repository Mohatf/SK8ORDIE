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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
                <h1 class="titleAdminUser">¿QUÍENES SOMOS? </h1>
            </div>
            <div class="row">
               <p>
                    SK8 OR DIE se fundó en 2022 y es hoy una de las tiendas de deportes de acción online más importantes a nivel 
                    internacional, con una amplia oferta a disposición de nuestros clientes que incluye material y accesorios relacionada 
                    con el mundo del skateboarding. SkatePro vende y entrega productos solo en España, la empresa cuenta con más de 300 
                    dedicados trabajadores con un gran interés, conocimiento y experiencia en el mundo de los deportes de acción.
                    Nos esforzamos continuamente para ser una empresa fiable, profesional y competente, en lo referente a la venta de 
                    artículos, servicios, asesoramiento, y en la manera de tratar a nuestros clientes. 
                    Además, nuestra misión es desarrollar y apoyar los deportes de acción, e inspirar a gente de todas las edades a 
                    practicar nuestra pasión en cualquier parte del mundo. Por este motivo, patrocinamos más de 200 iniciativas y 
                    eventos cada año y, al mismo tiempo, hemos construido nuestro propio equipo de skate, que cuenta con más de 50 perfiles 
                    y atletas del más alto nivel en varias partes del mundo.
                    SK8 OR DIE tiene su sede en Melilla, donde es posible visitar y comprar en nuestras instalaciones.
               </p>
            </div>
        </div>
       
    </section>  
    <?php include 'Footer.php'; ?>  
    <script src="../../../js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>