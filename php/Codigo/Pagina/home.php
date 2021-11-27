<?php
require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOUsuario.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../../../imagenes/icono-ventana1.png">
    <title>SK8 OR DIE</title>
</head>

<body>

  <h1>Esto es la página principal de <?php echo $_SESSION['Usuario'];?></h1>
  <h3><a href="../Login/desloguearse.php">pulsa aqui para cerrar sesion</a></h3>
</body>

</html>