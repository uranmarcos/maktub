let input = document.querySelectorAll(".input");
let inputBoton = document.querySelectorAll(".botonInput");
let textarea = document.querySelectorAll(".textarea");



inputBoton.forEach(function(valor){
    valor.addEventListener("mouseover", function(){
        let nombre =valor.getAttribute("name");
        validarForm(nombre, valor);
    })
})

input.forEach(function(valor){
    valor.addEventListener('mouseover', function(){
        habilitarBoton();
    })
})


textarea.forEach(function(valor){
    valor.addEventListener("focus", function(){
        valor.addEventListener('keyup', function(){
            let mensajeIngresado = valor.value;
            let campoMensaje = valor.nextElementSibling;
            validarTextarea(mensajeIngresado, campoMensaje);
        })    
    })
})
    function validarTextarea(mensajeIngresado, campoMensaje){
        if(mensajeIngresado.length<10){
            campoMensaje.innerHTML="Debe escribir al menos 10 caracteres";
        }else{
            campoMensaje.innerHTML="";
        }
    }
    

/*validacion campos del form */
input.forEach(function(valor){
    valor.addEventListener("focus", function(){
        valor.addEventListener('keyup', function(){
            let inputName = valor.getAttribute("name");
            let campoMensaje=valor.nextElementSibling;
            let datoIngresado = valor.value;
            
            if(inputName == "name"){
                validarNombre(datoIngresado, campoMensaje);
            }
            if(inputName == "mail"){
                validarEmail(datoIngresado, campoMensaje);
            }
            if(inputName== "pass") {
                validarPassword(datoIngresado, campoMensaje)
            }
            if(inputName == "passConfirm"){
                let password2 = valor.parentNode.previousElementSibling.firstElementChild.nextElementSibling.value;
                compararPassword(datoIngresado, password2, campoMensaje)
            }
        })
    })
})



/* funciones a usar */
function validarNombre(datoIngresado, campoMensaje){
    if (datoIngresado.length<3){
        campoMensaje.innerHTML="Debe contener entre 3 y 8 letras";
    }else{
        campoMensaje.innerHTML="";
    }
}
function validarEmail(email, campoMensaje){
    if( (!email.includes("@"))|| (!email.includes(".") )){
        campoMensaje.innerHTML= "Debe ser del tipo ejemplo@ejemplo.com";
    }else{
        campoMensaje.innerHTML = "";    
    }
}
function validarPassword(password, campoMensaje){
    if((password.length<4) || (password.length>8)){
        campoMensaje.innerHTML = "Debe poseer entre 4 y 8 caracteres";
    }else{
        campoMensaje.innerHTML ="";
    }
}
function compararPassword(password1, password2, campoMensaje){
    if(password1 != password2){
        campoMensaje.innerHTML ="las contraseñas no coinciden";
    }else{
        campoMensaje.innerHTML ="";
    }
}

function habilitarBoton(){
    inputBoton.forEach(function(valor){
        valor.removeAttribute("disabled");  
    })
}
function validarForm(nombre, valor){
    let campoMensaje = document.getElementsByName("mensaje"+nombre);
    campoMensaje.forEach(function(vari){
        if((vari.textContent.includes("Debe")== true) || 
            (vari.textContent.includes("las")== true)){
           valor.setAttribute("disabled", "");
        }
    })
}