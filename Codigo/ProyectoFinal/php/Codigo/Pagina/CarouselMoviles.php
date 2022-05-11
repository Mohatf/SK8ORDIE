<div class="d-block d-sm-block d-md-none col-md-12">
    <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        $buscarProductosRandom =  buscarProductosRandomMovil($conexion);
        $i = 0;
        $enlace="";
        while($productosRandom = mysqli_fetch_assoc($buscarProductosRandom)){
            $enlace="DetallesProductoSkateBoardsCompletos.php?id=".$productosRandom['idProductos'];
        ?>
        <div class="carousel-item <?php echo ($i == 0) ? 'active' : '';?>">
            <span style="font-size:25px; display: flex; justify-content: center; background: #fff; border: none;  color:black"><?php echo $productosRandom['NombreProducto'] ?></span>
            <span style="display: flex; justify-content: center; background: #fff; border: none;">
            <a href="<?php echo $enlace; ?>"> <img src="data:image/jpeg;base64,<?php echo base64_encode($productosRandom['Imagen']);?>"></a>
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