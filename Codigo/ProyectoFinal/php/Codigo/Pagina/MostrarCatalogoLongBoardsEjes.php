<?php 

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOProductos.php';
$conexion = conectar(true);
$salida='';
$categoria=7;
$listarProductos=listarProductosSegunCategoria($conexion, $categoria);
session_start();
while($productos=mysqli_fetch_array($listarProductos)){
    if($_SESSION['usuarioConectado']==true){
        $salida='
        <div class="card cartaCatalogo my-3">
        <img  src="data:image/jpeg;base64,'.base64_encode($productos['Imagen']).'" class="mx-auto mt-2 d-block " width="150px" height="100px"/>
            <div class="card-body">
                <h5 class="product-name">'.$productos['NombreProducto'].'</h5>
                 <p style="margin-bottom:0px;">Precio: '. $productos['Precio'].'€</p>
                 <p style="margin-bottom:0px;">Stock: '. $productos['Stock'].'</p>
                 <p><b>'. $productos['NombreCategoria'].'</b></p>
                 <div class="row card-btn">
                     <div><a href="DetallesProductoSkateBoardsCompletos.php?id='.$productos['idProductos'].'" class="btn detalles  my-2 mx-2" >Detalles </a> </div>
                     <div><a href="#" data-stock="'.$productos['Stock'].'" data-precio="'.$productos['Precio'].'" data-id="'.$productos['idProductos'].'" id="btnAñadirProducto" name="btnAñadirProducto" class="btn btn-addCar  my-2 mx-2 btnAñadirProducto">Añadir <i class="fas fa-cart-plus"></i></a></div>
                 </div>   
                
            </div>
        </div>
        ';
    }else if($_SESSION['usuarioConectado']==false){
        $salida='
        <div class="card cartaCatalogo my-3">
        <img  src="data:image/jpeg;base64,'.base64_encode($productos['Imagen']).'" class="mx-auto mt-2 d-block" width="150px" height="100px"/>
            <div class="card-body">
                <h5 class="product-name">'.$productos['NombreProducto'].'</h5>
                 <p style="margin-bottom:0px;">Precio: '. $productos['Precio'].'€</p>
                 <p style="margin-bottom:0px;">Stock: '. $productos['Stock'].'</p>
                 <p><b>'. $productos['NombreCategoria'].'</b></p>
                 <div class="row card-btn">
                     <div><a href="DetallesProductoSkateBoardsCompletos.php?id='.$productos['idProductos'].'" class="btn detalles  my-2 mx-2" >Detalles </a></div>
                     <div><a href="#" id="btnAñadirProductoSinSesion" name="btnAñadirProductoSinSesion" class="btn btn-addCar  my-2 mx-2">Añadir<i class="fas fa-cart-plus"></i></a></div>
                 </div>   
                
            </div>
        </div>
        ';
    }
    echo $salida;
}

?>


