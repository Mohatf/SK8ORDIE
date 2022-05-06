$(document).ready(function(){
            mostrarUsuarios();
            function mostrarUsuarios(){
                $.ajax({
                    url: 'MostrarUsuariosAdmin.php',
                    type: 'GET',
                    success: function (response){
                    let usuarios = JSON.parse(response);
                    let template = '';
                    usuarios.forEach(usuario =>{
                        template += `
                            <tr>
                                <td>${usuario.id}</td>
                                <td>${usuario.usuario}</td>
                                <td>${usuario.nombre}</td>
                                <td>${usuario.primerApellido}</td>
                                <td>${usuario.segundoApellido}</td>
                                <td>${usuario.dni}</td>
                                <td>${usuario.telefono}</td>
                                <td>${usuario.email}</td>
                                <td>${usuario.direccion}</td>
                                <td>${usuario.comunidadAutonoma}</td>
                                <td>${usuario.provincia}</td>
                                <td>${usuario.ciudad}</td>
                                <td>${usuario.codigoPostal}</td>
                                <td>${usuario.rol}</td>
                                <td class="columnaAcciones">
                                    <button class="btn btn-primary btnEditarUsuario"  data-id='${usuario.id}'><i class="fas fa-pen"></i></button>
                                    <button class="btn btn-danger btnEliminarUsuario"  data-id='${usuario.id}'><i class="far fa-trash-alt"></i></button>
                                   
                                </td>
                            </tr>
                        `  
                    });
                    $('#listaUsuarios').html(template);

                    }
                })
            }
            $(document).on('click','.btnEditarUsuario', function(){
                let idUsuario= $(this).attr('data-id');
                window.location.href='EditarUsuarioAdmin.php?idUsuario='+idUsuario;
                
            });
            $(document).on('click','.btnEliminarUsuario', function(){
                let idUsuario= $(this).attr('data-id');
                mostrarAlertBorrarUsuario(idUsuario);
                
            });

            function mostrarAlertBorrarUsuario(idUsuario){
                // TEXTO DEL ALERT
                swal("¿Estás seguro de eliminar este usuario?", {
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
                        $.post('EliminarUsuario.php', {'idUsuario':idUsuario}, function(response){
                            mostrarUsuarios();
                        });
                        swal("SK8 OR DIE", "¡El usuario se ha eliminado correctamente!", "success");
                        break;
        
                    }
                });
            }

            $('#search').keyup(function(e){
                let search= $('#search').val();
                $.ajax({
                    url: 'BusquedaUsuarios.php',
                    type: 'POST',
                    data: {search:search},
                    success: function (response){
                        
                        if(response=='0'){
                            let registrosNulos='<tr><td class="text-center" colspan="10">No se han encontrado registros. :(</td></tr>'
                            $('#listaUsuarios').html(registrosNulos);
                        }else{
                            let usuarios = JSON.parse(response);
                            let template = '';
                            usuarios.forEach(usuario =>{
                                template += `
                                    <tr>
                                        <td>${usuario.id}</td>
                                        <td>${usuario.usuario}</td>
                                        <td>${usuario.nombre}</td>
                                        <td>${usuario.primerApellido}</td>
                                        <td>${usuario.segundoApellido}</td>
                                        <td>${usuario.dni}</td>
                                        <td>${usuario.telefono}</td>
                                        <td>${usuario.email}</td>
                                        <td>${usuario.direccion}</td>
                                        <td>${usuario.comunidadAutonoma}</td>
                                        <td>${usuario.provincia}</td>
                                        <td>${usuario.ciudad}</td>
                                        <td>${usuario.codigoPostal}</td>
                                        <td>${usuario.rol}</td>
                                        <td class="columnaAcciones">
                                            <button class="btn btn-primary btnEditarUsuario"  data-id='${usuario.id}'><i class="fas fa-pen"></i></button>
                                            <button class="btn btn-danger btnEliminarUsuario"  data-id='${usuario.id}'><i class="far fa-trash-alt"></i></button>
                                        
                                        </td>
                                    </tr>
                                `  
                            });
                            $('#listaUsuarios').html(template);
                        }
    
                    }
                })
            })

            
            $('#filtro').click(function(e){
                let categoria= $('#categorias').val();
                $.ajax({
                    url: 'FiltrarUsuarios.php',
                    type: 'POST',
                    data: {categoria:categoria},
                    success: function (response){
                        let usuarios = JSON.parse(response);
                        let template = '';
                        usuarios.forEach(usuario =>{
                            template += `
                                <tr>
                                    <td>${usuario.id} </td>
                                    <td>${usuario.usuario} </td>
                                    <td>${usuario.nombre} </td>
                                    <td>${usuario.primerApellido} </td>
                                    <td>${usuario.segundoApellido} </td>
                                    <td>${usuario.dni} </td>
                                    <td>${usuario.telefono} </td>
                                    <td>${usuario.email} </td>
                                    <td>${usuario.direccion}</td>
                                    <td>${usuario.comunidadAutonoma}</td>
                                    <td>${usuario.provincia}</td>
                                    <td>${usuario.ciudad}</td>
                                    <td>${usuario.codigoPostal}</td>
                                    <td>${usuario.rol} </td>
                                    <td class="columnaAcciones">
                                        <button class="btn btn-primary btnEditarUsuario"  data-id='${usuario.id}'><i class="fas fa-pen"></i></button>
                                        <button class="btn btn-danger btnEliminarUsuario"  data-id='${usuario.id}'><i class="far fa-trash-alt"></i></button>
                                       
                                    </td>
                                </tr>
                            `  
                        });
                        $('#listaUsuarios').html(template);
    
                    }
                })
            })

            $('button[name=botonEnviar]').click(function(e){
       
                const postData={
                   usuario: $('#usuario').val(),
                   nombre: $('#nombre').val(),
                   primerapellido: $('#primerapellido').val(),
                   segundoapellido: $('#segundoapellido').val(),
                   dni: $('#dni').val(),
                   telefono: $('#telefono').val(),
                   password: $('#password').val(),
                   email: $('#email').val()
                }
                // MEDIANTE AJAX (POST) ENVIAMOS AL CARRITO EL ANTERIOR OBJETO
                $.post('AñadirUsuarioAdmin.php', postData, function(response){
                    mostrarUsuarios();
                    $('#modalAñadirUsuarioAdmin').modal('hide');
                     
                });
               
              
                e.preventDefault();
                
                   
                
            });
          
});