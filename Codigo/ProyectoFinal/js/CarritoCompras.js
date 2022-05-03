$(document).ready(function(){
    mostrarProductos();
    mostrarPrecioTotal();
    mostrarNumCarrito();
    botonPagar();
    function mostrarProductos(){
        $.ajax({
            url: 'MostrarCarrito.php',
            type: 'GET',
            success: function (response){
            let productos = JSON.parse(response);
            let template = '';
            productos.forEach(producto =>{
                let precio=(producto.precio* producto.cantidad).toFixed(2);
                template += `
                    <tr>
                        <td>${producto.nombreProducto}</td>
                        <td><button class="btn btn-danger btnEliminarUnProducto mb-1" style="font-size:10px;"  data-cantidad='${producto.cantidad}'  data-stock='${producto.stock}'  data-id='${producto.id}'><i class="fas fa-minus"></i></button> ${producto.cantidad} <button class="btn btn-success btnAddUnProducto mb-1" style="font-size:10px;"  data-cantidad='${producto.cantidad}'  data-stock='${producto.stock}'  data-id='${producto.id}'><i class="fas fa-plus"></i></button></td>
                        <td>${producto.stock}</td>
                        <td>${precio}</td>
                        <td>${producto.nombreCategoria}</td>
                        <td class="columnaAcciones">
                           
                            <button class="btn btn-danger btnEliminarProducto"  data-id='${producto.id}'><i class="far fa-trash-alt"></i></button>
                           
                        </td>
                        </tr>
                `  
            });
            $('#listaProductos').html(template);

            }
        })
    }
    function mostrarNumCarrito(){
        $.ajax({
            url:'MostrarNumCarrito.php',
            type:'GET',
            success: function usuario(response){
                let nuemero=parseInt(response);
                document.getElementById('numeroCarrito').innerHTML=nuemero;
            
            
            }
        })
    }
    function mostrarPrecioTotal(){
        $.ajax({
            url:'MostrarPrecioTotal.php',
            type:'GET',
            success: function usuario(response){
                let num=response;
                document.getElementById('precioTotal').innerHTML=num;
                $('#precioTotal').html(num);
               
            }
        })
    } 
    $(document).on('click','.btnEliminarProducto', function(){
        let idProducto= $(this).attr('data-id');
        mostrarAlertBorrarProductoCarrito(idProducto);
        
    });
  

    function mostrarAlertBorrarProductoCarrito(idProducto){
        // TEXTO DEL ALERT
        swal("¿Estás seguro de eliminar este producto?", {
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
                $.post('EliminarProductoCarrito.php', {'idProducto':idProducto}, function(response){
                    mostrarProductos();
                    mostrarPrecioTotal();
                    mostrarNumCarrito();
                    botonPagar();
                    
                });
                swal("SK8 OR DIE", "¡El producto se ha eliminado correctamente!", "success");
                break;
            }
           
        });
    }
    $(document).on('click','.btnVaciarCarrito', function(){
        mostrarAlertVaciarCarrito();
        
    });
  

    function mostrarAlertVaciarCarrito(){
        // TEXTO DEL ALERT
        swal("¿Estás seguro de vaciar el carrito?", {
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
                $.post('VaciarCarrito.php', function(response){
                    if(response=="Vacio"){
                        swal("SK8 OR DIE", "No tienes productos en tu carrito, visita nuestro catálogo para añadir productos.", "warning");
                    }else{
                        mostrarProductos();
                        mostrarPrecioTotal();
                        mostrarNumCarrito();
                        swal("SK8 OR DIE", "¡El carrito se ha vaciado correctamente!", "success");
                        botonPagar();
                    }
                });
                break;
                
              
            }
        });
    }
  
    $(document).on('click','.btnEliminarUnProducto', function(){
       let postData={
            idProducto: $(this).attr('data-id'),
            cantidad: $(this).attr('data-cantidad'),
            stock: $(this).attr('data-stock')
        }
        $.post('EliminarUnProductoCarrito.php',postData, function(response){
            if(response==="Error"){
                swal("SK8 OR DIE", "No se puede reducir más la cantidad del producto, puedes eliminarlo con el botón que se encuentra en la columna Acciones.", "error");
            }else{
                mostrarProductos();
                mostrarPrecioTotal();
                mostrarNumCarrito();
                botonPagar();
                
            }
    
        });
        
    });

    $(document).on('click','.btnAddUnProducto', function(){
        let postData={
             idProducto: $(this).attr('data-id'),
             cantidad: $(this).attr('data-cantidad'),
             stock: $(this).attr('data-stock')
         }
         $.post('AddUnProductoCarrito.php',postData, function(response){
             if(response==="CantidadExcedida"){
                 swal("SK8 OR DIE", "¡Upps! Parece que no quedan más unidades de este producto.", "error");
             }else if(response=="SinStock"){
                swal("SK8 OR DIE", "¡Oh! Lo sentimos, el stock de este producto es 0. Puedes eliminar el producto o esperar a que recibamos más unidades.", "error");
                
             }else{
                 mostrarProductos();
                 mostrarPrecioTotal();
                 mostrarNumCarrito();
                 botonPagar();
                
             }
     
         });
     
     });
     function botonPagar(){
        $.ajax({
            url:'MostrarPrecioTotal.php',
            type:'GET',
            success: function usuario(response){
                if(response == "0.00"){
                    $('#filaRealizarPago').html("No tienes productos");
                }else{
                    $('#filaRealizarPago').html('<button class="btn btn-success text-white btnRealizarPago" data-toggle="modal" data-target="#emergenteDireccionesAlPagar">Realizar pago</button>');
                }
                
               
            }
        })
    } 

     
});

