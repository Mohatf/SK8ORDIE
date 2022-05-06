<?php 

require '../../DAOS/conectorBD.php';
require '../../DAOS/DAOProductos.php';
$conexion = conectar(true);
session_start();
$valor1=0;
$valor2=$_POST['filtroPrecio'];
$salida='';
$categoria=6;
$listarProductos=filtrarPrecioProductos($conexion, $valor1,$valor2,$categoria);

if(mysqli_num_rows($listarProductos)==0){
    echo '0';
}else{
    while($productos=mysqli_fetch_array($listarProductos)){
        if($_SESSION['usuarioConectado']==true){
            $salida='
            <div class="card cartaCatalogo my-3">
            <img  src="data:image/jpeg;base64,'.base64_encode($productos['Imagen']).'" class="mx-auto mt-2 d-block imagenCard"/>
                <div class="card-body">
                    <h5 class="product-name">'.$productos['NombreProducto'].'</h5>
                        <p style="margin-bottom:0px;">Precio: '. $productos['Precio'].'€</p>
                        <p style="margin-bottom:0px;">Stock: '. $productos['Stock'].'</p>
                        <p><b>'. $productos['NombreCategoria'].'</b></p>
                     <div class="row card-btn">
                         <div><a href="DetallesProductoSkateBoardsCompletos.php?id='.$productos['idProductos'].'" class="btn detalles  my-2 mx-2" >Detalles </a></div>
                         <div><a href="#" data-stock="'.$productos['Stock'].'" data-precio="'.$productos['Precio'].'" data-id="'.$productos['idProductos'].'" id="btnAñadirProducto" name="btnAñadirProducto" class="btn btn-addCar  my-2 mx-2 btnAñadirProducto">Añadir <i class="fas fa-cart-plus"></i></a></div>
                     </div>   
                    
                </div>
            </div>
            ';
        }else if($_SESSION['usuarioConectado']==false){
            $salida='
            <div class="card cartaCatalogo my-3">
            <img  src="data:image/jpeg;base64,'.base64_encode($productos['Imagen']).'" class="mx-auto mt-2 d-block imagenCard"/>
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
}

?>
