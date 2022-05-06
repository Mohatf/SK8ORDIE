//JQUERY PARA LOS MENUS Y SUBMENUS

$(document).ready(function(){
    mostrarUsuario();
    mostrarNumCarrito();
    //Boton submenus
    $(".sub-btn").click(function(){
        $(this).next(".sub-menu").slideToggle();
    });

    //Boton submenus de submenus
    $(".more-btn").click(function(){
        $(this).next(".more-menu").slideToggle();
    });
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
});


//JAVASCRIPT PARA DESPLAZAR EL MENU EN MOVILES

let menu=document.querySelector(".menu");
let menuBtn=document.querySelector(".menu-btn");
let closeBtn=document.querySelector(".close-btn");

menuBtn.addEventListener('click',()=>{
    menu.classList.add('active');
});
closeBtn.addEventListener('click',()=>{
    menu.classList.remove('active');
});


//MENU FIJO O STICKY

window.addEventListener("scroll", function(){
    let header=document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY>0);
})

$(document).ready(function(){
    $(".carritoNoConectado").click(function(){
        swal("¡Debes iniciar sesión!", "Para acceder al carrito.", "info");
    })
});

function mostrarUsuario(){
    $.ajax({
        url:'MostrarUsuarioPerfil.php',
        type:'GET',
        success: function usuario(response){
        
            
            document.getElementById('usuarioMenu').innerHTML=response;
        
        
        }
    })
} 