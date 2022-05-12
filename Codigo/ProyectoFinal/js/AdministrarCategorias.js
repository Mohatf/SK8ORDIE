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
                        
                    </tr>
                `  
            });
            $('#listaCategorias').html(template);

            }
        })
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
                        </tr>
                    `  
                });
                $('#listaCategorias').html(template);

            }
        })
    })


  
});