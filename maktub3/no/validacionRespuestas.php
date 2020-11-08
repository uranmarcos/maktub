<?php

/*
if($_SESSION["usuarioLogueado"] == false){
    header("Location: index.php");
  } else{
    $logueo = $_SESSION["name"];
    $mail = $_SESSION["mail"];
  
//Traigo el nivel desde base de datos
    $query = $baseDeDatos -> Prepare
      ("SELECT nivel FROM usuarios where mail = '$mail'");
    $query -> execute();
    $consultaBDD = $query -> fetch(PDO::FETCH_ASSOC);
  }
*/

//DECLARACION DE VARIABLES A USAR
$logueo="menu";
$mensajeError=NULL;
$variableError = 0;
$botonEnviar = "submit";
$botonProbarDeNuevo = "hidden";
$incorrectas = [];
$nivel = $consultaBDD["nivel"];
$probar ="hidden";
$ocultar ="";
$correctas="";
$posicionTexto = array_rand($textoEnMovimiento, 1);
$texto = $textoEnMovimiento[$posicionTexto];
$nivel22="";


//CONSULTO VALOR Y RESPUESTA DEL NIVEL DEL JUGADOR A BDD
$consulta = $baseDeDatos -> Prepare
      ("SELECT * FROM niveles where nivel = '$nivel'");
    $consulta -> execute();
    $consultaRespuesta = $consulta -> fetch(PDO::FETCH_ASSOC);


$valorAMostrar = $consultaRespuesta["valor"];
$respuestaCorrecta = $consultaRespuesta["respuesta"];
 

//Valido respuestas
if($_GET){
//Si la respuesta es correcta
  if($_GET["respuesta"] == $respuestaCorrecta){
    $nivelFinal = $nivel+1;
    $correctas = $nivel-1;

    $consulta = $baseDeDatos-> prepare
    ("UPDATE usuarios SET nivel='$nivelFinal', correctas = '$correctas'
    WHERE mail = '$mail'");
    $consulta->execute();
    header("Location:maktub0.php"); 
  }
//SI LA RESPUESTA ES INCORRECTA
  else {
    //almaceno las respuestas $incorrectas
        $mensajeAGuardar[] = [
                "mail" => $mail,
                "nivel" => $nivel,
                "mensaje"=>$_GET["respuesta"]
              ];
        $mensajeJson = json_encode($mensajeAGuardar);
        file_put_contents ("json/respuestas.json", $mensajeJson, FILE_APPEND);


          $variableError = array_rand($errores, 1);
          $valorAMostrar = NULL;
          $mensajeError = $errores[$variableError];
          $botonEnviar = "hidden";
          $probar= "probar";
          $nivel = NULL;
          $ocultar = "ocultar";
//traigo valor de incorrectas
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
}
if($nivel==22){
  $nivel22 = "verNivel22";
  }else{
  $nivel22="ocultarNivel22";
  }