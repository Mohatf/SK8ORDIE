//Variables

let formularioLogin = document.getElementById("formularioLogin");
let usuario = document.getElementById("usuario");
let password = document.getElementById("password");


//Errores

let errorUsuario = document.getElementById("errorUsuario");
let errorPassword = document.getElementById("errorPassword");
let errorFormulario = document.getElementById("errorFormulario");


//Patrones

const patrones={

usuario: /\w{4,30}/,
password:  /^(?=.{6,45}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@,$,€,¿,?,¡,*,#,&,_,-]).*$/


}


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

//Oyentes de eventos 
usuario.addEventListener("keyup", validarUsuario);
password.addEventListener("keyup", validarPassword);

//No deja enviar el formulario si alguno de los campos no cumple los requisitos
formularioLogin.addEventListener("submit", (e) => {

    if(validarUsuario() && validarPassword()){
        errorFormulario.classList.remove("mensaje-error-camposActivo");
        errorFormulario.classList.add("mensaje-error-campos");
    }else{
        e.preventDefault();
        errorFormulario.classList.add("mensaje-error-camposActivo");
        errorFormulario.classList.remove("mensaje-error-campos");
    
    }
});


//Para que aun saliendo de la casilla siga comprobando los requisitos
usuario.addEventListener("blur", validarUsuario);
password.addEventListener("blur", validarPassword);


function mostrarPassword(){
    // RECOGEMOS EL CAMPO PASSWORD
    let cambio = document.getElementById("password");
    // SI LA CONTRASEÑA ESTA EN TIPO PASSWORD SE CAMBIA A TEXTO
    if(cambio.type == "password"){
        cambio.type = "text";
        // SELECCIONAMOS ESE ICONO Y LO CAMBIAMOS 
        $('.icon1').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        // EN CASO CONTRARIO QUE EL TIPO PASE A PASSWORD
        cambio.type = "password";
         // SELECCIONAMOS ESE ICONO Y LO CAMBIAMOS 
            $('.icon1').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    } 

    
    $(document).ready(function () {
        //CheckBox mostrar contraseña
        $('#ShowPassword').click(function () {
        $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
    });
});


