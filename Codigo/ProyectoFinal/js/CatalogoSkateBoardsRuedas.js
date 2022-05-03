$(document).ready(function(){
    mostrarProductos();
    function mostrarProductos(){
        
        $.ajax({
            url: 'MostrarSkateBoardsRuedas.php',
            type: 'POST',
            async:false,
            success: function (response){
                
                $('#listaProductos').html(response);
            }
        })
    
    }
    $('#search').keyup(function(e){
        
        let search= $('#search').val();
        $.ajax({
            url: 'BusquedaSkateBoardsRuedas.php',
            type: 'POST',
            data: {search:search},
            success: function (response){
             
                if(response=='0'){
                    
                    $('#listaProductos').html('<p class="productoNoEncontrado">No se han encontrado registros. :( </p>');
                }else{
                    
                    $('#listaProductos').html(response);
                }

            }
        })
    })
    $('#filtroPrecioBtn').click(function(e){
        e.preventDefault();
        let filtroPrecio= $('#filtroPrecio').val();
        $.ajax({
            url: 'FiltradoPrecioSkateBoardsRuedas.php',
            type: 'POST',
            data: {filtroPrecio:filtroPrecio},
            success: function (response){
             
                if(response=='0'){
                    
                    $('#listaProductos').html('<p class="productoNoEncontrado">No se han encontrado registros. :( </p>');
                }else{
                    
                    $('#listaProductos').html(response);
                }

            }
        })
    })
    
    $(document).on('click','.btnAñadirProducto', function(e){
        e.preventDefault();
        let idProducto= $(this).attr('data-id');
        let stock= $(this).attr('data-stock');
        let precio= $(this).attr('data-precio');
        $.ajax({
            url: 'AddCarrito.php',
            type: 'POST',
            data: {'idProducto':idProducto, 'stock':stock,'precio':precio},
            async:false,
            success: function (response){
                mostrarNumCarrito();
                if(response==="CantidadExcedida"){
                    swal('SK8 OR DIE', 'Ya no hay más unidades de este producto.', 'error');
                }else if(response==="SinStock"){
                    swal('SK8 OR DIE', '¡Oh! Lo sentimos, el stock de este producto es 0.', 'error');
                }
            }
        })
    });
    $('#btnAñadirProductoSinSesion').click(function(e){
        e.preventDefault();
        swal('SK8 OR DIE', 'Debes iniciar sesión para poder añadir productos a tu carrito.', 'error');
    })

    function mostrarNumCarrito(){
        $.ajax({
            url:'MostrarNumCarrito.php',
            type:'GET',
            success: function usuario(response){
                let nuemero=parseInt(response);
                document.getElementById('numeroCarrito').innerHTML=nuemero;
            
            
            }
        })
    }

});