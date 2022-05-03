//Variables

let formularioAñadirUsuarioAdmin = document.getElementById("formularioAñadirUsuarioAdmin");
let usuario = document.getElementById("usuario");
let password = document.getElementById("password");
let repetirPassword = document.getElementById("repetirPassword");
let nombre = document.getElementById("nombre");
let primerapellido = document.getElementById("primerapellido");
let segundoapellido = document.getElementById("segundoapellido");
let email = document.getElementById("email");
let dni = document.getElementById("dni");
let telefono = document.getElementById("telefono");



//Errores

let errorFormulario = document.getElementById("errorFormulario");
let errorUsuario = document.getElementById("errorUsuario");
let errorPassword = document.getElementById("errorPassword");
let errorRepetirPassword = document.getElementById("errorRepetirPassword");
let errorNombre = document.getElementById("errorNombre");
let errorPrimerApellido = document.getElementById("errorPrimerApellido");
let errorSegundoApellido = document.getElementById("errorSegundoApellido");
let errorEmail = document.getElementById("errorEmail");
let errorDni = document.getElementById("errorDni");
let errorTelefono = document.getElementById("errorTelefono");




//Patrones

const patrones={

usuario: /\w{4,30}/,
password: /^(?=.{6,45}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/,
nombre:/^[A-Za-záéíóúáéíóúÁÉÍÓÚàèìòùÀÈÌÒÙ ]{1,40}$/,
apellidos:/^[A-Za-záéíóúáéíóúÁÉÍÓÚàèìòùÀÈÌÒÙ ]{1,45}$/,
email: /\S{1,}@\S{2,}\.\S{2,}/i,
telefono: /^[0-9]{9}$/,
dni: /\d\d\d\d\d\d\d\d+(T|R|W|A|G|M|Y|F|P|D|X|B|N|J|Z|S|Q|V|H|L|C|K|E){1}/i


}

//Funciones

function validarUsuario(){

    if(patrones.usuario.test(usuario.value)){
        usuario.className = "form-control is-valid";
        errorUsuario.classList.remove("mensaje-errorActivo");
        errorUsuario.classList.add("mensaje-error");
        return true;
    }else{
        usuario.className = "form-control is-invalid";
        errorUsuario.classList.remove("mensaje-error");
        errorUsuario.classList.add("mensaje-errorActivo");
        return false;
    }
}

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


function validarNombre(){

    if(patrones.nombre.test(nombre.value)){
        nombre.className = "form-control is-valid";
        errorNombre.classList.remove("mensaje-errorActivo");
        errorNombre.classList.add("mensaje-error");
        return true;
    }else{
        nombre.className = "form-control is-invalid";
        errorNombre.classList.remove("mensaje-error");
        errorNombre.classList.add("mensaje-errorActivo");
        return false;
    }
}

function validarPrimerApellido(){

    if(patrones.apellidos.test(primerapellido.value)){
        primerapellido.className = "form-control is-valid";
        errorPrimerApellido.classList.remove("mensaje-errorActivo");
        errorPrimerApellido.classList.add("mensaje-error");
        return true;
    }else{
        primerapellido.className = "form-control is-invalid";
        errorPrimerApellido.classList.remove("mensaje-error");
        errorPrimerApellido.classList.add("mensaje-errorActivo");
        return false;
    }
}

function validarSegundoApellido(){

    if(patrones.apellidos.test(segundoapellido.value)){
        segundoapellido.className = "form-control is-valid";
        errorSegundoApellido.classList.remove("mensaje-errorActivo");
        errorSegundoApellido.classList.add("mensaje-error");
        return true;
    }else{
        segundoapellido.className = "form-control is-invalid";
        errorSegundoApellido.classList.remove("mensaje-error");
        errorSegundoApellido.classList.add("mensaje-errorActivo");
        return false;
    }
}

function validarTelefono(){

    if(patrones.telefono.test(telefono.value)){
        telefono.className = "form-control is-valid";
        errorTelefono.classList.remove("mensaje-errorActivo");
        errorTelefono.classList.add("mensaje-error");
        return true;
    }else{
        telefono.className = "form-control is-invalid";
        errorTelefono.classList.remove("mensaje-error");
        errorTelefono.classList.add("mensaje-errorActivo");
        return false;
    }
}

function validarEmail(){

    if(patrones.email.test(email.value)){
        email.className = "form-control is-valid";
        errorEmail.classList.remove("mensaje-errorActivo");
        errorEmail.classList.add("mensaje-error");
        return true;
    }else{
        email.className = "form-control is-invalid";
        errorEmail.classList.remove("mensaje-error");
        errorEmail.classList.add("mensaje-errorActivo");
        return false;
    }
}

//FUNCION VALIDAR DNI

function validarDni() {
    if (patrones.dni.test(dni.value) && validarLetraDni()) {


        //PARA ACTIVAR EL MENSAJE DE ERROR CORRECTO Y DESACTIVAR EL INCORRECTO
        dni.className = "form-control is-valid";
        errorDni.classList.remove("mensaje-errorActivo");
        errorDni.classList.add("mensaje-error");

        

        //FUNCION PARA PONER LA LETRA EN MAYUSCULA
        dni.value = dni.value.toUpperCase();

        return true;

    }else {

        //PARA ACTIVAR EL MENSAJE DE ERROR INCORRECTO Y DESACTIVAR EL CORRECTO
        dni.className = "form-control is-invalid";
        errorDni.classList.remove("mensaje-error");
        errorDni.classList.add("mensaje-errorActivo");


        //FUNCION PARA PONER LA LETRA EN MAYUSCULA
        dni.value = dni.value.toUpperCase();

        return false;
    }


}

function validarLetraDni() {
    let resultado = false;
    // RECOGEMOS EL NUMERO
    let numero = dni.value.substring(0, 8);
    // HACEMOS EL MODULO DE ESE NUMERO
    numero = numero % 23;
    // ARRAY QUE CONTIENE TODAS LAS LETRAS
    const arrayLetras = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];
    //INTRODUCIMOS EL NUMERO COMO POSICION DEL ARRAY LO COMPARAMOS CON LA LETRA DEL DNI PROPORCIONADA POR EL USUARIO
    if (arrayLetras[numero] == dni.value.substring(8,).toUpperCase()) {
        resultado = true;
    } else {
        resultado = false;
    }
    return resultado;
}

