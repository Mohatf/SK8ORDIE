//Variables

let formularioRecuperarPassword = document.getElementById("formularioRecuperarPassword");
let usuario = document.getElementById("usuario");
let email = document.getElementById("email");
let dni = document.getElementById("dni");




//Errores

let errorFormulario = document.getElementById("errorFormulario");
let errorUsuario = document.getElementById("errorUsuario");
let errorEmail = document.getElementById("errorEmail");
let errorDni = document.getElementById("errorDni");





//Patrones

const patrones={
usuario: /\w{4,30}/,
email: /\S{1,}@\S{2,}\.\S{2,}/i,
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
email.addEventListener("keyup", validarEmail);
dni.addEventListener("keyup", validarDni);

//Para que aun saliendo de la casilla siga comprobando los requisitos
usuario.addEventListener("blur", validarUsuario);
email.addEventListener("blur", validarEmail);
dni.addEventListener("blur", validarDni);


//No deja enviar el formulario si alguno de los campos no cumple los requisitos
formularioRecuperarPassword.addEventListener("submit", (e) => {

    if(validarUsuario() && validarEmail() && validarDni()){
        errorFormulario.classList.remove("mensaje-error-camposActivo");
        errorFormulario.classList.add("mensaje-error-campos");
    }else{
        e.preventDefault();
        errorFormulario.classList.add("mensaje-error-camposActivo");
        errorFormulario.classList.remove("mensaje-error-campos");
    
    }
       
});