//? VALIDACIÓN DEL FORMULARIO DE DIRECCION DE ENVIO

//? Variables
let cp = document.getElementById('codPost');
let provincia = document.getElementById('provincia');
let comunidadAutonoma = document.getElementById('comAuto');
let ciudad = document.getElementById('ciudad');
let direccion = document.getElementById('direccion');

let formularioDirecciones=document.getElementById('formDireccionEnvio');
let errorCP=document.getElementById('errorCodPost');
let errorProvincia=document.getElementById('errorProvincia');
let errorComunidadAutonoma=document.getElementById('errorComAuto');
let errorCiudad=document.getElementById('errorCiudad');
let errorDireccion=document.getElementById('errorDireccion');
let errorForm=document.getElementById('errorFormulario');

//? Patrones
const patrones={
    patronCP:/^[0-9]{5}$/,
    patronCiudad:/^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú ]+[\s]*)+$/,
    patronDireccion:/^[C|c]+[\/| \/]+[a-zA-Z]+[ ,|,]+[N| N|n| n]+[\º|\º ]+[0-9]{1,4}$/
}

//? Eventos para los input
cp.addEventListener("keyup", validarCP);
cp.addEventListener("blur", validarCP);
cp.addEventListener("onchange", validarCP);
cp.addEventListener("keyup", validarCP1);
cp.addEventListener("blur", validarCP1);
cp.addEventListener("onchange", validarCP1);
cp.addEventListener("keyup", validarCP2);
cp.addEventListener("blur", validarCP2);
cp.addEventListener("onchange", validarCP2);
cp.addEventListener("keyup", validarProvincia);
cp.addEventListener("blur", validarProvincia);
cp.addEventListener("onchange", validarProvincia);
cp.addEventListener("keyup", validarCA);
cp.addEventListener("blur", validarCA);
cp.addEventListener("onchange", validarCA);
provincia.addEventListener("keyup", validarProvincia);
provincia.addEventListener("blur", validarProvincia);
provincia.addEventListener("onchange", validarProvincia);
comunidadAutonoma.addEventListener("keyup", validarCA);
comunidadAutonoma.addEventListener("blur", validarCA);
comunidadAutonoma.addEventListener("onchange", validarCA);
ciudad.addEventListener("keyup", validarCiudad);
ciudad.addEventListener("blur", validarCiudad);
direccion.addEventListener("keyup", validarDireccion);
direccion.addEventListener("blur", validarDireccion);

