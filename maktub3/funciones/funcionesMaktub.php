<?php
$mensajeError=NULL;
$nivel22="ocultar";
$ocultar="mostrar";
$probar ="ocultar";
$compararRespuesta=Null;


//TEXTO EN MOVIMIENTO
$posicionTexto = array_rand($textoEnMovimiento, 1);
$texto = $textoEnMovimiento[$posicionTexto];



//valido usuario logueado
if($_SESSION["usuarioLogueado"] == false){
    header("Location: index.php");
    } else{
        $logueo = $_SESSION["name"];
        $mail = $_SESSION["mail"];
        $rol = $_SESSION["rol"];
        
        if($rol == "admin"){
            $administrador = "block";
        }else{
            $administrador="none";
        }
}


function consultarNivel($mail, $baseDeDatos){
    $query = $baseDeDatos -> Prepare ("SELECT * FROM usuarios where mail = '$mail'");
    $query -> execute();
    $consultaBDD = $query -> fetch(PDO::FETCH_ASSOC);
    return $nivel = $consultaBDD["nivel"];
}
function consultarValor($nivel, $baseDeDatos){
    $consulta = $baseDeDatos -> Prepare ("SELECT * FROM niveles where nivel = '$nivel'");
    $consulta -> execute();
    $consultaRespuesta = $consulta -> fetch(PDO::FETCH_ASSOC);
    return $valor = $consultaRespuesta["valor"];
}
function consultarRespuesta($nivel, $baseDeDatos){
    $consulta = $baseDeDatos -> Prepare ("SELECT * FROM niveles where nivel = '$nivel'");
    $consulta -> execute();
    $consultaRespuesta = $consulta -> fetch(PDO::FETCH_ASSOC);
    return $respuestaCorrecta = $consultaRespuesta["respuesta"];
}
function compararRespuesta($respuestaIngresada, $respuestaCorrecta){
    return ($respuestaIngresada == $respuestaCorrecta);
}
function cambiarNivel($nivel, $baseDeDatos, $mail){
    $nivelFinal = $nivel+1;
    $correctas = $nivel-1;
    $consulta = $baseDeDatos-> prepare ("UPDATE usuarios SET nivel='$nivelFinal', correctas = '$correctas' WHERE mail = '$mail'");
    $consulta->execute();
    header("Location:maktub.php"); 
}
function mensajeError($errores){
    $variableError = array_rand($errores, 1);
    $error= $errores[$variableError];
    return $error;
}
function almacenarRespuestaIncorrecta($mail, $nivel, $respuestaIngresada){
        $mensajeAGuardar[] = [
            "mail" => $mail,
            "nivel" => $nivel,
            "mensaje"=>$respuestaIngresada
        ];
        $mensajeJson = json_encode($mensajeAGuardar);
        file_put_contents ("json/respuestas.json", $mensajeJson, FILE_APPEND);
}

function actualizarIncorrectas($mail, $baseDeDatos){
    $consulta = $baseDeDatos-> prepare
    ("SELECT incorrectas FROM usuarios WHERE mail = '$mail'");
    $consulta->execute();
    //le sumo uno al valor por esta respuesta incorrecta
    $incorrectas = $consulta->fetch(PDO::FETCH_ASSOC);
    $incorrectas["incorrectas"] = $incorrectas["incorrectas"]+1;
    $incorrectasFinal = ($incorrectas["incorrectas"]);
    //mando nuevamente a BDD el valor actualizado
    $consulta2 = $baseDeDatos-> prepare
    ("UPDATE usuarios SET incorrectas = '$incorrectasFinal'
    WHERE mail = '$mail'");
    $consulta2->execute();

}

