<?php

require_once("respuestas.php");
require_once("header.php");

//DECLARACION DE VARIABLES A USAR
$resultado ="1";
$nivel = 1;
$variableError = 0;
$mensajeError="";
$botonEnviar = "submit";
$probar = "hidden";
$resultado2="";
$botonRegister= "hidden";
$logueo="menu";
$respuesta = "";

if($_GET){
  for ($i=0; $i <count($valores); $i++) {
      if($_GET["respuesta"] == $valores[$i]){
      $resultado = $valor[$i+1];
      $mensajeError = NULL;
      $nivel = $nivel +$i;
    }elseif (in_Array($_GET["respuesta"],$valores)==FALSE) {
      $variableError = array_rand($errores, 1);
      $resultado = NULL;
      $botonEnviar = "hidden";
      $probar = "probar";
      $mensajeError = $errores[$variableError];
      $nivel="";
    }
    elseif ($_GET["respuesta"] ==$valores[10]) {
      $resultado2 = "Para acceder a los siguientes niveles debes registrarte. Gracias!";
      $mensajeError = null;
      $nivel="";
      break;
    }

    }
  }else{
    $resultado = 1;
    $mensajeError = NULL;
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
              <div class="<?php echo $probar?>">
                <a href="maktub2.php">Probar de nuevo</a>
              </div>
              <a href="register.php"><input class="enviar" type= "<?php echo $botonRegister ?>" name= " " value= "REGISTRARME"></a>
            </form>
        </div>
        <div class="nivel">
            <h2><?php echo $nivel  ?></h2>
        </div>
    </div>
  </body>
</html>