//Oyentes de eventos 
usuario.addEventListener("keyup", validarUsuario);
password.addEventListener("keyup", validarPassword);
repetirPassword.addEventListener("keyup",validarRepetirPassword);
nombre.addEventListener("keyup", validarNombre);
primerapellido.addEventListener("keyup", validarPrimerApellido);
segundoapellido.addEventListener("keyup", validarSegundoApellido);
telefono.addEventListener("keyup", validarTelefono);
email.addEventListener("keyup", validarEmail);
dni.addEventListener("keyup", validarDni);

//Para que aun saliendo de la casilla siga comprobando los requisitos
usuario.addEventListener("blur", validarUsuario);
password.addEventListener("blur", validarPassword);
repetirPassword.addEventListener("blur",validarRepetirPassword);
nombre.addEventListener("blur", validarNombre);
primerapellido.addEventListener("blur", validarPrimerApellido);
segundoapellido.addEventListener("blur", validarSegundoApellido);
telefono.addEventListener("blur", validarTelefono);
email.addEventListener("blur", validarEmail);
dni.addEventListener("blur", validarDni);


//No deja enviar el formulario si alguno de los campos no cumple los requisitos
formularioAñadirUsuarioAdmin.addEventListener("submit", (e) => {

    if(validarUsuario() && validarPassword() && validarRepetirPassword() && validarNombre() && validarPrimerApellido() && validarSegundoApellido() && validarTelefono() && validarEmail() && validarDni()){
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
