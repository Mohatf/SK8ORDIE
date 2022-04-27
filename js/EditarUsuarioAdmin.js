let id=document.getElementById('iDUsuario').value;

$(document).ready(function(){
    mostrarFotoPerfil();
    mostrarUsuario();
    mostrarNombre();
    mostrarPrimerApellido();
    mostrarSegundoApellido();
    mostrarDireccion();
    mostrarCa();
    mostrarProvincia();
    mostrarCiudad();
    mostrarCodPost();
    mostrarTelefono();
    mostrarEmail();
    mostrarDni();
    mostrarROL();

    //Esta funcion sirve para mostrar el nombre de usuario mediante ajax
    function mostrarUsuario(){
        $.ajax({
            url:'MostrarUsuarioAdmin.php',
            data: {idUsuario:id},
            type:'GET',
            success: function usuario(response){
            
                
                document.getElementById('usuarioAj').innerHTML=response;
                
            
            
            }
        })
    } 
    
    $('.boton-editarUsuario').click(function(){
        let usuario =$(this).attr('data-usuario');
        mostrarAlertModificar(usuario);
    });
       //Esta funcion sirve para editar el nombre de usuario mediante ajax
    function mostrarAlertModificar(usuario){
        swal("Editar nombre de usuario", {
            // ESPECIFICAMOS QUE CONTENIDO QUEREMOS QUE TENGA
            content: {
                element: "input",
                attributes: {
                name: "usuarioModificar",
                placeholder: "Escribe un nombre de usuario...",
                
                
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
                $.post('EditarNombreUsuarioAdmin.php', {'usuario':`${$('input[name=usuarioModificar]').val()}`, 'idUsuario':`${id}`}, function(response){
                    mostrarUsuario();
                    if(response=="Error"){
                        swal("SK8 OR DIE", "¡El nombre de usuario ya existe!", "error");
                    }else if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe un nombre de usuario.", "error");
                    }else if(response=="patronIncorrecto"){
                        swal("SK8 OR DIE", "Escribe un nombre de usuario que sea válido.", "error");
                    }else{
                        swal("SK8 OR DIE", "¡El nombre de usuario se ha actualizado correctamente!", "success");
                    }
                });
                
                break;
        
        
            
                
            }
        });
    }

     //Esta funcion sirve para mostrar el nombre mediante ajax
     function mostrarNombre(){
        $.ajax({
            url:'MostrarNombrePerfilAdmin.php',
            data: {idUsuario:id},
            type:'GET',
            success: function nombre(response){
            
                
                document.getElementById('nombreAj').innerHTML=response;
                document.getElementById('nombre-titulo').innerHTML=response;
            
            
            }
        })
    } 

    $('.boton-editarNombre').click(function(){
        let nombre =$(this).attr('data-nombre');
        mostrarAlertModificarNombre(nombre);
    });

    function mostrarAlertModificarNombre(nombre){
        
        swal("Editar nombre", {
            // ESPECIFICAMOS QUE CONTENIDO QUEREMOS QUE TENGA
            content: {
                element: "input",
                attributes: {
                name: "nombreModificar",
                placeholder: "Escribe un nombre ...",

                
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
                $.post('EditarNombreAdmin.php', {'nombre':`${$('input[name=nombreModificar]').val()}`,'idUsuario':`${id}`}, function(response){
                    mostrarNombre();
                     if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe un nombre.", "error");
                    }else if(response=="patronIncorrecto"){
                        swal("SK8 OR DIE", "Escribe un nombre que sea válido.", "error");
                    }
                    else{
                        swal("SK8 OR DIE", "¡El nombre se ha actualizado correctamente!", "success");
                    }
               
                });
                
                break;
        
        
            
                
            }
        });
    }

     //Esta funcion sirve para mostrar el primer apellido mediante ajax
     function mostrarPrimerApellido(){
        $.ajax({
            url:'MostrarPrimerApellidoAdmin.php',
            data: {idUsuario:id},
            type:'GET',
            success: function primerApellido(response){
            
                
                document.getElementById('primerApellidoAj').innerHTML=response;
                document.getElementById('primerApellido-titulo').innerHTML=response;
            
            
            }
        })
    } 

    $('.boton-editarPrimerApellido').click(function(){
        let primerApellido =$(this).attr('data-primerApellido');
        mostrarAlertModificarPrimerApellido(primerApellido);
    });

    function mostrarAlertModificarPrimerApellido(primerApellido){
        swal("Editar primer apellido", {
            // ESPECIFICAMOS QUE CONTENIDO QUEREMOS QUE TENGA
            content: {
                element: "input",
                attributes: {
                name: "primerApellidoModificar",
                placeholder: "Escribe el primer apellido ...",
                
                
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
                $.post('EditarPrimerApellidoAdmin.php', {'primerApellido':`${$('input[name=primerApellidoModificar]').val()}`, 'idUsuario':`${id}`}, function(response){
                    mostrarPrimerApellido();
                    if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe el primer apellido.", "error");
                    }else if(response=="patronIncorrecto"){
                        swal("SK8 OR DIE", "Escribe un apellido que se válido", "error");
                    }else{
                        swal("SK8 OR DIE", "¡El primer apellido se ha actualizado correctamente!", "success");
                    }
                });
                
                break;
        
        
            
                
            }
        });
    }

     //Esta funcion sirve para mostrar el segundo apellido mediante ajax
     function mostrarSegundoApellido(){
        $.ajax({
            url:'MostrarSegundoApellidoAdmin.php',
            data: {idUsuario:id},
            type:'GET',
            success: function segundoApellido(response){
            
                
                document.getElementById('segundoApellidoAj').innerHTML=response;
                document.getElementById('segundoApellido-titulo').innerHTML=response;
            
            
            }
        })
    } 

    $('.boton-editarSegundoApellido').click(function(){
        let segundoApellido =$(this).attr('data-segundoApellido');
        mostrarAlertModificarSegundoApellido(segundoApellido);
    });

    function mostrarAlertModificarSegundoApellido(segundoApellido){
        swal("Editar segundo apellido", {
            // ESPECIFICAMOS QUE CONTENIDO QUEREMOS QUE TENGA
            content: {
                element: "input",
                attributes: {
                name: "segundoApellidoModificar",
                placeholder: "Escribe el segundo apellido ...",
                
                
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
                $.post('EditarSegundoApellidoAdmin.php', {'segundoApellido':`${$('input[name=segundoApellidoModificar]').val()}`, 'idUsuario':`${id}`}, function(response){
                    mostrarSegundoApellido();
                    if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe el segundo apellido.", "error");
                    }else if(response=="patronIncorrecto"){
                        swal("SK8 OR DIE", "Escribe un apellido que se válido", "error");
                    }else{
                        swal("SK8 OR DIE", "¡El segundo apellido se ha actualizado correctamente!", "success");
                    }
                });
                
                break;
        
        
            
                
            }
        });
    }

    function mostrarDireccion(){
        $.ajax({
            url:'MostrarDireccionAdmin.php',
            data: {idUsuario:id},
            type:'GET',
            success: function usuario(response){
            
                
                document.getElementById('direccionAj').innerHTML=response;
                
            
            
            }
        })
    } 
    $('.boton-editarDireccion').click(function(){
        let direccion =$(this).attr('data-direccion');
        mostrarAlertModificarDireccion(direccion);
    });

    function mostrarAlertModificarDireccion(direccion){
        swal("Editar  dirección", {
            // ESPECIFICAMOS QUE CONTENIDO QUEREMOS QUE TENGA
            content: {
                element: "input",
                attributes: {
                name: "direccionModificar",
                placeholder: "C/Honduras, 26",
                
                
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
                $.post('EditarDireccionAdmin.php', {'direccion':`${$('input[name=direccionModificar]').val()}`, 'idUsuario':`${id}`}, function(response){
                    mostrarDireccion();
                    if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe una direccion de envio.", "error");
                    }else if(response=="patronIncorrecto"){
                        swal("SK8 OR DIE", "Escribe una direccion de envio sea válida.", "error");
                    }else{
                        swal("SK8 OR DIE", "¡La dirección de envio se ha actualizado correctamente!", "success");
                    }
                });
                
                break;
        
        
            
                
            }
        });
    }

    function mostrarCa(){
        $.ajax({
            url:'MostrarCaAdmin.php',
            data: {idUsuario:id},
            type:'GET',
            success: function usuario(response){
            
                
                document.getElementById('caAj').innerHTML=response;
                
            
            
            }
        })
    } 
    $('.boton-editarCa').click(function(){
        let ca =$(this).attr('data-ca');
        mostrarAlertModificarCa(ca);
    });

    function mostrarAlertModificarCa(ca){
        swal("Editar comunidad autónoma", {
            // ESPECIFICAMOS QUE CONTENIDO QUEREMOS QUE TENGA
            content: {
                element: "input",
                attributes: {
                name: "caModificar",
                placeholder: "Ejemplo: Melilla...(Escribir acentos y la primera mayúscula)",
                
                
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
                $.post('EditarCaAdmin.php', {'ca':`${$('input[name=caModificar]').val()}`, 'idUsuario':`${id}`}, function(response){
                    mostrarCa();
                    if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe una comunidad autónoma.", "error");
                    }else if(response=="patronIncorrecto"){
                        swal("SK8 OR DIE", "Escribe una comunidad autónoma que sea válida.", "error");
                    }else{
                        swal("SK8 OR DIE", "¡La comunidad autónoma se ha actualizado correctamente!", "success");
                    }
                });
                
                break;
        
        
            
                
            }
        });
    }
    function mostrarProvincia(){
        $.ajax({
            url:'MostrarProvinciaAdmin.php',
            data: {idUsuario:id},
            type:'GET',
            success: function usuario(response){
            
                
                document.getElementById('provinciaAj').innerHTML=response;
                
            
            
            }
        })
    } 
    $('.boton-editarProvincia').click(function(){
        let provincia =$(this).attr('data-provincia');
        mostrarAlertModificarProvincia(provincia);
    });

    function mostrarAlertModificarProvincia(provincia){
        swal("Editar provincia", {
            // ESPECIFICAMOS QUE CONTENIDO QUEREMOS QUE TENGA
            content: {
                element: "input",
                attributes: {
                name: "provinciaModificar",
                placeholder: "Ejemplo: Melilla...(Escribir acentos y la primera mayúscula)",
                
                
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
                $.post('EditarProvinciaAdmin.php', {'provincia':`${$('input[name=provinciaModificar]').val()}`, 'idUsuario':`${id}`}, function(response){
                    mostrarProvincia();
                    if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe una provincia.", "error");
                    }else if(response=="patronIncorrecto"){
                        swal("SK8 OR DIE", "Escribe una provincia que sea válida.", "error");
                    }else{
                        swal("SK8 OR DIE", "¡La provincia se ha actualizado correctamente!", "success");
                    }
                });
                
                break;
        
        
            
                
            }
        });
    }

    function mostrarCiudad(){
        $.ajax({
            url:'MostrarCiudadAdmin.php',
            data: {idUsuario:id},
            type:'GET',
            success: function usuario(response){
            
                
                document.getElementById('ciudadAj').innerHTML=response;
                
            
            
            }
        })
    } 
    $('.boton-editarCiudad').click(function(){
        let ciudad =$(this).attr('data-ciudad');
        mostrarAlertModificarCiudad(ciudad);
    });

    function mostrarAlertModificarCiudad(ciudad){
        swal("Editar ciudad", {
            // ESPECIFICAMOS QUE CONTENIDO QUEREMOS QUE TENGA
            content: {
                element: "input",
                attributes: {
                name: "ciudadModificar",
                placeholder: "Ejemplo: Melilla...(Escribir acentos y la primera mayúscula)",
                
                
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
                $.post('EditarCiudadAdmin.php', {'ciudad':`${$('input[name=ciudadModificar]').val()}`, 'idUsuario':`${id}`}, function(response){
                    mostrarCiudad();
                    if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe una ciudad.", "error");
                    }else if(response=="patronIncorrecto"){
                        swal("SK8 OR DIE", "Escribe una ciudad que sea válida.", "error");
                    }else{
                        swal("SK8 OR DIE", "¡La ciudad se ha actualizado correctamente!", "success");
                    }
                });
                
                break;
        
        
            
                
            }
        });
    }
    function mostrarCodPost(){
        $.ajax({
            url:'MostrarCodPostAdmin.php',
            data: {idUsuario:id},
            type:'GET',
            success: function usuario(response){
            
                
                document.getElementById('codPostAj').innerHTML=response;
                
            
            
            }
        })
    } 
    $('.boton-editarCodPost').click(function(){
        let codPost =$(this).attr('data-codPost');
        mostrarAlertModificarCodPost(codPost);
    });

    function  mostrarAlertModificarCodPost(codPost){
        swal("Editar ciudad", {
            // ESPECIFICAMOS QUE CONTENIDO QUEREMOS QUE TENGA
            content: {
                element: "input",
                attributes: {
                name: "codPostModificar",
                placeholder: "Ejemplo: 52002...",
                
                
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
                $.post('EditarCodPostAdmin.php', {'codPost':`${$('input[name=codPostModificar]').val()}`, 'idUsuario':`${id}`}, function(response){
                    mostrarCodPost();
                    if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe un código postal.", "error");
                    }else if(response=="patronIncorrecto"){
                        swal("SK8 OR DIE", "Escribe un código postal que sea válido.", "error");
                    }else{
                        swal("SK8 OR DIE", "¡El código postal se ha actualizado correctamente!", "success");
                    }
                });
                
                break;
        
        
            
                
            }
        });
    }



      //Esta funcion sirve para mostrar el telefono mediante ajax
      function mostrarTelefono(){
        $.ajax({
            url:'MostrarTelefonoAdmin.php',
            data: {idUsuario:id},
            type:'GET',
            success: function telefono(response){
            
                
                document.getElementById('telefonoAj').innerHTML=response;
            
            
            }
        })
    } 

    $('.boton-editarTelefono').click(function(){
        let telefono =$(this).attr('data-telefono');
        mostrarAlertModificarTelefono(telefono);
    });

    function mostrarAlertModificarTelefono(telefono){
        swal("Editar telefono", {
            // ESPECIFICAMOS QUE CONTENIDO QUEREMOS QUE TENGA
            content: {
                element: "input",
                attributes: {
                name: "telefonoModificar",
                placeholder: "Escribe un telefono ...",
                
                
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
                $.post('EditarTelefonoAdmin.php', {'telefono':`${$('input[name=telefonoModificar]').val()}`, 'idUsuario':`${id}`}, function(response){
                    mostrarTelefono();
                    if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe un teléfono.", "error");
                    }else if(response=="patronIncorrecto"){
                        swal("SK8 OR DIE", "El teléfono no cumple el formato", "error");
                    }else{
                        swal("SK8 OR DIE", "¡El teléfono se ha actualizado correctamente!", "success");
                    }
                });
                
                break;
                
            }
        });
    }

     //Esta funcion sirve para mostrar el email mediante ajax
    function mostrarEmail(){
        $.ajax({
            url:'MostrarEmailAdmin.php',
            data: {idUsuario:id},
            type:'GET',
            success: function email(response){
            
                
                document.getElementById('emailAj').innerHTML=response;
            
            
            }
        })
    }

    $('.boton-editarEmail').click(function(){
        let email =$(this).attr('data-email');
        mostrarAlertModificarEmail(email);
    });
       //Esta funcion sirve para editar el nombre de email mediante ajax
    function mostrarAlertModificarEmail(email){
        swal("Editar email", {
            // ESPECIFICAMOS QUE CONTENIDO QUEREMOS QUE TENGA
            content: {
                element: "input",
                attributes: {
                name: "emailModificar",
                placeholder: "Escribe un email...",
                
                
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
                $.post('EditarEmailAdmin.php', {'email':`${$('input[name=emailModificar]').val()}`, 'idUsuario':`${id}`}, function(response){
                    mostrarEmail();
                    if(response=="Error"){
                        swal("SK8 OR DIE", "¡El email ya existe!", "error");
                    }else if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe un email.", "error");
                    }else if(response=="patronIncorrecto"){
                        swal("SK8 OR DIE", "El email no cumple el formato", "error");
                    }else{
                        swal("SK8 OR DIE", "¡El email se ha actualizado correctamente!", "success");
                    }
                });
                
                break;
        
        
            
                
            }
        });
    }

    //Esta funcion sirve para mostrar el dni mediante ajax
    function mostrarDni(){
        $.ajax({
            url:'MostrarDniAdmin.php',
            data: {idUsuario:id},
            type:'GET',
            success: function dni(response){
            
                
                document.getElementById('dniAj').innerHTML=response;
            
            
            }
        })
    }

    $('.boton-editarDni').click(function(){
        let dni =$(this).attr('data-dni');
        mostrarAlertModificarDni(dni);
    });
       //Esta funcion sirve para editar el nombre de dni mediante ajax
    function mostrarAlertModificarDni(dni){
        swal("Editar DNI", {
            // ESPECIFICAMOS QUE CONTENIDO QUEREMOS QUE TENGA
            content: {
                element: "input",
                attributes: {
                name: "dniModificar",
                placeholder: "Escribe un DNI...",
                
              
                    
                
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
                $.post('EditarDniAdmin.php', {'dni':`${$('input[name=dniModificar]').val()}`, 'idUsuario':`${id}`}, function(response){
                    mostrarDni();
                   
                    if(response=="Error"){
                        swal("SK8 OR DIE", "¡El DNI ya existe!", "error");
                    }else if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe un DNI.", "error");
                    }else if(response=="patronIncorrecto"){
                        swal("SK8 OR DIE", "El DNI no cumple el formato", "error");
                    }else{
                        swal("SK8 OR DIE", "¡El DNI se ha actualizado correctamente!", "success");
                    }
                });
                
                break;
        
                
            }
        });
    }

    function mostrarROL(){
        $.ajax({
            url:'MostrarROLAdmin.php',
            data: {idUsuario:id},
            type:'GET',
            success: function dni(response){
            
                
                document.getElementById('rolAj').innerHTML=response;
            
            
            }
        })
    }
    $('.boton-editarROL').click(function(){
        let rol =$(this).attr('data-rol');
        mostrarAlertModificarROL(rol);
    });

           //Esta funcion sirve para editar el nombre de dni mediante ajax
           function mostrarAlertModificarROL(rol){
            swal("Editar Rol", {
                // ESPECIFICAMOS QUE CONTENIDO QUEREMOS QUE TENGA
                content: {
                    element: "input",
                    attributes: {
                    name: "rolModificar",
                    placeholder: "El rol solo puede ser Usuario o Admin",
                    
                  
                        
                    
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
                    $.post('EditarROLAdmin.php', {'rol':`${$('input[name=rolModificar]').val()}`, 'idUsuario':`${id}`}, function(response){
                        mostrarROL();
                       
                        if(response=="rolIncorrecto"){
                            swal("SK8 OR DIE", "El rol solo puede ser Usuario o Admin", "error");
                        }else if(response=="Campo nulo"){
                            swal("SK8 OR DIE", "Escribe un Rol.", "error");
                        }else{
                            swal("SK8 OR DIE", "¡El rol se ha actualizado correctamente!", "success");
                        }
                    });
                    
                    break;
            
                    
                }
            });
        }







    function mostrarFotoPerfil(){
        
        $.ajax({
            url: 'MostrarFotoPerfilAdmin.php',
            data: {idUsuario:id},
            type: 'POST',
            async:false,
            success: function (response){
                
                $('#fotoPerfil').html(response);
            }
        })
    
    }
  
  


});