<?php

require_once("respuestas.php");
require_once("header.php");

//DECLARACION DE VARIABLES A USAR
$resultado ="";
$nivel = 1;
$variableError = 0;
$mensajeError="";
$botonEnviar = "submit";
$probar = "hidden";
$resultado2="";
$botonRegister= "hidden";
$logueo="menu";


//VALIDO LAS respuestas
if($_GET){
//Si la respuesta es correcta
  if($_GET["respuesta"] == $valores[$nivel]){
    $nivel = $nivel+1;
    $resultado = $valor[$nivel];
  }
//SI LA RESPUESTA ES INCORRECTA
  elseif(($_GET["respuesta"] != $valores[$nivel])){
    $variableError = array_rand($errores, 1);
    $resultado = NULL;
    $nivel = NULL;
    $mensajeError = $errores[$variableError];
    $botonEnviar = "hidden";
    $probar = "button";
  }
  elseif($_GET["respuesta"] == $valores[9]) {
    $resultado2 = "Para acceder a los siguientes niveles debes registrarte. Gracias!";
    $mensajeError = null;
    $nivel=NULL;
    $botonEnviar ="hidden";
    $botonRegister = "button";
  }
}else{
  $resultado = 1;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Maktub</title>
    <meta charset="utf-8">
    <link href="maktub4.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="body-niveles">
      <main class="main-niveles">
        <div class="valor">
            <h1><?php echo $resultado ?></h1>
            <h3><?php echo $resultado2 ?></h3>
            <h3><?php echo $mensajeError ?></h3>
            <br>
        </div>
        <div class="respuesta">
            <form class="" action="demo.php" method="GET">
              <input class="campo-respuesta" type="text" name="respuesta" method="GET">
              <br>
              <input class="enviar" type= "<?php echo $botonEnviar ?>" name= " " value= "ENVIAR">
              <input type="<?php echo $probar?>" value="Volver atrás" onclick="history.back()" style="font-family: Verdana; font-size: 10 pt">
              <a href="register.php"><input class="enviar" type= "<?php echo $botonRegister ?>" name= " " value= "REGISTRARME"></a>
            </form>
        </div>
        <div class="nivel">
            <h2><?php echo $nivel  ?></h2>
        </div>
      </main>
    </div>
  </body>
</html>
