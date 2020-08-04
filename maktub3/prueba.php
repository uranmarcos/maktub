<?php

$numeroOriginal = "14321";

function esPalindromo($numeroOriginal){
    $matriz = str_split($numeroOriginal);
    $posicionIzquierda= 0;
    $cantidad = count($matriz);
    $posicionDerecha= $cantidad - 1;

    for($i=0; $i<=(count($matriz)/2); $i++ ){
           
        $valorIzquierdo = $matriz[$posicionIzquierda];
        $valorDerecho = $matriz[$posicionDerecha];
        

        if ($valorIzquierdo == $valorDerecho){
            $posicionIzquierda++;
            $posicionDerecha--;
            return true;
        }
    }
}    

if (esPalindromo($numeroOriginal) == true){
    echo "si";
} else{
    echo "no";
}
