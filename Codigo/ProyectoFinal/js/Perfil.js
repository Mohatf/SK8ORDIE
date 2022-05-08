$(document).ready(function(){
    mostrarFotoPerfil();
    mostrarUsuario();
    mostrarNombre();
    mostrarPrimerApellido();
    mostrarSegundoApellido();
    mostrarTelefono();
    mostrarEmail();
    mostrarDni();

    //Esta funcion sirve para mostrar el nombre de usuario mediante ajax
    function mostrarUsuario(){
        $.ajax({
            url:'MostrarUsuarioPerfil.php',
            type:'GET',
            success: function usuario(response){
            
                
                document.getElementById('usuarioAj').innerHTML=response;
                document.getElementById('usuarioMenu').innerHTML=response;
            
            
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
                $.post('EditarUsuario.php', {'usuario':`${$('input[name=usuarioModificar]').val()}`}, function(response){
                    mostrarUsuario();
                    if(response=="Error"){
                        swal("SK8 OR DIE", "¡El nombre de usuario ya existe!", "error");
                    }else if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe un nombre de usuario.", "error");
                    }else if(response=="patronIncorrecto"){
                        swal("SK8 OR DIE", "Escribe un nombre de usuario que sea válido.", "error");
                    }else{
                        swal("SK8 OR DIE", "¡Tu nombre de usuario se ha actualizado correctamente!", "success");
                    }
                });
                
                break;
        
        
            
                
            }
        });
    }

     //Esta funcion sirve para mostrar el nombre mediante ajax
     function mostrarNombre(){
        $.ajax({
            url:'MostrarNombrePerfil.php',
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
                placeholder: "Escribe tu nombre ...",

                
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
                $.post('EditarNombre.php', {'nombre':`${$('input[name=nombreModificar]').val()}`}, function(response){
                    mostrarNombre();
                     if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe un nombre.", "error");
                    }else if(response=="patronIncorrecto"){
                        swal("SK8 OR DIE", "Escribe un nombre que sea válido.", "error");
                    }
                    else{
                        swal("SK8 OR DIE", "¡Tu nombre se ha actualizado correctamente!", "success");
                    }
                    
                });
                
                break;
        
        
            
                
            }
        });
    }

     //Esta funcion sirve para mostrar el primer apellido mediante ajax
     function mostrarPrimerApellido(){
        $.ajax({
            url:'MostrarPrimerApellidoPerfil.php',
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
                placeholder: "Escribe tu primer apellido ...",
                
                
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
                $.post('EditarPrimerApellido.php', {'primerApellido':`${$('input[name=primerApellidoModificar]').val()}`}, function(response){
                    mostrarPrimerApellido();
                    if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe tu primer apellido.", "error");
                    }else if(response=="patronIncorrecto"){
                        swal("SK8 OR DIE", "Escribe un apellido que se válido", "error");
                    }else{
                        swal("SK8 OR DIE", "¡Tu primer apellido se ha actualizado correctamente!", "success");
                    }
                });
                
                break;
        
        
            
                
            }
        });
    }

     //Esta funcion sirve para mostrar el segundo apellido mediante ajax
     function mostrarSegundoApellido(){
        $.ajax({
            url:'MostrarSegundoApellidoPerfil.php',
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
                placeholder: "Escribe tu segundo apellido ...",
                
                
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
                $.post('EditarSegundoApellido.php', {'segundoApellido':`${$('input[name=segundoApellidoModificar]').val()}`}, function(response){
                    mostrarSegundoApellido();
                    if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe tu segundo apellido.", "error");
                    }else if(response=="patronIncorrecto"){
                        swal("SK8 OR DIE", "Escribe un apellido que se válido", "error");
                    }else{
                        swal("SK8 OR DIE", "¡Tu segundo apellido se ha actualizado correctamente!", "success");
                    }
                });
                
                break;
        
        
            
                
            }
        });
    }

      //Esta funcion sirve para mostrar el telefono mediante ajax
      function mostrarTelefono(){
        $.ajax({
            url:'MostrarTelefonoPerfil.php',
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
                $.post('EditarTelefono.php', {'telefono':`${$('input[name=telefonoModificar]').val()}`}, function(response){
                    mostrarTelefono();
                    if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe un teléfono.", "error");
                    }else if(response=="patronIncorrecto"){
                        swal("SK8 OR DIE", "El teléfono no cumple el formato", "error");
                    }else{
                        swal("SK8 OR DIE", "¡Tu teléfono se ha actualizado correctamente!", "success");
                    }
                });
                
                break;
        
        
            
                
            }
        });
    }

     //Esta funcion sirve para mostrar el email mediante ajax
    function mostrarEmail(){
        $.ajax({
            url:'MostrarEmailPerfil.php',
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
                placeholder: "Escribe tu email...",
                
                
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
                $.post('EditarEmail.php', {'email':`${$('input[name=emailModificar]').val()}`}, function(response){
                    mostrarEmail();
                    if(response=="Error"){
                        swal("SK8 OR DIE", "¡El email ya existe!", "error");
                    }else if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe un email.", "error");
                    }else if(response=="patronIncorrecto"){
                        swal("SK8 OR DIE", "El email no cumple el formato", "error");
                    }else{
                        swal("SK8 OR DIE", "¡Tu email se ha actualizado correctamente!", "success");
                    }
                });
                
                break;
        
        
            
                
            }
        });
    }

    //Esta funcion sirve para mostrar el dni mediante ajax
    function mostrarDni(){
        $.ajax({
            url:'MostrarDniPerfil.php',
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
                placeholder: "Escribe tu DNI...",
                
              
                    
                
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
                $.post('EditarDni.php', {'dni':`${$('input[name=dniModificar]').val()}`}, function(response){
                    mostrarDni();
                   
                    if(response=="Error"){
                        swal("SK8 OR DIE", "¡El DNI ya existe!", "error");
                    }else if(response=="Campo nulo"){
                        swal("SK8 OR DIE", "Escribe tu DNI.", "error");
                    }else if(response=="patronIncorrecto"){
                        swal("SK8 OR DIE", "El DNI no cumple el formato", "error");
                    }else{
                        swal("SK8 OR DIE", "¡Tu DNI se ha actualizado correctamente!", "success");
                    }
                });
                
                break;
        
                
            }
        });
    }
    function mostrarFotoPerfil(){
        
        $.ajax({
            url: 'MostrarFotoPerfil.php',
            type: 'POST',
            async:false,
            success: function (response){
                
                $('#fotoPerfil').html(response);
            }
        })
    
    }

    $('.boton-darseDeBaja').click(function(){
        let id =$(this).attr('data-darseDeBaja');
        swal("¿Seguro que quieres darte de baja?", {
            buttons: ["No", "Si"],
          })
          .then((value) => {
            switch (value) {
                // SI RECIBE EL VALOR aceptar QUE EJECUTE LA SIGUIENTE FUNCION POST  
            case "Si":
                alert("Hola");
                // window.location.href("DarseDeBaja.php"+id);
                
                break;
        
                
            }
        });
    });

        
  


});