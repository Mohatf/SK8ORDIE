<div class="col-md-3 d-none d-sm-none d-md-block">
    <h1 class="tituloHome text-center">RUEDAS</h1>
    <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        $buscarProductosRandom = buscarProductosRandomRuedas($conexion);
        $i = 0;
        while($productosRandom = mysqli_fetch_assoc($buscarProductosRandom)){
            $enlace="DetallesProductoSkateBoardsCompletos.php?id=".$productosRandom['idProductos'];
        ?>
        <div class="carousel-item <?php echo ($i == 0) ? 'active' : '';?>">
            <a href="<?php echo $enlace; ?>"><img src="data:image/jpeg;base64,<?php echo base64_encode($productosRandom['Imagen']);?>" width="100%" height="200px"></a>  
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