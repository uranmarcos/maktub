<?php
session_start();
require_once("respuestas.php");
require_once("pdo.php");
require("funciones/funcionesMaktub.php");

$nivel = consultarNivel($mail, $baseDeDatos);
$valor = consultarValor($nivel, $baseDeDatos);
$respuestaCorrecta = consultarRespuesta($nivel, $baseDeDatos);


if(isset($_POST["enviar"])){
    consultarRespuesta($nivel, $baseDeDatos);
    $respuestaIngresada = $_POST["respuesta"];  
    $compararRespuesta = compararRespuesta($respuestaIngresada, $respuestaCorrecta);
    
    if($compararRespuesta == true){
        cambiarNivel($nivel, $baseDeDatos, $mail);
    }else{  
        $valor = "";
        $ocultar = "none";
        $probar = "block";
        actualizarIncorrectas($mail, $baseDeDatos);
        almacenarRespuestaIncorrecta($mail, $nivel, $respuestaIngresada);
        $mensajeError = mensajeError($errores);
    }
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Maktub</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.8">
        <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="css/maktub11.css" rel="stylesheet">
        <link href="css/header1.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Gruppo&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="header">
            <?php include("header.php");?>
        </div>    
        <div class="row justify-content-center">
            <main class="col-12 col-md-6 col-xl-4">
                <?php include("secciones/niveles.php")?>
            </main>
        </div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    </body>
</html>    