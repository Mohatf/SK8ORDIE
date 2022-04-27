$(document).ready(function(){
    mostrarProductos();
    function mostrarProductos(){
        $.ajax({
            url: 'MostrarProductosAdmin.php',
            type: 'GET',
            success: function (response){
            let productos = JSON.parse(response);
            let template = '';
            productos.forEach(producto =>{
                template += `
                    <tr>
                        <td>${producto.id}</td>
                        <td>${producto.nombreProducto}</td>
                        <td>${producto.stock}</td>
                        <td>${producto.precio}</td>
                        <td><div style="height:25px;width:400px;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;">${producto.descripcion}</div></td>
                        <td>${producto.idCategoriaFK}</td>
                        <td>${producto.nombreCategoria}</td>
                        <td class="columnaAcciones">
                            <button class="btn btn-primary btnEditarProducto" data-id='${producto.id}'><i class="fas fa-pen"></i></button>
                            <button class="btn btn-danger btnEliminarProducto"  data-id='${producto.id}'><i class="far fa-trash-alt"></i></button>
                           
                        </td>
                    </tr>
                `  
            });
            $('#listaProductos').html(template);

            }
        })
    }
    $(document).on('click','.btnEditarProducto', function(){
        let idProducto= $(this).attr('data-id');
        window.location.href='EditarProductoAdmin.php?idProducto='+idProducto;
        
    });
    $(document).on('click','.btnEliminarProducto', function(){
        let idProducto= $(this).attr('data-id');
        mostrarAlertBorrarProducto(idProducto);
        
    });

    function mostrarAlertBorrarProducto(idProducto){
        // TEXTO DEL ALERT
        swal("¿Estás seguro de eliminar este producto?", {
            // BOTONES
            buttons: {
                catch: {
                    text: "Confirmar",
                    value: "aceptar",
                    },
                cancel: "Cancelar",
            
            },
        })
        .then((value) => {
            switch (value) {
        
            case "aceptar":
                // SI RECIBE EL VALOR aceptar QUE EJECUTE LA SIGUIENTE FUNCION POST 
                $.post('EliminarProductoAdmin.php', {'idProducto':idProducto}, function(response){
                    mostrarProductos();
                });
                swal("SK8 OR DIE", "¡El producto se ha eliminado correctamente!", "success");
                break;

            }
        });
    }

    $('#search').keyup(function(e){
        let search= $('#search').val();
        $.ajax({
            url: 'BusquedaProductosAdmin.php',
            type: 'POST',
            data: {search:search},
            success: function (response){
                
                if(response=='0'){
                    let registrosNulos='<tr><td class="text-center" colspan="10">No se han encontrado registros. :(</td></tr>'
                    $('#listaProductos').html(registrosNulos);
                }else{
                    let productos = JSON.parse(response);
                    let template = '';
                   productos.forEach(producto =>{
                        template += `
                        <tr>
                            <td>${producto.id}</td>
                            <td>${producto.nombreProducto}</td>
                            <td>${producto.stock}</td>
                            <td>${producto.precio}</td>
                            <td><div style="height:25px;width:400px;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;">${producto.descripcion}</div></td>
                            <td>${producto.idCategoriaFK}</td>
                            <td>${producto.nombreCategoria}</td>
                            <td class="columnaAcciones">
                                <button class="btn btn-primary btnEditarProducto"  data-id='${producto.id}'><i class="fas fa-pen"></i></button>
                                <button class="btn btn-danger btnEliminarProducto"  data-id='${producto.id}'><i class="far fa-trash-alt"></i></button>
                                
                            </td>
                        </tr>
                        `  
                    });
                    $('#listaProductos').html(template);
                }

            }
        })
    })

    
    $('#filtro').click(function(e){
        let categoria= $('#categorias').val();
        $.ajax({
            url: 'FiltrarProductos.php',
            type: 'POST',
            data: {categoria:categoria},
            success: function (response){
                let productos = JSON.parse(response);
                let template = '';
                productos.forEach(producto =>{
                    template += `
                    <tr>
                        <td>${producto.id}</td>
                        <td>${producto.nombreProducto}</td>
                        <td>${producto.stock}</td>
                        <td>${producto.precio}</td>
                        <td><div style="height:25px;width:400px;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;">${producto.descripcion}</div></td>
                        <td>${producto.idCategoriaFK}</td>
                        <td>${producto.nombreCategoria}</td>
                        <td class="columnaAcciones">
                            <button class="btn btn-primary btnEditarProducto"  data-id='${producto.id}'><i class="fas fa-pen"></i></button>
                            <button class="btn btn-danger btnEliminarProducto"  data-id='${producto.id}'><i class="far fa-trash-alt"></i></button>
                            
                        </td>
                    </tr>
                    `  
                });
                $('#listaProductos').html(template);

            }
        })
    })
  
});