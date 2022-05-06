$(document).ready(function(){
    mostrarCategorias();
    function mostrarCategorias(){
        $.ajax({
            url: 'MostrarCategoriasAdmin.php',
            type: 'GET',
            success: function (response){
            let categorias = JSON.parse(response);
            let template = '';
            categorias.forEach(categoria =>{
                template += `
                    <tr>
                        <td>${categoria.id}</td>
                        <td>${categoria.nombreCategoria}</td>
                        <td>
                            <button class="btn btn-primary btnEditarCategoria col-md-12"  data-id='${categoria.id}'><i class="fas fa-pen"></i></button> 
                        </td>
                    </tr>
                `  
            });
            $('#listaCategorias').html(template);

            }
        })
    }
    $(document).on('click','.btnEditarCategoria', function(){
        let idCategoria= $(this).attr('data-id');
        mostrarAlertModificarNombreCategoria(idCategoria);
        
    });

    function mostrarAlertModificarNombreCategoria(idCategoria){
        swal("Editar nombre de la categoría", {
            // ESPECIFICAMOS QUE CONTENIDO QUEREMOS QUE TENGA
            content: {
                element: "input",
                attributes: {
                name: "categoriaModificar",
                placeholder: "Escribe un nuevo nombre para la categoría ...",
                
                
                },
            },
            //BOTONES
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
                // SI RECIBE EL VALOR aceptar QUE EJECUTE LA SIGUIENTE FUNCION POST  
            case "aceptar":
                $.post('EditarNombreCategoriaAdmin.php', {'categoria':`${$('input[name=categoriaModificar]').val()}`, 'idCategoria':`${idCategoria}`}, function(response){
                    mostrarCategorias();
                    if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe un nombre de categoría.", "error");
                    }else if(response=="Error"){
                        swal("SK8 OR DIE", "Ya hay una categoría con ese nombre.", "error");
                    }else{
                        swal("SK8 OR DIE", "¡El nombre de la categoría se ha actualizado correctamente!", "success");
                    }
                });
                
                break;
                
            }
        });
    }



    $('#search').keyup(function(e){
        let search= $('#search').val();
        $.ajax({
            url: 'BusquedaCategoriasAdmin.php',
            type: 'POST',
            data: {search:search},
            success: function (response){
                
                if(response=='0'){
                    let registrosNulos='<tr><td class="text-center" colspan="10">No se han encontrado registros. :(</td></tr>'
                    $('#listaCategorias').html(registrosNulos);
                }else{
                    let categorias = JSON.parse(response);
                    let template = '';
                    categorias.forEach(categoria =>{
                        template += `
                            <tr>
                                <td>${categoria.id}</td>
                                <td>${categoria.nombreCategoria}</td>
                                <td>
                                    <button class="btn btn-primary btnEditarCategoria col-md-12"  data-id='${categoria.id}'><i class="fas fa-pen"></i></button> 
                                </td>
                            </tr>
                        `  
                    });
                    $('#listaCategorias').html(template);
                }

            }
        })
    })

    
    $('#filtro').click(function(e){
        let categoria= $('#categorias').val();
        $.ajax({
            url: 'FiltrarCategorias.php',
            type: 'POST',
            data: {categoria:categoria},
            success: function (response){
                let categorias = JSON.parse(response);
                let template = '';
                categorias.forEach(categoria =>{
                    template += `
                        <tr>
                            <td>${categoria.id}</td>
                            <td>${categoria.nombreCategoria}</td>
                            <td>
                                <button class="btn btn-primary btnEditarCategoria col-md-12"  data-id='${categoria.id}'><i class="fas fa-pen"></i></button> 
                            </td>
                        </tr>
                    `  
                });
                $('#listaCategorias').html(template);

            }
        })
    })


  
});