function validarCP1(cPostal){

    let provincias = {
        1: "Álava", 2: "Albacete", 3: "Alicante", 4: "Almería", 5: "Ávila",
        6: "Badajoz", 7: "Islas Baleares", 08: "Barcelona", 09: "Burgos", 10: "C\u00E1ceres",
        11: "Cádiz", 12: "Castellón", 13: "Ciudad Real", 14: "Córdoba", 15: "La Coruña",
        16: "Cuenca", 17: "Gerona", 18: "Granada", 19: "Guadalajara", 20: "Guipúzcoa",
        21: "Huelva", 22: "Huesca", 23: "Jaén", 24: "León", 25: "Lérida",
        26: "La Rioja", 27: "Lugo", 28: "Madrid", 29: "Málaga", 30: "Murcia",
        31: "Navarra", 32: "Orense", 33: "Asturias", 34: "Palencia", 35: "Las Palmas de Gran Canaria",
        36: "Pontevedra", 37: "Salamanca", 38: "Santa Cruz de Tenerife", 39: "Cantabria", 40: "Segovia",
        41: "Sevilla", 42: "Soria", 43: "Tarragona", 44: "Teruel", 45: "Toledo",
        46: "Valencia", 47: "Valladolid", 48: "Vizcaya", 49: "Zamora", 50: "Zaragoza",
        51: "Ceuta", 52: "Melilla"
    };
    if(cPostal.length == 5 && cPostal <= 52999 && cPostal >= 1000){
        
        return provincias[parseInt(cPostal.substring(0, 2))];
    }
    if(patrones.patronCP.test(cp.value)){

        cp.className="form-control is-valid";
        errorCP.classList.remove('mensaje-errorActivo');
        errorCP.classList.add('mensaje-error');
        
    	return true;
    }
    else{
        cp.className="form-control is-invalid";
        errorCP.classList.remove('mensaje-error');
        errorCP.classList.add('mensaje-errorActivo');
  		return false;
    }
}

// VALIDAR CODIGO POSTAL 2
function validarCP2(cPostal){

    let comunidades = {
        1: "País Vasco", 2: "Castilla-La Mancha", 3: "Comunidad Valenciana", 4: "Andalucía", 5: "Castilla y León",
        6: "Extremadura", 7: "Islas Baleares", 08: "Cataluña", 09: "Castilla y León", 10: "Extremadura",
        11: "Andalucía", 12: "Comunidad Valenciana", 13: "Castilla-La Mancha", 14: "Andalucía", 15: "Galicia",
        16: "Castilla-La Mancha", 17: "Cataluña", 18: "Andalucía", 19: "Castilla-La Mancha", 20: "País Vasco",
        21: "Andalucía", 22: "Aragón", 23: "Andalucía", 24: "Castilla y León", 25: "Cataluña",
        26: "La Rioja", 27: "Galicia", 28: "Madrid", 29: "Andalucía", 30: "Murcia",
        31: "Navarra", 32: "Galicia", 33: "Asturias", 34: "Castilla y León", 35: "Islas Canarias",
        36: "Galicia", 37: "Castilla y León", 38: "Islas Canarias", 39: "Cantabria", 40: "Castilla y León",
        41: "Andalucía", 42: "Castilla y León", 43: "Cataluña", 44: "Aragón", 45: "Castilla-La Mancha",
        46: "Comunidad Valenciana", 47: "Castilla y León", 48: "País Vasco", 49: "Castilla y León", 50: "Aragón",
        51: "Ceuta", 52: "Melilla"
    };
    if(cPostal.length == 5 && cPostal <= 52999 && cPostal >= 1000){

        return comunidades[parseInt(cPostal.substring(0, 2))];
    }
    if(patrones.patronCP.test(cp.value)){

        cp.className="form-control is-valid";
        errorCP.classList.remove('mensaje-errorActivo');
        errorCP.classList.add('mensaje-error');
    	return true;
    }
    else{
        cp.className="form-control is-invalid";
        errorCP.classList.remove('mensaje-error');
        errorCP.classList.add('mensaje-errorActivo');
    	return false;
    }
}
let inputCP = cp;
let errorValorCp = null;
inputCP.onkeyup = function(){
    if(validarCP1(inputCP.value)==false){
        provincia.value = errorValorCp;
    }else{
        provincia.value = validarCP1(inputCP.value);
    }
    if(validarCP2(inputCP.value)==false){
        comunidadAutonoma.value = errorValorCp;
    }else{
        comunidadAutonoma.value = validarCP2(inputCP.value);
    }
    
    
}
inputCP.onclick = function(){
    if(validarCP1(inputCP.value)==false){
        provincia.value = errorValorCp;
    }else{
        provincia.value = validarCP1(inputCP.value);
    }
    if(validarCP2(inputCP.value)==false){
        comunidadAutonoma.value = errorValorCp;
    }else{
        comunidadAutonoma.value = validarCP2(inputCP.value);
    }
    
    
}


