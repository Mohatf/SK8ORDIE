let deleteme = document.getElementById('deleteme');
// Y AQUI GUARDAMOS EL MENSAJE DE ERROR
const errorDeleteme= document.getElementById('mensaje-errorDel');
// GUARDAMOS EL FORMULARIO EN LA SIGUIENTE VARIABLE
let formularioDeleteMe = document.getElementById('FormularioDarseDeBaja');

// AQUI EJECUTAMOS EL EVENTO KEYUP Y BLUR, Y SE EJECUTA LA FUNCION validarDeleteME
deleteme.addEventListener("keyup", validarDeleteME);

// FUNCION VALIDAR DELETEME
function validarDeleteME(){
    
    if(deleteme.value=='DeleteMe'){
        
        deleteme.className = "form-control is-valid"; 
        return true;
    }else{
        
       deleteme.className = "form-control is-invalid";
        return false; 
    }
}
// EVENTO PARA NO DEJAR ENVIAR EL FORMULARIO SIN UN CAMPO ESTA FALSE
formularioDeleteMe.addEventListener("submit", (e) => {

    if(validarDeleteME()){

    }else{
        e.preventDefault();
    }
});