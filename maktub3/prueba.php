<?php

?>
<html>
<h1>Hola </h1>

<script language="javascript">
//variable con el texto a mostrar
var texto = "Bienvenidos a mi pagina web!!!"
//variable con la posicion en el texto. poner siempre a 0
var pos = 0

//creo una funcion para cambiar el texto de la barra de estado
function textoEstado(){
   //incremento la posicion en 1 y extraigo el texto a mostrar en este momento.
   pos = pos + 1
   textoActual = texto.substring(0,pos)
   //pongo el texto que quiero mostrar en la barra de estado del navegador
   window.status = textoActual
   //Llamamos otra vez a esta funcion para que continue    mostrando texto
   if (pos == texto.length){
      //si hemos llegado al final, vuelvo al principio y hago un retardo superior
      pos = 0
      setTimeout("textoEstado()",1500)
   } else{
      //si no hemos llegado al final, sigo con la funcion con un retardo minimo.
      setTimeout("textoEstado()",100)
   }
}

//llamo a la función para poner el texto en movimiento
textoEstado()
</script>

</html>