function  validarCP() {
    if(patrones.patronCP.test(cp.value)){

        cp.className="form-control is-valid";
        errorCP.classList.remove('mensaje-errorActivo');
        errorCP.classList.add('mensaje-error');
    	return true;
    }
    else{
        cp.className="form-control is-invalid";
        errorCP.classList.remove('mensaje-error');
        errorCP.classList.add('mensaje-errorActivo');
    	return false;
    }
}

//VALIDAR COMUNIDAD AUTONOMA
function validarCA(){

    comunidadAutonoma.value = comunidadAutonoma.value.charAt(0).toUpperCase() + comunidadAutonoma.value.slice(1);
	let cadena= validarCP2(cp.value).normalize("NFD").replace(/[\u0300-\u036f]/g, "")
    if(comunidadAutonoma.value == cadena || comunidadAutonoma == validarCP2(cp.value)){

		comunidadAutonoma.className="form-control is-valid";
        errorComunidadAutonoma.classList.remove('mensaje-errorActivo');
        errorComunidadAutonoma.classList.add('mensaje-error');
    	return true;
	}
	else{

		comunidadAutonoma.className="form-control is-invalid";
        errorComunidadAutonoma.classList.remove('mensaje-error');
        errorComunidadAutonoma.classList.add('mensaje-errorActivo');
    	return false;
	}
}

//VALIDAR PROVINCIA
function validarProvincia(){

    provincia.value = provincia.value.charAt(0).toUpperCase() + provincia.value.slice(1);
    let cadena= validarCP1(cp.value).normalize("NFD").replace(/[\u0300-\u036f]/g, "")
	if(provincia.value == cadena || provincia.value == validarCP1(cp.value)){

		provincia.className="form-control is-valid";
        errorProvincia.classList.remove('mensaje-errorActivo');
        errorProvincia.classList.add('mensaje-error');
    	return true;
	}
	else{

		provincia.className="form-control is-invalid";
        errorProvincia.classList.remove('mensaje-error');
        errorProvincia.classList.add('mensaje-errorActivo');    
    	return false;
	}
}
function validarCiudad(){

    ciudad.value = ciudad.value.charAt(0).toUpperCase() + ciudad.value.slice(1);
	if(patrones.patronCiudad.test(ciudad.value)){

		ciudad.className="form-control is-valid";
        errorCiudad.classList.remove('mensaje-errorActivo');
        errorCiudad.classList.add('mensaje-error');
    	return true;
	}
	else{

		ciudad.className="form-control is-invalid";
        errorCiudad.classList.remove('mensaje-error');
        errorCiudad.classList.add('mensaje-errorActivo');    
    	return false;
	}
}

function validarDireccion(){

    direccion.value = direccion.value.charAt(0).toUpperCase() + direccion.value.slice(1);
	if(patrones.patronDireccion.test(direccion.value)){

		direccion.className="form-control is-valid";
        errorDireccion.classList.remove('mensaje-errorActivo');
        errorDireccion.classList.add('mensaje-error');
    	return true;
	}
	else{

		direccion.className="form-control is-invalid";
        errorDireccion.classList.remove('mensaje-error');
        errorDireccion.classList.add('mensaje-errorActivo');    
    	return false;
	}
}

formularioDirecciones.addEventListener("submit", (e) => {   
     
    if(validarCP() && validarProvincia() && validarCA() && validarCiudad() && validarDireccion()){
        validarCP();
        validarProvincia();
        validarCA();
        validarDireccion();
        errorForm.classList.remove('mensaje-error-camposActivo');
        errorForm.classList.add('mensaje-error-campos');
        
    }else{
        e.preventDefault();
        errorForm.classList.remove('mensaje-error-campos');
        errorForm.classList.add('mensaje-error-camposActivo');  
    }
   
  
});