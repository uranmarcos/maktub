let menu = document.querySelector("#menu");
let menuDesplegable= document.querySelector("#formMenu");

function mostrarMenu(){
    let consulta = menuDesplegable.classList;
    if(consulta.contains("ocultar")){
        menuDesplegable.classList.remove("ocultar");
    }else{
        menuDesplegable.className="ocultar";
    }
}

function ocultarMenu(){
    menuDesplegable.className="ocultar";
}