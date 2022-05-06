//Variables

let formularioUpdatePassword = document.getElementById("formularioUpdatePassword");
let password = document.getElementById("password");
let repetirPassword = document.getElementById("repetirPassword");



//Errores

let errorFormulario = document.getElementById("errorFormulario");
let errorPassword = document.getElementById("errorPassword");
let errorRepetirPassword = document.getElementById("errorRepetirPassword");





//Patrones

const patrones={
password: /^(?=.{6,45}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/

}

//Funciones


function validarPassword(){

    if(patrones.password.test(password.value)){
        password.className = "form-control is-valid";
        errorPassword.classList.remove("mensaje-errorActivo");
        errorPassword.classList.add("mensaje-error");
        return true;
    }else{
        password.className = "form-control is-invalid";
        errorPassword.classList.remove("mensaje-error");
        errorPassword.classList.add("mensaje-errorActivo");
        return false;
    }

}

function validarRepetirPassword(){

    if(repetirPassword.value==password.value){
        repetirPassword.className = "form-control is-valid";
        errorRepetirPassword.classList.remove("mensaje-errorActivo");
        errorRepetirPassword.classList.add("mensaje-error");
        return true;
    }else{
        repetirPassword.className = "form-control is-invalid";
        errorRepetirPassword.classList.remove("mensaje-error");
        errorRepetirPassword.classList.add("mensaje-errorActivo");
        return false;
    }

}



//Oyentes de eventos 

password.addEventListener("keyup", validarPassword);
repetirPassword.addEventListener("keyup",validarRepetirPassword);


//Para que aun saliendo de la casilla siga comprobando los requisitos

password.addEventListener("blur", validarPassword);
repetirPassword.addEventListener("blur",validarRepetirPassword);



//No deja enviar el formulario si alguno de los campos no cumple los requisitos
formularioUpdatePassword.addEventListener("submit", (e) => {

    if( validarPassword() && validarRepetirPassword()){
        errorFormulario.classList.remove("mensaje-error-camposActivo");
        errorFormulario.classList.add("mensaje-error-campos");
    }else{
        e.preventDefault();
        errorFormulario.classList.add("mensaje-error-camposActivo");
        errorFormulario.classList.remove("mensaje-error-campos");

    }
});




function mostrarPassword(){
    // RECOGEMOS EL CAMPO PASSWORD
    let cambio = document.getElementById("password");
    // SI LA CONTRASEÑA ESTA EN TIPO PASSWORD SE CAMBIA A TEXTO
    if(cambio.type == "password"){
        cambio.type = "text";
        // SELECCIONAMOS ESE ICONO Y LO CAMBIAMOS 
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        // EN CASO CONTRARIO QUE EL TIPO PASE A PASSWORD
        cambio.type = "password";
         // SELECCIONAMOS ESE ICONO Y LO CAMBIAMOS 
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    } 

    
    $(document).ready(function () {
        //CheckBox mostrar contraseña
        $('#ShowPassword').click(function () {
        $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
    });
});


function mostrarRepetirPassword(){
    // RECOGEMOS EL CAMPO PASSWORD
   let cambioR = document.getElementById("repetirPassword");
   // SI LA CONTRASEÑA ESTA EN TIPO PASSWORD SE CAMBIA A TEXTO
   if(cambioR.type == "password"){
       cambioR.type = "text";
       // SELECCIONAMOS ESE ICONO Y LO CAMBIAMOS 
       $('.iconR').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
   }else{
       // EN CASO CONTRARIO QUE EL TIPO PASE A PASSWORD
       cambioR.type = "password";
       // SELECCIONAMOS ESE ICONO Y LO CAMBIAMOS 
           $('.iconR').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
       }
   } 

   $(document).ready(function () {
   //CheckBox mostrar contraseña
       $('#showrepetirPassword').click(function () {
       $('#repetirPassword').attr('type', $(this).is(':checked') ? 'text' : 'password');
   });
});
